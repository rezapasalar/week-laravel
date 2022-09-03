<?php

namespace App\Http\Livewire\Admin\Managers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public User $user;

    public $name;

    public $email;

    public $roles = [];

    public $password = null;

    public $password_confirmation;

    public $editManagerModal = false;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($this->user->id)],
            'roles' => ['required', 'exists:roles,id'],
            'password' => ['string', 'min:8', 'max:64', 'confirmed'],
        ];
    }

    public function mount()
    {
        $this->user = new User();
    }

    public function open(User $user)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->user = $user;

        $this->name = $user->name;

        $this->email = $user->email;

        $this->roles = $user->roles->pluck('id')->toArray();

        $this->password = '';

        $this->password_confirmation = '';

        $this->editManagerModal = true;
    }

    public function edit()
    {
        $this->validate();

        $password = (!$this->password)
                        ? $this->user->password
                        : Hash::make($this->password);

        $this->user->update([
            'is_super_admin' => false,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $password,
        ]);

        $this->user->roles()->sync($this->roles);

        $this->emit('refreshRow' . $this->user->id);

        $this->editManagerModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);
    }
    
    public function cancel()
    {
        $this->editManagerModal = false;
    }

    public function render()
    {
        return view('livewire.admin.managers.edit');
    }
}
