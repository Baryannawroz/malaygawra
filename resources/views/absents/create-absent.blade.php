<x-app-layout>
    <x-page-header title="وەرگرتنی غیابات" :subtitle="'دەرسی ' . $group->name" :back="route('groupStudent.show', $group->id)"
        back-label="گەڕانەوە بۆ دەرس" />

    @if ($students->isEmpty())
    <div class="mg-card">
        <x-mg-empty icon="bi-people" title="ئەم دەرسە هیچ قوتابییەکی تێدا نییە">
            <a href="{{ route('groupStudent.create', $group->id) }}" class="mg-link">زیادکردنی قوتابی</a>
        </x-mg-empty>
    </div>
    @else
    <form action="{{ route('absent.store') }}" method="POST" class="mg-card"
        x-data="{
            counts() {
                const v = [...$el.querySelectorAll('input[type=radio]:checked')].map(i => i.value);
                return { p: v.filter(x => x === '0').length, a: v.filter(x => x === '1').length, l: v.filter(x => x === '2').length };
            },
            c: { p: {{ $students->count() }}, a: 0, l: 0 },
            all(val) { $el.querySelectorAll('input[type=radio][value=\'' + val + '\']').forEach(i => i.checked = true); this.c = this.counts(); }
        }"
        @change="c = counts()">
        @csrf
        <input type="hidden" name="group_id" value="{{ $group->id }}">

        <div class="mg-card-header">
            <div class="mg-toolbar">
                <div class="mg-field" style="flex-direction:row;align-items:center;gap:8px">
                    <label for="date" class="mg-label">بەروار</label>
                    <input type="date" id="date" name="date" class="mg-input" style="width:auto"
                        value="{{ old('date', now()->toDateString()) }}" max="{{ now()->toDateString() }}" required>
                </div>
            </div>
            <div class="mg-toolbar">
                <span class="mg-muted" style="font-size:13px">هەمووی بکە بە:</span>
                <button type="button" class="mg-btn mg-btn-secondary mg-btn-sm" @click="all('0')" data-no-lock>هاتوو</button>
                <button type="button" class="mg-btn mg-btn-secondary mg-btn-sm" @click="all('1')" data-no-lock>غایب</button>
            </div>
        </div>

        <div class="mg-table-wrap">
            <table class="mg-table">
                <thead>
                    <tr>
                        <th class="num">#</th>
                        <th>ناوی قوتابی</th>
                        <th style="text-align:left">دۆخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td class="num">{{ $loop->iteration }}</td>
                        <td>
                            <div class="mg-cell-person">
                                <x-photo-avatar :path="$student->photo_path" :name="$student->name" />
                                <span>{{ $student->name }}</span>
                            </div>
                            <input type="hidden" name="students[{{ $loop->index }}][id]" value="{{ $student->id }}">
                        </td>
                        <td style="text-align:left">
                            <div class="mg-seg" role="radiogroup" aria-label="دۆخی {{ $student->name }}">
                                <label><input type="radio" class="present" name="students[{{ $loop->index }}][isAbsent]" value="0" checked><span>هاتوو</span></label>
                                <label><input type="radio" class="absent" name="students[{{ $loop->index }}][isAbsent]" value="1"><span>غایب</span></label>
                                <label><input type="radio" class="leave" name="students[{{ $loop->index }}][isAbsent]" value="2"><span>ئیجازە</span></label>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mg-card-footer" style="display:flex;flex-wrap:wrap;gap:12px;align-items:center;justify-content:space-between">
            <div class="mg-summary">
                <span class="mg-badge mg-badge-success">هاتوو: <b x-text="c.p">{{ $students->count() }}</b></span>
                <span class="mg-badge mg-badge-danger">غایب: <b x-text="c.a">0</b></span>
                <span class="mg-badge mg-badge-warning">ئیجازە: <b x-text="c.l">0</b></span>
            </div>
            <button type="submit" class="mg-btn mg-btn-primary"><i class="bi bi-check-lg"></i> تۆمارکردنی غیابات</button>
        </div>
    </form>
    @endif
</x-app-layout>
