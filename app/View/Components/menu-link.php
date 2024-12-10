<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class menu-link extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($color,$qty,$title)
    {
        $this->color = $color;
        $this->color = $qty;
        $this->color = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-link');
    }
}
