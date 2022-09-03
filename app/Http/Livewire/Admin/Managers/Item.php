<?php

namespace App\Http\Livewire\Admin\Managers;

use App\Http\Livewire\MyComponent;

class Item extends MyComponent
{
    public $index;

    public $user;

    public function getListeners()
    {
        return [
            'refreshRow' . $this->user->id => '$refresh'
        ];
    }

    public function delete()
    {   
        $this->user->delete();

        $this->emit('refreshUserList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);
    }

    public function render()
    {
        return view('livewire.admin.managers.item');
    }
}
