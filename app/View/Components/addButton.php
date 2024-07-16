<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class addButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $route;

    public function __construct($name, $route)
    {
        $this->name = $name;
        $this->route = $route;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.add-button');
    }
}
