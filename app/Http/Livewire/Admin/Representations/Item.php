<?php

namespace App\Http\Livewire\Admin\Representations;

use App\Events\RepresentationEvent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Item extends Component
{
    use AuthorizesRequests;

    public $index;

    public $representation;

    public function getListeners()
    {
        return [
            'refreshRow' . $this->representation->id => '$refresh'
        ];
    }

    public function delete()
    {
        $this->authorize('representation:delete');

        $this->representation->delete();

        $this->emit('updateSidebar');
    
        $this->emit('refreshRepresentationList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);

        try {
            broadcast(new RepresentationEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }

    public function render()
    {
        return view('livewire.admin.representations.item');
    }
}
