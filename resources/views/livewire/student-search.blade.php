<div>
    <input type="text" wire:model="search" placeholder="Search for student...">

    @if(!empty($students))
    <ul>
        @foreach($students as $student)
        <li wire:click="selectStudent({{ $student->id }})">
            {{ $student->name }}
        </li>
        @endforeach
    </ul>
    @endif
</div>
