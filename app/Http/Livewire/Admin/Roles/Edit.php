<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;

class Edit extends Component
{
    public $editRoleModal = false;

    public Role $role;

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

    public function mount()
    {
        $this->role = new Role();
    }

    public function open(Role $role)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->role = $role;

        $this->name = $role->name;

        $this->label = $role->label;

        $this->permissions = $role->permissions->pluck('id')->toArray();

        $this->editRoleModal = true;
    }

    public function edit()
    {
        $this->validate();

        $this->role->update([
            'name' => $this->name,
            'label' => $this->label,
        ]);

        $this->role->permissions()->sync($this->permissions);

        $this->emit('refreshRow' . $this->role->id);

        $this->editRoleModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);
    }
    
    public function cancel()
    {
        $this->editRoleModal = false;
    }
    
    public function render()
    {
        return view('livewire.admin.roles.edit');
    }
}
