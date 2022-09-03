<?php

namespace App\Http\Livewire\Admin\Profile;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.profile.index')->layout('layouts.admin.master');
    }
}
