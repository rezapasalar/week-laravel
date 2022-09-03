<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Answer extends Component
{
    use AuthorizesRequests;
    
    public Comment $comment;

    public $body = '';

    public $rules = [
        'body' => ['required', 'min:8', 'max:256']
    ];

    public function answer()
    {
        $this->authorize('comment:create');

        $this->validate();

        Comment::create([
            'locale' => $this->comment->locale,
            'parent_id' => $this->comment->id,
            'product_id' => $this->comment->product_id,
            'body' => $this->body,
            'approved' => 1,
            'read_at' => now()
        ]);

        $this->emit('closeShowComment');

        $this->emit('refreshCommentList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);
    }

    public function render()
    {
        return view('livewire.admin.comments.answer');
    }
}
