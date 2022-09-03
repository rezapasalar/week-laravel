<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Events\CommentEvent;
use App\Http\Livewire\MyComponent;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class Show extends MyComponent
{
    protected $listeners = ['closeShowComment' => 'cancel'];

    public Comment $comment;

    public $showCommentModal = false;

    public function mount()
    {
        $this->comment = new Comment();
    }

    public function open(Comment $comment)
    {
        authorize(['comment:create', 'comment:edit', 'comment:read']);

        $this->resetErrorBag();

        $this->resetValidation();

        $this->comment = $comment;

        $this->showCommentModal = true;

        if(!$this->comment->read_at) {

            $this->comment->update(['read_at' => now()]);

            $this->emit('updateSidebar');

            $this->emit('refreshRow' . $this->comment->id);

            try {
                broadcast(new CommentEvent())->toOthers();
            } catch (\RuntimeException $e) {
                Log::error($e);
            }

        }
    }

    public function cancel()
    {
        $this->showCommentModal = false;
    }

    public function render()
    {
        return view('livewire.admin.comments.show');
    }
}
