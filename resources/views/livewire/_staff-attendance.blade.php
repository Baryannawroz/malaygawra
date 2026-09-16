{{-- Shared by teacher-abcents and administrator-abcents Livewire views. Expects $teachers, $selectedDay, $action --}}
@php
    $dayNames = ['یەکشەمە', 'دووشەمە', 'سێشەمە', 'چوارشەمە', 'پێنجشەمە', 'هەینی', 'شەمە'];
    $order = [6, 0, 1, 2, 3, 4, 5];
    $today = now()->dayOfWeek;
@endphp

<div class="mg-card" style="margin-bottom:16px">
    <div class="mg-card-body">
        <div class="mg-label" style="margin-bottom:10px">ڕۆژ</div>
        <div class="mg-chips" role="tablist">
            @foreach ($order as $index)
            <button type="button" wire:click="addDay('{{ $index }}')" role="tab"
                aria-selected="{{ (string) $selectedDay === (string) $index ? 'true' : 'false' }}"
                class="mg-chip {{ (string) $selectedDay === (string) $index ? 'is-active' : '' }} {{ $index === $today ? 'is-today' : '' }}">
                {{ $dayNames[$index] }}@if ($index === $today) · ئەمڕۆ @endif
            </button>
            @endforeach
        </div>
    </div>
</div>

<div wire:loading.flex class="mg-card mg-empty" style="justify-content:center">چاوەڕێ بکە...</div>

<div wire:loading.remove>
    @if ($teachers === null)
    <div class="mg-card"><x-mg-empty icon="bi-calendar" title="ڕۆژێک هەڵبژێرە" /></div>
    @elseif ($teachers->isEmpty())
    <div class="mg-card">
        <x-mg-empty icon="bi-calendar-x" title="بۆ ئەم ڕۆژە هیچ کەسێک لە خشتەی حەفتانەدا دیاری نەکراوە">
            <a href="{{ $scheduleUrl }}" class="mg-link">دەستکاریکردنی خشتەی حەفتانە</a>
        </x-mg-empty>
    </div>
    @else
    <form action="{{ $action }}" method="POST" class="mg-card" wire:key="staff-form-{{ $selectedDay }}">
        @csrf
        <div class="mg-card-header">
            <div class="mg-field" style="flex-direction:row;align-items:center;gap:8px">
                <label for="date" class="mg-label">بەروار</label>
                <input type="date" id="date" name="date" class="mg-input" style="width:auto"
                    value="{{ now()->toDateString() }}" required>
            </div>
            <span class="mg-badge">{{ $teachers->count() }} کەس</span>
        </div>
        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناو</th>
                        <th style="text-align:left">دۆخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $row)
                    <tr wire:key="staff-row-{{ $row->id }}">
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>
                            {{ $row->teacher->name ?? '—' }}
                            <input type="hidden" name="teachers[{{ $loop->index }}][id]" value="{{ $row->teacher_id }}">
                        </td>
                        <td style="text-align:left">
                            <div class="mg-seg" role="radiogroup" aria-label="دۆخی {{ $row->teacher->name ?? '' }}">
                                <label><input type="radio" class="present" name="teachers[{{ $loop->index }}][isAbsent]" value="0" checked><span>هاتوو</span></label>
                                <label><input type="radio" class="absent" name="teachers[{{ $loop->index }}][isAbsent]" value="1"><span>غایب</span></label>
                                <label><input type="radio" class="leave" name="teachers[{{ $loop->index }}][isAbsent]" value="2"><span>ئیجازە</span></label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mg-card-footer mg-form-actions">
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> تۆمارکردنی غیابات</button>
        </div>
    </form>
    @endif
</div>
