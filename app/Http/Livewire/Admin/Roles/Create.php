<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;

class Create extends Component
{
    public $createRoleModal = false;

    public $name;

    public $label;

    public $permissions = [];

    public function rules()
    {
        return [
            'name' => ['required', 'max:32'],
            'label' => ['required', 'max:32'],
            'permissions' => ['required', 'exists:permissions,id']
        ];
    }

    public function open()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->name = '';

        $this->label = '';

        $this->permissions = [];

        $this->createRoleModal = true;
    }

    public function create()
    {
        $this->validate();

        $role = Role::create([
            'name' => $this->name,
            'label' => $this->label
        ]);

        $role->permissions()->sync($this->permissions);

        $this->emit('refreshRoleList');

        $this->createRoleModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_insert')]);
    }
    
    public function cancel()
    {
        $this->createRoleModal = false;
    }

    public function render() 
    {
        return view('livewire.admin.roles.create');
    }
}
