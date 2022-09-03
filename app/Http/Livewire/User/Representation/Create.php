<?php

namespace App\Http\Livewire\User\Representation;

use App\Events\RepresentationEvent;
use App\Http\Livewire\MyComponent;
use App\Models\Representation;
use Illuminate\Support\Facades\Log;

class Create extends MyComponent
{
    public $errorPosition = 'bottom-end';

    public Representation $representation;

    public $rules = [
        'representation.name' => ['required', 'max:32'],
        'representation.company_name' => ['required', 'max:64'],
        'representation.city' => ['required', 'max:32'],
        'representation.phone' => ['required', 'max:32'],
        'representation.address' => ['required', 'max:128'],
        'representation.description' => ['max:512'],
    ];

    public function mount()
    {
        $this->representation = new Representation();

        $this->representation->address = '';
        
        $this->representation->description = '';
    }

    public function create()
    {
        $this->validate();

        $this->representation->locale = app()->currentLocale();

        $this->representation->save();
         
        $this->dispatchBrowserEvent('alert-wot:success', ['title' => __('fields.successful'), 'message' => __('response.successful_send_request_representation'), 'confirmButtonText' => __('button.understand')]);

        $this->resetForm();

        try {
            broadcast(new RepresentationEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }

    public function resetForm()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->representation = new Representation();

        $this->representation->address = '';

        $this->representation->description = '';
        
        $this->dispatchBrowserEvent('scroll:top');
    }

    public function render()
    {
        if (getSettings()->allow_representation_form ?? 1) {
            return view('livewire.user.representation.create');
        }

        return abort(404);
    }
}
