<?php

namespace App\Http\Livewire\Admin\Layouts\Sections;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Employment;
use App\Models\Representation;
use Livewire\Component;

class Sidebar extends Component
{
    protected $listeners = [
        'updateSidebar' => 'mount',
        'echo-private:channel-representation,RepresentationEvent' => 'mount',
        'echo-private:channel-employment,EmploymentEvent' => 'mount',
        'echo-private:channel-contact,ContactEvent' => 'mount',
        'echo-private:channel-comment,CommentEvent' => 'mount',
    ];

    public $representationCount = 0;

    public $employmentsCount = 0;

    public $contactsCount = 0;

    public $commentsCount = 0;

    public function mount()
    {
        $this->representationCount = Representation::whereNull('read_at')->count();

        $this->employmentsCount = Employment::whereNull('read_at')->count();

        $this->contactsCount = Contact::whereNull('read_at')->whereNull('parent_id')->count();

        $this->commentsCount = Comment::whereNull('read_at')->count();
    }

    public function render()
    {
        return view('livewire.admin.layouts.sections.sidebar');
    }
}
