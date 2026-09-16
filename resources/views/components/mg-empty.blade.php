@props(['icon' => 'bi-inbox', 'title' => 'هیچ تۆمارێک نییە', 'colspan' => null])

@if ($colspan)
<tr>
    <td colspan="{{ $colspan }}" style="padding:0">
        <div class="mg-empty">
            <i class="bi {{ $icon }}"></i>
            <div class="mg-empty-title">{{ $title }}</div>
            @if (trim($slot) !== '')<div>{{ $slot }}</div>@endif
        </div>
    </td>
</tr>
@else
<div class="mg-empty">
    <i class="bi {{ $icon }}"></i>
    <div class="mg-empty-title">{{ $title }}</div>
    @if (trim($slot) !== '')<div>{{ $slot }}</div>@endif
</div>
@endif
