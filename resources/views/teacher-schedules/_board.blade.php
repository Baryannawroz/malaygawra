{{--
    Shared weekly schedule board.
    Expects: $schedules, $title, $subtitle, $addUrl, $destroyUrl (without id)
    day_of_week: 0 = Sunday ... 6 = Saturday (same as Carbon::dayOfWeek)
--}}
@php
    $dayNames = ['یەکشەمە', 'دووشەمە', 'سێشەمە', 'چوارشەمە', 'پێنجشەمە', 'هەینی', 'شەمە'];
    $order = [6, 0, 1, 2, 3, 4, 5]; // week starts on Saturday
    $today = now()->dayOfWeek;
@endphp

<x-page-header :title="$title" :subtitle="$subtitle" />

<div class="mg-board">
    @foreach ($order as $index)
    @php $daySchedules = $schedules->filter(fn ($s) => (int) $s->day_of_week === $index)->values(); @endphp
    <section class="mg-card mg-day {{ $index === $today ? 'is-today' : '' }}" aria-labelledby="day-title-{{ $index }}">
        <div class="mg-card-header">
            <h2 class="mg-card-title" id="day-title-{{ $index }}">{{ $dayNames[$index] }}</h2>
            <div class="mg-summary">
                @if ($index === $today)<span class="mg-badge mg-badge-primary">ئەمڕۆ</span>@endif
                <span class="mg-badge" id="day-count-{{ $index }}">{{ $daySchedules->count() }}</span>
            </div>
        </div>
        <div class="mg-card-body" style="flex:1">
            <ul class="mg-day-list" id="teachers-list_{{ $index }}">
                @foreach ($daySchedules as $schedule)
                <li id="schedule-record-{{ $schedule->id }}">
                    <span>{{ $schedule->teacher->name ?? '—' }}</span>
                    <button type="button" class="mg-btn mg-btn-ghost mg-btn-icon danger" title="لابردن"
                        aria-label="لابردنی {{ $schedule->teacher->name ?? '' }}"
                        onclick="deleteSchedule({{ $schedule->id }}, {{ $index }})"><i class="bi bi-x-lg"></i></button>
                </li>
                @endforeach
            </ul>
            <p class="mg-muted" id="day-empty-{{ $index }}" style="font-size:13px;{{ $daySchedules->isEmpty() ? '' : 'display:none' }}">
                هیچ کەسێک دیاری نەکراوە
            </p>
        </div>
        <div class="mg-card-footer">
            <div class="mg-day-add">
                <select id="teacher_{{ $index }}" class="teacherSearch" aria-label="هەڵبژاردنی مامۆستا بۆ {{ $dayNames[$index] }}"></select>
                <button type="button" class="mg-btn mg-btn-primary mg-btn-icon" title="زیادکردن" aria-label="زیادکردن"
                    onclick="saveSchedule({{ $index }}, this)"><i class="bi bi-plus-lg"></i></button>
            </div>
            <p class="mg-error" id="day-error-{{ $index }}" style="display:none;margin-top:6px"></p>
        </div>
    </section>
    @endforeach
</div>

@push('scripts')
<script>
    (function () {
        const addUrl = @json($addUrl);
        const destroyUrl = @json($destroyUrl);
        const token = document.querySelector('meta[name="csrf-token"]').content;

        function escapeHtml(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function refresh(day) {
            const n = document.querySelectorAll('#teachers-list_' + day + ' li').length;
            document.getElementById('day-count-' + day).textContent = n;
            document.getElementById('day-empty-' + day).style.display = n ? 'none' : '';
        }
        function showError(day, msg) {
            const el = document.getElementById('day-error-' + day);
            el.textContent = msg || '';
            el.style.display = msg ? '' : 'none';
        }

        window.saveSchedule = function (day, btn) {
            const teacherId = $('#teacher_' + day).val();
            showError(day, '');
            if (!teacherId) { showError(day, 'تکایە سەرەتا کەسێک هەڵبژێرە.'); return; }
            btn.disabled = true;
            $.ajax({
                type: 'POST', dataType: 'json', url: addUrl,
                data: { day_of_week: day, teacher_id: teacherId, _token: token },
                success: function (data) {
                    const li = document.createElement('li');
                    const sid = data.schedule_id;
                    if (sid) li.id = 'schedule-record-' + sid;
                    li.innerHTML = '<span>' + escapeHtml(data.name) + '</span>' + (sid
                        ? '<button type="button" class="mg-btn mg-btn-ghost mg-btn-icon danger" title="لابردن" aria-label="لابردن" onclick="deleteSchedule(' + Number(sid) + ', ' + day + ')"><i class="bi bi-x-lg"></i></button>'
                        : '<span class="mg-badge mg-badge-success">زیادکرا</span>');
                    document.getElementById('teachers-list_' + day).appendChild(li);
                    $('#teacher_' + day).val(null).trigger('change');
                    refresh(day);
                },
                error: function () { showError(day, 'زیادکردن سەرکەوتوو نەبوو، تکایە دووبارە هەوڵ بدەرەوە.'); },
                complete: function () { btn.disabled = false; }
            });
        };

        window.deleteSchedule = function (id, day) {
            if (!confirm('ئەم کەسە لەم ڕۆژە لابدرێت؟')) return;
            $.ajax({
                type: 'POST', url: destroyUrl + id, data: { _token: token },
                success: function () { $('#schedule-record-' + id).remove(); refresh(day); },
                error: function () { showError(day, 'لابردن سەرکەوتوو نەبوو.'); }
            });
        };
    })();
</script>
@endpush
