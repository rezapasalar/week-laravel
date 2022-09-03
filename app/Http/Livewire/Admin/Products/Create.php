<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Livewire\MyComponent;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Create extends MyComponent
{
    use WithFileUploads, AuthorizesRequests;

    public Product $product;

    public $createProductModal = false;

    public $photo = null;

    public $rules = [
        'product.code' => ['required', 'unique:products,code'],
        'product.category_id' => ['required', 'exists:categories,id'],
        'product.name_fa' => ['required', 'max: 128', 'unique:products,name_fa'],
        'product.name_en' => ['required', 'max: 128', 'unique:products,name_en'],
        'product.weight' => ['required', 'integer', 'max:65535'],
        'product.number' => ['required', 'integer', 'max:65535'],
        'product.price' => ['required', 'integer'],
        'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:1024', 'dimensions:width=550,height=420'],
    ];

    public function mount()
    {
        $this->product = new Product();
    }

    public function open()
    {
        $this->authorize('product:create');
        
        if (!Category::count()) {

            $this->createProductModal = false;

            $this->dispatchBrowserEvent('toast:error', ['message' => __('اپتدا گروهی ثبت نمایید')]);

            return;

        }

        $this->resetErrorBag();

        $this->resetValidation();

        $this->product = new Product();

        $this->photo = null;

        $this->createProductModal = true;
    }

    public function create()
    {
        $this->authorize('product:create');

        if (!$this->product->category_id) {
            $this->product->category_id = Category::first()->id;
        }

        $this->validate();

        $this->productPhotoUpload();

        $this->product->save();

        $this->emit('refreshProductsList');

        $this->createProductModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_insert')]);

        cache()->flush();
    }
    
    public function cancel()
    {
        $this->dispatchBrowserEvent('close:createProduct');
        
        $this->createProductModal = false;
    }

    public function render()
    {
        return view('livewire.admin.products.create');
    }
}
