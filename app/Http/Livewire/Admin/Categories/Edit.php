<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;

    public $editCategoryModal = false;

    public function rules()
    {
        return [
            'category.name_fa' => ['required', 'max: 32', Rule::unique('categories', 'name_fa')->ignore($this->category->id)],
            'category.name_en' => ['required', 'max: 32', Rule::unique('categories', 'name_en')->ignore($this->category->id)]
        ];
    }

    public function mount()
    {
        $this->category = new Category();
    }

    public function open(Category $category)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->category = $category;

        $this->editCategoryModal = true;
    }

    public function edit()
    {
        $this->validate();

        $this->category->save();

        $this->editCategoryModal = false;

        $this->emit('refreshRow' . $this->category->id);

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);

        cache()->flush();
    }
    
    public function cancel()
    {
        $this->editCategoryModal = false;
    }

    public function render()  
    {
        return view('livewire.admin.categories.edit');
    }
}
