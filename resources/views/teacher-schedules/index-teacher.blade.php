<x-app-layout>
    @include('teacher-schedules._board', [
        'title' => 'خشتەی حەفتانەی مامۆستایان',
        'subtitle' => 'بۆ هەر ڕۆژێک ئەو مامۆستایانە دیاری بکە کە وانەیان هەیە. غیاباتی ڕۆژانە لەسەر ئەم خشتەیە وەردەگیرێت.',
        'addUrl' => url('/api/schedules/add'),
        'destroyUrl' => url('/api/schedules/destroy') . '/',
    ])
</x-app-layout>
