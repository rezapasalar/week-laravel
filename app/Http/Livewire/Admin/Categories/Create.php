<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public Category $category;

    public $createCategoryModal = false;

    public $rules = [
        'category.name_fa' => ['required', 'max: 32', 'unique:categories,name_fa'],
        'category.name_en' => ['required', 'max: 32', 'unique:categories,name_en']
    ];

    public function mount()
    {
        $this->category = new Category();
    }

    public function open()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->category = new Category();

        $this->createCategoryModal = true;
    }

    public function create()
    {
        $this->validate();

        $this->category->save();

        $this->emit('refreshCategoriesList');

        $this->createCategoryModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_insert')]);

        cache()->flush();
    }
    
    public function cancel()
    {
        $this->createCategoryModal = false;
    }

    public function render()
    {
        return view('livewire.admin.categories.create');
    }
}
