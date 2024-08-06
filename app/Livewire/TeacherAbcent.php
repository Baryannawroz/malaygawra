<?php

namespace App\Http\Livewire;

use App\Models\teacherSchedule;
use Livewire\Component;

class TeacherAbcent extends Component
{
    public $count = 0;
    public $teachers;

    public function increment()
    {
        $this->count++;
        $this->teachers=teacherSchedule::where('day_of_week',$this->count);
    }

    public function render()
    {
        return view('livewire.teacher-abcent');
    }
}
