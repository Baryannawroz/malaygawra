@props([
'width' => '312', // Default width
'height' => '312', // Default height
'alt' => 'Application Logo', // Default alt text
])

<img src="{{ custom_asset('images/malaygawra.png') }}" alt="" style="width: {{ $width }}px; height: {{ $height }}px;">
