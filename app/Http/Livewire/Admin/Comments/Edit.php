<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class Edit extends Component
{
    use AuthorizesRequests;

    public Comment $comment;

    public $rules = [
        'comment.body' => ['required', 'min:8', 'max:256']
    ];

    public function update()
    {
        $this->authorize('comment:edit');

        $this->validate();

        $this->comment->save();

        $this->emit('refreshRow' . $this->comment->id);

        if ($this->comment->parent_id) {
            $this->emit('closeShowComment');
        }

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);
    }

    public function render()
    {
        return view('livewire.admin.comments.edit');
    }
}
