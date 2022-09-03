<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = ['refreshProductsList'];

    public $search;

    public $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function refreshProductsList()
    {
        $this->resetPage();

        $this->search = null;

        $this->render();
    }

    public function updatingPage()
    {
        $this->dispatchBrowserEvent('scroll:top');
    }

    public function render()
    {
        authorize(['product:create', 'product:read', 'product:delete', 'product:edit']);

        $products = Product::query();

        if($this->search != '' && $this->search != 'all') {

            $id = Category::whereNameEn($this->search)->first()->id;

            $products->whereCategoryId($id, $this->search);

        }

        $products = $products->whereNotNull('category_id')->latest()->paginate(10);

        $this->dispatchBrowserEvent('loading:work:space');

        return view('livewire.admin.products.index', compact('products'))->layout('layouts.admin.master');
    }
}
