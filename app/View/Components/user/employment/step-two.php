<?php

namespace App\View\Components\user\employment;

use App\Models\Employment;
use Illuminate\View\Component;

class step-two extends Component
{
    public $gender;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $gender)
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
        return view('components.user.employment.step-two');
    }
}
