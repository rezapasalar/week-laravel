<?php

namespace App\Http\Livewire\Admin\Licenses;

use App\Http\Livewire\MyComponent;
use App\Models\License;

class Index extends MyComponent
{
    protected $listeners = ['refreshLicenseList' => 'mount'];
    
    public $licenses = [];

    public function mount()
    {
        $this->licenses = License::latest()->get();
    }

    public function render()
    {
        authorize(['license:create', 'license:read', 'license:delete', 'license:edit']);

        return view('livewire.admin.licenses.index')->layout('layouts.admin.master');
    }
}
