<div style="text-align: center">
    <button wire:click="increment">+</button>
    <h1>{{ $count }}</h1>

    <ul>
        @if ($teachers!==null)

        @foreach ($teachers as $teacher)
        <li>{{$teacher->teacher->name }}</li>
        @endforeach
    </ul>
    @endif
</div>
