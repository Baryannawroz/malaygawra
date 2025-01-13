<?php

namespace App\Livewire;

use App\Models\AdministratorSchedule;

use Livewire\Component;

class AdministratorAbcents extends Component
{


    public $count = 0;
    public $teachers=null ;

    public function addDay($day)
    {

            $this->teachers = AdministratorSchedule::where('day_of_week', $day)->get();
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
