<?php

namespace App\Http\Livewire\Admin\Products;

use App\Http\Livewire\MyComponent;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;

class Edit extends MyComponent
{
    use WithFileUploads, AuthorizesRequests;

    public Product $product;

    public $photo = null;

    public $editProductModal = false;

    public function rules()
    {
        return [
            'product.code' => ['required', Rule::unique('products', 'code')->ignore($this->product->id)],
            'product.category_id' => ['required', 'exists:categories,id'],
            'product.name_fa' => ['required', 'max: 128', Rule::unique('products', 'name_fa')->ignore($this->product->id)],
            'product.name_en' => ['required', 'max: 128', Rule::unique('products', 'name_en')->ignore($this->product->id)],
            'product.weight' => ['required', 'integer', 'max:65535'],
            'product.number' => ['required', 'integer', 'max:65535'],
            'product.price' => ['required', 'integer'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024', 'dimensions:width=550,height=420'],
        ];
    }

    public function mount()
    {
        $this->product = new Product();
    }

    public function open(Product $product)
    {
        $this->authorize('product:edit');

        $this->resetErrorBag();

        $this->resetValidation();

        $this->product = $product;

        $this->photo = null;

        $this->editProductModal = true;
    }

    public function edit()
    {
        $this->authorize('product:edit');
        
        $this->validate();

        if ($this->photo) {
            $this->productPhotoUpload();
        }

        $this->product->save();

        $this->emit('refreshRow' . $this->product->id);

        $this->editProductModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);

        cache()->flush();
    }
    
    public function cancel()
    {
        $this->dispatchBrowserEvent('close:editProduct');
        
        $this->editProductModal = false;
    }

    public function render()
    {
        return view('livewire.admin.products.edit');
    }
}
