<?php

namespace App\Http\Livewire\Admin\Products;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Item extends Component
{
    use AuthorizesRequests;
    
    public $index;

    public $product;

    public function getListeners()
    {
        return [
            'refreshRow' . $this->product->id => '$refresh'
        ];
    }

    public function delete()
    {
        $this->authorize('product:delete');
        
        $this->product->delete();

        if (File::exists("storage/product-photos/{$this->product->photo_path}")) {
            File::delete("storage/product-photos/{$this->product->photo_path}");
        }

        $this->emit('refreshProductsList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);

        cache()->flush();
    }

    public function render()
    {
        return view('livewire.admin.products.item');
    }
}
