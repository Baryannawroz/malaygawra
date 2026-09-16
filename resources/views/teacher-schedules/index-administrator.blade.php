<x-app-layout>
    @include('teacher-schedules._board', [
        'title' => 'خشتەی حەفتانەی کارگێڕان',
        'subtitle' => 'بۆ هەر ڕۆژێک ئەو کارگێڕانە دیاری بکە کە دەوامیان هەیە.',
        'addUrl' => url('/api/schedules/administrator/add'),
        'destroyUrl' => url('/api/schedules/administrator/destroy') . '/',
    ])
</x-app-layout>
