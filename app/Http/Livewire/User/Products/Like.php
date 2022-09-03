<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;
use App\Models\Like as LikeModel;

class Like extends Component
{
    public $product;

    public function like()
    {
        $like = LikeModel::whereIpAddress(request()->ip())->whereProductId($this->product->id)->first();

        if (!$like) {
            \DB::transaction(function () {
                LikeModel::create([
                    'product_id' => $this->product->id,
                    'ip_address' => request()->ip()
                ]);
    
                $this->product->increment('like');
            });
        } else {
            \DB::transaction(function () use ($like) {
                $like->delete();
                $this->product->decrement('like');
            });
        }

        $this->emit('updateLike', ['productId' => $this->product->id]);
    }

    public function render()
    {
        return view('livewire.user.products.like');
    }
}
