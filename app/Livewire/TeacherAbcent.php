<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TeacherAbcent extends Component
{
    public $selectedDay;
    public $dayNumber;
    public $schedule;

    public function updatedSelectedDay($value)
    {
        $daysOfWeek = [
            'Sunday' => 0,
            'Monday' => 1,
            'Tuesday' => 2,
            'Wednesday' => 3,
            'Thursday' => 4,
            'Friday' => 5,
            'Saturday' => 6,
        ];

        // Get the day number based on the selected day
        $this->dayNumber = $daysOfWeek[$value] ?? null;

        // Query the teacher's schedule based on the selected day
        $this->schedule = $this->getTeacherSchedule($this->dayNumber);
    }

    public function getTeacherSchedule($dayNumber)
    {dd(4);
        // Example query to get the teacher's schedule for the day
        // Replace this with your actual query logic
        return \App\Models\TeacherSchedule::where('day_number', $dayNumber)->get();
    }

    public function render()
    {
        return view('livewire.teacher-abcent');
    }
}
