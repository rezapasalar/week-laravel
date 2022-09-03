<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Events\ContactEvent;
use App\Http\Livewire\MyComponent;
use App\Mail\Admin\ContactAnswerMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Show extends MyComponent
{
    public $showContactModal = false;

    public Contact $contact;

    public $body = '';

    public $rules = [
        'body' => ['required', 'max:512']
    ];

    public function mount()
    {
        $this->contact = new Contact();

        $this->body = '';
    }

    public function open(Contact $contact)
    {
        authorize(['contact:create', 'contact:read']);

        $this->resetErrorBag();

        $this->resetValidation();
        
        $this->contact = $contact;

        $this->body = '';

        $this->lang = true;

        $this->showContactModal = true;

        if (!$this->contact->read_at) {

            $this->contact->update(['read_at' => now()]);
    
            $this->emit('updateSidebar');
            
            $this->emit('refreshRow');

            try {
                broadcast(new ContactEvent())->toOthers();
            } catch (\RuntimeException $e) {
                Log::error($e);
            }

        }
    }

    public function cancel()
    {
        $this->showContactModal = false;
    }

    public function submit()
    {
        $this->validate();

        Contact::create([
            'locale' => $this->contact->locale,
            'parent_id' => $this->contact->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'subject' =>  $this->contact->subject,
            'body' => $this->body,
            'read_at' => now()
        ]);

        Mail::to($this->contact->email)->send(new ContactAnswerMail($this->contact, $this->body));

        $this->showContactModal = false;

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_send_message')]);
    }

    public function render()
    {
        return view('livewire.admin.contacts.show');
    }
}
