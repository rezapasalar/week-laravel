<?php

namespace App\Http\Livewire\Admin\Licenses;

use App\Http\Livewire\MyComponent;
use App\Models\License;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\Rule;

class Edit extends MyComponent 
{
    use AuthorizesRequests;

    public $expires_at = 2;

    public $number = 1;

    public $username = '';

    public $license;

    public $editLicenseModal = false;

    public function rules()
    {
        return [
            'expires_at' => ['required', 'in:1,2,3,4,5'],
            'number' => ['required', 'integer'],
            'username' => ['required', Rule::unique('licenses', 'username')->ignore($this->username, 'username')],
        ];
    }

    public function open(License $license)
    {
        $this->authorize('license:edit');

        $this->resetErrorBag();

        $this->resetValidation();

        $this->expires_at = 2;

        $this->number = 1;

        $this->username = $license->username;

        $this->license = License::whereUsername($this->username)->first();

        $this->editLicenseModal = true;
    }

    public function edit()
    {
        $this->authorize('license:edit');
        
        $this->validate();

        $this->license->update([
            'username' => $this->username,
            'expires_at' => $this->generateExpiresAt()
        ]);

        $this->emit('refreshLicenseList');

        $this->editLicenseModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_insert')]);
    }

    private function generateExpiresAt()
    {
        return match((string) $this->expires_at) {
            '1' => now()->addMinutes($this->number),
            '2' => now()->addHours($this->number),
            '3' => now()->addDays($this->number),
            '4' => now()->addMonths($this->number),
            '5' => now()->addYears($this->number),
        };
    }
    
    public function cancel()
    {
        $this->editLicenseModal = false;
    }

    public function render()
    {
        return view('livewire.admin.licenses.edit');
    }
}
