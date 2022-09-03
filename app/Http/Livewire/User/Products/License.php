<?php

namespace App\Http\Livewire\User\Products;

use Livewire\Component;
use App\Models\License as LicenseModel;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class License extends Component
{
    public $username;

    public $rules = [
        'username' => ['required', 'exists:licenses,username']
    ];

    public function handle()
    {
        $this->validate();

        $license = LicenseModel::whereUsername($this->username)->first();

        if ($license->expires_at < now()) {
            throw ValidationException::withMessages([
                'username' => __('response.expires_license')
            ]);
        }

        Session::put('license', $this->username);

        Session::save();

        $this->emit('updateInformationProduct');
    }

    public function render()
    {
        return view('livewire.user.products.license');
    }
}
