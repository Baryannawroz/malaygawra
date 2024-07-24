<div>
    <input type="text" wire:model="updatedSearch" placeholder="Search for student...">

    @if(!empty($students))
    <select>
        @foreach($students as $student)

        <li wire:click="selectStudent({{ $student->id }})">
            {{ $student->name }}
        </li>
        @endforeach
    </select>
    @endif{{
    $search
     }}
    <button wire:click='a'>d</button>
</div>
