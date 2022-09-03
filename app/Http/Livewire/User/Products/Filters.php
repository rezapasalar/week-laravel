<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;

class Filters extends Component
{
    public $filter;

    public function render()
    {
        return view('livewire.user.products.filters');
    }
}
