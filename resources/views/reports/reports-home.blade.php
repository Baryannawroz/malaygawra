<x-app-layout>
    <x-page-header title="ڕاپۆرتەکان" subtitle="جۆری ڕاپۆرت هەڵبژێرە و فلتەرەکان دیاری بکە. هەموو فلتەرەکان ئیختیارین." />

    <div class="mg-report-grid">
        {{-- Students --}}
        <form action="{{ route('report.student') }}" method="GET" class="mg-card mg-report-card">
            <div class="mg-card-header">
                <div class="mg-cell-person">
                    <span class="mg-report-icon tone-blue"><i class="bi bi-people"></i></span>
                    <div>
                        <div class="mg-card-title">ڕاپۆرتی قوتابیان</div>
                        <div class="mg-help">لیستی قوتابیان بەپێی قوتابخانە، ڕەگەز و تەمەن</div>
                    </div>
                </div>
            </div>
            <div class="mg-card-body mg-stack">
                <div class="mg-field">
                    <label for="rs-school" class="mg-label">قوتابخانە</label>
                    <select id="rs-school" name="school_id" class="mg-select">
                        <option value="">هەمووی</option>
                        @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mg-field">
                    <label for="rs-gender" class="mg-label">ڕەگەز</label>
                    <select id="rs-gender" name="isMale" class="mg-select">
                        <option value="">هەمووی</option>
                        <option value="1">نێر</option>
                        <option value="0">مێ</option>
                    </select>
                </div>
                <div class="mg-form-grid">
                    <div class="mg-field">
                        <label for="rs-from" class="mg-label">لەدایکبوون لە</label>
                        <input type="date" id="rs-from" name="from" class="mg-input">
                    </div>
                    <div class="mg-field">
                        <label for="rs-to" class="mg-label">تا</label>
                        <input type="date" id="rs-to" name="to" class="mg-input">
                    </div>
                </div>
            </div>
            <div class="mg-card-footer">
                <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-file-earmark-text"></i> پیشاندانی ڕاپۆرت</button>
            </div>
        </form>

        {{-- Teachers --}}
        <form action="{{ route('report.teacher') }}" method="GET" class="mg-card mg-report-card">
            <div class="mg-card-header">
                <div class="mg-cell-person">
                    <span class="mg-report-icon tone-green"><i class="bi bi-person-badge"></i></span>
                    <div>
                        <div class="mg-card-title">ڕاپۆرتی مامۆستایان</div>
                        <div class="mg-help">لیستی مامۆستایان بەپێی ڕەگەز و تەمەن</div>
                    </div>
                </div>
            </div>
            <div class="mg-card-body mg-stack">
                <div class="mg-field">
                    <label for="rt-gender" class="mg-label">ڕەگەز</label>
                    <select id="rt-gender" name="isMale" class="mg-select">
                        <option value="">هەمووی</option>
                        <option value="1">نێر</option>
                        <option value="0">مێ</option>
                    </select>
                </div>
                <div class="mg-form-grid">
                    <div class="mg-field">
                        <label for="rt-from" class="mg-label">لەدایکبوون لە</label>
                        <input type="date" id="rt-from" name="from" class="mg-input">
                    </div>
                    <div class="mg-field">
                        <label for="rt-to" class="mg-label">تا</label>
                        <input type="date" id="rt-to" name="to" class="mg-input">
                    </div>
                </div>
            </div>
            <div class="mg-card-footer">
                <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-file-earmark-text"></i> پیشاندانی ڕاپۆرت</button>
            </div>
        </form>

        {{-- Teacher absence --}}
        <form action="{{ route('report.teacherAbsence') }}" method="GET" class="mg-card mg-report-card">
            <div class="mg-card-header">
                <div class="mg-cell-person">
                    <span class="mg-report-icon tone-amber"><i class="bi bi-calendar-check"></i></span>
                    <div>
                        <div class="mg-card-title">غیاباتی مامۆستایان</div>
                        <div class="mg-help">کۆی هاتوو، غایب و ئیجازەی هەر مامۆستایەک</div>
                    </div>
                </div>
            </div>
            <div class="mg-card-body">
                <div class="mg-form-grid">
                    <div class="mg-field">
                        <label for="ta-from" class="mg-label">لە بەرواری</label>
                        <input type="date" id="ta-from" name="from" class="mg-input">
                    </div>
                    <div class="mg-field">
                        <label for="ta-to" class="mg-label">تا بەرواری</label>
                        <input type="date" id="ta-to" name="to" class="mg-input">
                    </div>
                </div>
            </div>
            <div class="mg-card-footer">
                <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-file-earmark-text"></i> پیشاندانی ڕاپۆرت</button>
            </div>
        </form>

        {{-- Student absence --}}
        <form action="{{ route('report.studentAbsence') }}" method="GET" class="mg-card mg-report-card">
            <div class="mg-card-header">
                <div class="mg-cell-person">
                    <span class="mg-report-icon tone-rose"><i class="bi bi-clipboard-data"></i></span>
                    <div>
                        <div class="mg-card-title">غیاباتی قوتابیان</div>
                        <div class="mg-help">کۆی هاتوو، غایب و ئیجازەی هەر قوتابییەک</div>
                    </div>
                </div>
            </div>
            <div class="mg-card-body">
                <div class="mg-form-grid">
                    <div class="mg-field">
                        <label for="sa-from" class="mg-label">لە بەرواری</label>
                        <input type="date" id="sa-from" name="from" class="mg-input">
                    </div>
                    <div class="mg-field">
                        <label for="sa-to" class="mg-label">تا بەرواری</label>
                        <input type="date" id="sa-to" name="to" class="mg-input">
                    </div>
                </div>
            </div>
            <div class="mg-card-footer">
                <button type="submit" class="mg-btn mg-btn-primary" data-no-lock><i class="bi bi-file-earmark-text"></i> پیشاندانی ڕاپۆرت</button>
            </div>
        </form>
    </div>
</x-app-layout>
