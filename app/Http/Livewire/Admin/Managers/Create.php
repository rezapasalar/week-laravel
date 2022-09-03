<?php

namespace App\Http\Livewire\Admin\Managers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Create extends Component
{
    public $name;

    public $email;

    public $roles = [];

    public $password;

    public $password_confirmation;

    public $createManagerModal = false;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'roles' => ['required', 'exists:roles,id'],
            'password' => ['required', 'string', 'min:8', 'max:64', 'confirmed'],
        ];
    }

    public function open()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->name = '';

        $this->email = '';

        $this->roles = [];

        $this->password = '';

        $this->password_confirmation = '';

        $this->createManagerModal = true;
    }

    public function create()
    {
        $this->validate();

        $user = User::create([
            'is_super_admin' => false,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->roles()->sync($this->roles);

        $this->emit('refreshUserList');

        $this->createManagerModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_insert')]);
    }
    
    public function cancel()
    {
        $this->createManagerModal = false;
    }

    public function render()
    {
        return view('livewire.admin.managers.create');
    }
}
