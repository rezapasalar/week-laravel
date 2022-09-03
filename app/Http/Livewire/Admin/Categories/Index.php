<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{ 
    protected $listeners = ['refreshCategoriesList' => 'mount'];

    public $categories = [];

    public function mount()
    {
        $this->categories = Category::latest()->get();
    }

    public function render()
    {
        return view('livewire.admin.categories.index')->layout('layouts.admin.master');
    }
}
