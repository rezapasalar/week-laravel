<?php

namespace App\Http\Livewire\Admin\Roles;

use App\Models\Role;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['refreshRoleList' => '$refresh'];

    public $search;

    public $queryString = ['search'];
    
    public function render()
    {
        $roles = Role::query();

        if ($this->search) {
            $roles = $roles
                        ->where('name', 'LIKE', "%{$this->search}%")
                        ->orWhere('label', 'LIKE', "%{$this->search}%");

        }

        $roles = $roles->get()->reverse();

        return view('livewire.admin.roles.index', compact('roles'))->layout('layouts.admin.master');
    }
}
