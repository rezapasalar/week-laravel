<?php

namespace App\Http\Livewire\Admin\Managers;

use Livewire\Component;

class Roles extends Component
{
    public $rolesUserModal = false;

    public function open()
    {
        $this->resetErrorBag();
        
        $this->rolesUserModal = true;
    }

    public function render()
    {
        return view('livewire.admin.managers.roles');
    }
}
