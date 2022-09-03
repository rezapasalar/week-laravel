<?php

namespace App\Http\Livewire\Admin\Employments;

use App\Events\EmploymentEvent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class Item extends Component
{
    use AuthorizesRequests;

    public $index;

    public $employment;

    public function getListeners()
    {
        return [
            'refreshRow' . $this->employment->id => '$refresh'
        ];
    }

    public function delete()
    {
        $this->authorize('employment:delete');

        $this->employment->delete();

        if (File::exists("storage/employment-photos/{$this->employment->photo_path}")) {
            File::delete("storage/employment-photos/{$this->employment->photo_path}");
        }

        $this->emit('updateSidebar');

        $this->emit('refreshEmploymentList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);

        try {
            broadcast(new EmploymentEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }
    
    public function render()
    {
        return view('livewire.admin.employments.item')->layout('layouts.admin.master');
    }
}
