<?php

namespace App\Http\Livewire\Admin\Representations;

use App\Events\RepresentationEvent;
use App\Http\Livewire\MyComponent;
use App\Models\Representation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;

class Edit extends MyComponent
{
    use AuthorizesRequests;

    public Representation $representation;

    public $editRepresentationModal = false;

    public function rules()
    {
        return [
            'representation.name' => ['required', 'max:128'],
            'representation.company_name' => ['required', 'max:128'],
            'representation.city' => ['required', 'max:64'],
            'representation.phone' => ['required', 'max:32'],
            'representation.address' => ['required', 'max:256'],
            'representation.description' => [],
        ];
    }

    public function mount()
    {
        $this->representation = new Representation();
    }

    public function open(Representation $representation)
    {
        $this->authorize('representation:edit');
        
        $this->resetErrorBag();

        $this->resetValidation();

        $this->representation = $representation;

        $this->editRepresentationModal = true;

        if (!$this->representation->read_at) {

            $this->representation->update(['read_at' => now()]);

            try {
                broadcast(new RepresentationEvent())->toOthers();
            } catch (\RuntimeException $e) {
                Log::error($e);
            }
    
            $this->emit('updateSidebar');
            
            $this->emit('refreshRow');

        }
    }

    public function edit()
    {
        $this->authorize('representation:edit');
        
        $this->validate();

        $this->representation->save();

        $this->emit('refreshRow' . $this->representation->id);

        $this->editRepresentationModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);

        try {
            broadcast(new RepresentationEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }
    
    public function cancel()
    {
        $this->editRepresentationModal = false;
    }

    public function render()
    {
        return view('livewire.admin.representations.edit');
    }
}
