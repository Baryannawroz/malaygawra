<?php

namespace App\View\Components;

use App\Models\Lesson;
use App\Models\Students;
use App\Models\Teacher;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cards extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $students=Students::count();
        $lessons=Lesson::count();
        $teachers=Teacher::count();

        return view('components.cards',compact('students','lessons','teachers'));
    }
}
