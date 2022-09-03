<?php

namespace App\Http\Livewire\Admin\Contacts;

use App\Http\Livewire\MyComponent;
use App\Models\Contact;
use Livewire\WithPagination;

class Index extends MyComponent
{
    use WithPagination;

    public $select = 0;

    protected $listeners = [
        'refreshContactList' => '$refresh',
        'echo-private:channel-contact,ContactEvent' => '$refresh',
    ];

    public function updatingSelect()
    {
        $this->resetPage();
    }

    public function updatingPage()
    {
        $this->dispatchBrowserEvent('scroll:top');
    }

    public function render()
    {
        authorize(['contact:create', 'contact:read', 'contact:delete', 'contact:edit']);

        $contacts = Contact::query();

        switch($this->select) {
            case 1:
                $contacts = $contacts->whereNull('parent_id');
                break;

            case 2:
                $contacts = $contacts->whereNotNull('parent_id');
                break;
        }

        $contacts = $contacts->latest()->paginate(10);

        $this->dispatchBrowserEvent('loading:work:space');
        
        return view('livewire.admin.contacts.index', compact('contacts'))->layout('layouts.admin.master');
    }
}
