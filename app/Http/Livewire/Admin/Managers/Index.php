<?php

namespace App\Http\Livewire\Admin\Managers;

use App\Http\Livewire\MyComponent;
use App\Models\User;

class Index extends MyComponent
{
    protected $listeners = ['refreshUserList' => '$refresh'];

    public $search;

    public $queryString = ['search'];
    
    public function render()
    {
        $users = User::query()->where('is_super_admin', 0);

        if ($this->search) {
            $users = $users
                        ->where('name', 'LIKE', "%{$this->search}%")
                        ->orWhere('email', 'LIKE', "%{$this->search}%");

        }

        $users = $users->latest()->get();

        return view('livewire.admin.managers.index', compact('users'))->layout('layouts.admin.master');
    }
}