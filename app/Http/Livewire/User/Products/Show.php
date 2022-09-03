<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;
use App\Models\Product;

class Show extends Component
{
    public $showProductModal = false;

    public Product $product;

    public function mount()
    {
        $this->product = new Product();
    }

    public function open(Product $product)
    {
        $this->product = $product;

        $this->username = '';

        $this->dispatchBrowserEvent('body:overflow-y-hidden');

        $this->emit('resetCommentForm', $product);

        $this->resetErrorBag();

        $this->resetValidation();

        $this->showProductModal = true;

        $product->increment('view_count');
    }

    public function render()
    {
        return view('livewire.user.products.show'); 
    }
}
