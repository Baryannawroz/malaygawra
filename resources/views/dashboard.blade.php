<x-app-layout>
    <x-page-header title="بەخێربێیتەوە، {{ Auth::user()->name }}" subtitle="پوختەیەکی خێرا لە دۆخی ڕێکخراو" />

    <x-cards />

    <div class="mg-card" style="margin-top:24px">
        <div class="mg-card-header">
            <h2 class="mg-card-title">کارە خێراکان</h2>
        </div>
        <div class="mg-card-body">
            <div class="mg-quick">
                <a href="{{ route('student.create') }}">
                    <i class="bi bi-person-plus"></i>
                    <span>زیادکردنی قوتابی<small>تۆمارکردنی قوتابیی نوێ</small></span>
                </a>
                <a href="{{ route('groups') }}">
                    <i class="bi bi-check2-square"></i>
                    <span>وەرگرتنی غیابات<small>دەرسێک هەڵبژێرە و غیابات تۆمار بکە</small></span>
                </a>
                <a href="{{ route('teacherSchedule.create') }}">
                    <i class="bi bi-calendar-check"></i>
                    <span>غیاباتی مامۆستایان<small>ئامادەبوونی ئەمڕۆی مامۆستایان</small></span>
                </a>
                <a href="{{ route('reports') }}">
                    <i class="bi bi-bar-chart-line"></i>
                    <span>ڕاپۆرتەکان<small>قوتابی، مامۆستا و غیابات</small></span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
