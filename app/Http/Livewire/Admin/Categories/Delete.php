<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Delete extends Component
{
    public $category;

    public $password;

    public $deleteCategoryModal = false;

    public $rules = [
        'password' => ['required']
    ];

    public function open()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->password = '';

        $this->deleteCategoryModal = true;
    }

    public function delete()
    {
        $this->validate();

        if (! Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('response.password_does_not_match_records')],
            ]);
        }

        $this->category->delete();

        $this->emit('refreshCategoriesList');

        $this->deleteCategoryModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);

        cache()->flush();
    }
    
    public function cancel()
    {
        $this->deleteCategoryModal = false;
    }

    public function render()
    {
        return view('livewire.admin.categories.delete');
    }
}
