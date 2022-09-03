<?php

namespace App\Http\Livewire\Admin\Categories;

use Livewire\Component;

class Item extends Component
{
    public $index;

    public $category;

    public function getListeners()
    {
        return [
            'refreshRow' . $this->category->id => '$refresh'
        ];
    }

    public function delete()
    {
        $this->category->delete();

        $this->emit('refreshCategoriesList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);
    }

    public function render()
    {
        return view('livewire.admin.categories.item');
    }
}
