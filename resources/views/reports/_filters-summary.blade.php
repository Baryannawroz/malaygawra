@php
    $parts = [];
    if (request('from')) $parts[] = 'لە ' . request('from');
    if (request('to')) $parts[] = 'تا ' . request('to');
    if (request('isMale') !== null && request('isMale') !== '') $parts[] = request('isMale') == '1' ? 'نێر' : 'مێ';
@endphp
{{ $parts ? implode(' · ', $parts) : 'بێ فلتەر — هەموو تۆمارەکان' }}
