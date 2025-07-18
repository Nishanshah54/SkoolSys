<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownButton extends Component
{
    /**
     * Create a new component instance.
     */
    public $label;

    public function __construct($label = 'Dropdown')
    {
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown-button');
    }
}