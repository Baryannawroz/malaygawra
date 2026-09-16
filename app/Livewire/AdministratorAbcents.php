<?php

namespace App\Livewire;

use App\Models\AdministratorSchedule;

use Livewire\Component;

class AdministratorAbcents extends Component
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
        $this->teachers = AdministratorSchedule::with('teacher')->where('day_of_week', $day)->get();
        $this->count++;
    }
    public function increment()
    {
        $this->count++;
        $this->teachers = AdministratorSchedule::where('day_of_week', $this->count)->get();

    }
    public function render()
    {
        return view('livewire.administrator-abcents');
    }
}
