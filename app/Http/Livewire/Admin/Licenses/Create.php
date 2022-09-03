<?php

namespace App\Http\Livewire\Admin\Licenses;

use App\Http\Livewire\MyComponent;
use App\Models\License;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends MyComponent
{
    use AuthorizesRequests;
    
    public $expires_at = 2;

    public $number = 1;

    public $username = '';

    public $createLicenseModal = false;

    public $rules = [
        'expires_at' => ['required', 'in:1,2,3,4,5'],
        'number' => ['required', 'integer'],
        'username' => ['required', 'unique:licenses,username'],
    ];

    public function open()
    {
        $this->authorize('license:create');

        $this->resetErrorBag();

        $this->resetValidation();

        $this->expires_at = 2;

        $this->number = 1;

        $this->username = '';

        $this->createLicenseModal = true;
    }

    public function create()
    {
        $this->authorize('license:create');

        $this->validate();

        License::create([
            'username' => $this->username,
            'expires_at' => $this->generateExpiresAt()
        ]);

        $this->emit('refreshLicenseList');

        $this->createLicenseModal = false;

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
        $this->createLicenseModal = false;
    }

    public function render()
    {
        return view('livewire.admin.licenses.create');
    }
}
