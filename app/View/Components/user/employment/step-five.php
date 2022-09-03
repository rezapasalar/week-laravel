<?php

namespace App\View\Components\user\employment;

use App\Models\Employment;
use Illuminate\View\Component;

class step-five extends Component
{
    public Employment $employment;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $employment)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user.employment.step-five');
    }
}
