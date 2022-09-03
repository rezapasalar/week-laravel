<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;

class Item extends Component
{
    public $index;

    public $role;

    public function getListeners()
    {
        return [
            'refreshRow' . $this->role->id => '$refresh'
        ];
    }

    public function delete()
    {       
        $this->role->delete();

        $this->emit('refreshRoleList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);
    }

    public function render()
    {
        return view('livewire.admin.roles.item');
    }
}
