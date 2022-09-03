<?php

namespace App\Http\Livewire\Admin\Employments;

use App\Events\EmploymentEvent;
use App\Models\Employment;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Show extends Component
{
    public Employment $employment;

    public $showEmploymentModal = false;

    public function mount()
    {
        $this->employment = new Employment();
    }

    public function open(Employment $employment)
    {
        $this->employment = $employment;

        $this->showEmploymentModal = true;

        if(!$this->employment->read_at) {

            $this->employment->update(['read_at' => now()]);   

            $this->emit('updateSidebar');

            $this->emit('refreshRow' . $this->employment->id);

            try {
                broadcast(new EmploymentEvent())->toOthers();
            } catch (\RuntimeException $e) {
                Log::error($e);
            }

        }
    }

    public function render()
    {
        return view('livewire.admin.employments.show')->layout('layouts.admin.master');
    }
}
