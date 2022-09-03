<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;

class Information extends Component
{
    protected $listeners = ['updateInformationProduct' => '$refresh'];

    public $product;
    
    public function render()
    {
        return view('livewire.user.products.information');
    }
}
