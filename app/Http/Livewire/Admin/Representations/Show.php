<?php

namespace App\Http\Livewire\Admin\Representations;

use App\Events\RepresentationEvent;
use App\Models\Representation;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Show extends Component
{
    public Representation $representation;

    public $showRepresentationModal = false;

    public function mount()
    {
        $this->representation = new Representation();
    }

    public function open(Representation $representation)
    {
        $this->representation = $representation;

        $this->showRepresentationModal = true;

        if (!$this->representation->read_at) {

            $this->representation->update(['read_at' => now()]);
    
            $this->emit('updateSidebar');
            
            $this->emit('refreshRow' . $this->representation->id);

            try {
                broadcast(new RepresentationEvent())->toOthers();
            } catch (\RuntimeException $e) {
                Log::error($e);
            }

        }
    }

    public function render()
    {
        return view('livewire.admin.representations.show');
    }
}
