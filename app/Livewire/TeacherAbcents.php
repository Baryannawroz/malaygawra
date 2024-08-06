<?php

namespace App\Livewire;

use App\Models\teacherSchedule;
use Livewire\Component;

class TeacherAbcents extends Component
{


    public $count = 0;
    public $teachers=null ;

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
