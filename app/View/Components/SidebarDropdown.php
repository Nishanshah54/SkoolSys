<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarDropdown extends Component
{
    public $title;
    public $index;
    public $activeIndex;

    public function __construct($title, $index, $activeIndex = null)
    {
        $this->title = $title;
        $this->index = $index;
        $this->activeIndex = $activeIndex;
    }

    public function render()
    {
        return view('components.sidebar-dropdown');
    }
}
