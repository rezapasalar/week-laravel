<?php

namespace App\Http\Livewire\Admin\Licenses;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Item extends Component
{
    use AuthorizesRequests;
    
    public $index;

    public $license;

    public function delete()
    {
        $this->authorize('license:delete');

        $this->license->delete();

        $this->emit('refreshLicenseList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);
    }

    public function render()
    {
        return view('livewire.admin.licenses.item');
    }
}
