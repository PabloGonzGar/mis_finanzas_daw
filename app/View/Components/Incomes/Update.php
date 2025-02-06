<?php

namespace App\View\Components\Income;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Update extends Component
{
    /**
     * Update a new component instance.
     */
    public function __construct(public String $title)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.income.update');
    }
}