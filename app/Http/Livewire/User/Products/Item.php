<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;
use App\Models\Like;

class Item extends Component
{
    public $product;

    public $filter;

    public function like()
    {
        $like = Like::whereIpAddress(request()->ip())->whereProductId($this->product->id)->first();

        if (!$like) {
            \DB::transaction(function () {
                Like::create([
                    'product_id' => $this->product->id,
                    'ip_address' => request()->ip()
                ]);
    
                $this->product->increment('like');
                cache()->delete($this->filter);
            });
        } else {
            \DB::transaction(function () use ($like) {
                $like->delete();

                $this->product->decrement('like');
                cache()->delete($this->filter);
            });
        }
    }

    public function render()
    {
        return view('livewire.user.products.item');
    }
}
