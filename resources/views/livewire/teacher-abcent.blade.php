<div>
    <label for="day-select">Select Day of the Week:</label>
    <select id="day-select" wire:model="selectedDay">
        <option value="">-- Select a Day --</option>
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
        <option value="Saturday">Saturday</option>
    </select>

    @if($dayNumber !== null)
    <div>
        <h3>Day Number: {{ $dayNumber }}</h3>
    </div>
    @endif

    @if($schedule !== null)
    <div>
        <h3>Schedule for Selected Day:</h3>
        <ul>
            @foreach($schedule as $entry)
            <li>{{ $entry->description }}</li> <!-- Adjust to match your schedule data -->
            @endforeach
        </ul>
    </div>
    @endif
</div>
