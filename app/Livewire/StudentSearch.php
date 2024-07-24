<?php

namespace App\Livewire;

use App\Models\Students;
use Livewire\Component;

class StudentSearch extends Component
{
    public $search = '';
    public $students = [];

    public function a(){

        $this->students = Students::all();
       $this->search=5;

    }
    public function updatedSearch()
    {
        dd($this->students);
        $this->students = Students::where('name', 'like', '%' . $this->search . '%')->limit(5)->get();
    }

    public function selectStudent($studentId)
    {
        // Handle the student selection logic
        $this->emit('studentSelected', $studentId);
    }

    public function render()
    {
        return view('livewire.student-search');
    }
}
