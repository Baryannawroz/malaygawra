<?php

namespace App\Livewire;

use App\Models\teacherSchedule;
use Livewire\Component;

class TeacherAbcents extends Component
{


    public $count = 0;
    public $teachers=null ;
    public $selectedDay = null;

    public function mount()
    {
        // Open today's list by default
        $this->addDay((string) now()->dayOfWeek);
    }

    public function addDay($day)
    {
        
        $this->selectedDay = (string) $day;
        $this->teachers = teacherSchedule::with('teacher')->where('day_of_week', $day)->get();
        $this->count++;
    }
    public function increment()
    {
        $this->count++;
        $this->teachers = teacherSchedule::where('day_of_week', $this->count)->get();

    }
    public function render()
    {
        return view('livewire.teacher-abcents');
    }
}
