<x-app-layout>
    <x-page-header title="کارگێڕان" subtitle="غیابات و خشتەی حەفتانەی ستافی کارگێڕی" />

    <div class="mg-quick">
        <a href="{{ route('administrator.create') }}">
            <i class="bi bi-calendar-check"></i>
            <span>غیاباتی ئەمڕۆ<small>تۆمارکردنی ئامادەبوونی کارگێڕان</small></span>
        </a>
        <a href="{{ route('administrator.Schedules') }}">
            <i class="bi bi-calendar-week"></i>
            <span>خشتەی حەفتانە<small>دیاریکردنی ڕۆژانی کاری هەر کارگێڕێک</small></span>
        </a>
    </div>
</x-app-layout>
