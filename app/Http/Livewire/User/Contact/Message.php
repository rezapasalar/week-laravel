<?php

namespace App\Http\Livewire\User\Contact;

use App\Events\ContactEvent;
use App\Http\Livewire\MyComponent;
use App\Mail\user\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Message extends MyComponent
{
    public Contact $contact;

    public $rules = [
        'contact.name' => ['required', 'max:32'],
        'contact.email' => ['required', 'email', 'max:128'],
        'contact.subject' => ['required', 'min:4', 'max:32'],
        'contact.body' => ['required', 'min:32', 'max:512'],
    ];

    public function mount()
    {
        $this->contact = new Contact();

        $this->contact->body = '';
    }

    public function create()
    {
        $this->validate();

        $this->contact->locale = app()->currentLocale();

        $result = $this->contact->save();

        $allowEmail = getSettings()->allow_email ?? 1;

        if ($result && $allowEmail) {
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactMail($this->contact));
        }
        
        $this->dispatchBrowserEvent('alert-wot:success', ['title' => __('fields.successful'), 'message' => __('response.successful_send_message'), 'confirmButtonText' => __('button.understand')]);

        $this->resetForm();

        try {
            broadcast(new ContactEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }

    public function resetForm()
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->contact = new Contact();

        $this->contact->body = '';
        
        // $this->dispatchBrowserEvent('scroll:top');
    }

    public function render()
    {
        return view('livewire.user.contact.message');
    } 
}
