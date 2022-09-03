<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public $readyToLoad = false;

    public $product;

    public function loadComments()
    {
        $this->readyToLoad = true;
    }

    public function render()
    {
        $comments = $this->readyToLoad
                        ? $this->product->comments()->whereApproved(1)->whereNull('parent_id')->latest()->paginate(10)
                        : [];

        return view('livewire.user.products.comments', compact('comments'));
    }
}
