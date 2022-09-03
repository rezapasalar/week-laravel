<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Events\ContactEvent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Item extends Component
{
    use AuthorizesRequests;

    protected $listeners = ['refreshRow' => '$refresh'];

    public $index;

    public $contact;

    public function delete()
    {
        $this->authorize('contact:delete');

        $this->contact->delete();

        $this->emit('updateSidebar');

        $this->emit('refreshContactList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);

        try {
            broadcast(new ContactEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }
    
    public function render()
    {
        return view('livewire.admin.contacts.item');
    }
}
