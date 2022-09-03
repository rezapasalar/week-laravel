<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Events\CommentEvent;
use App\Models\Comment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Item extends Component
{
    use AuthorizesRequests;

    public $index;

    public $comment;

    protected function getListeners()
    {
        return ['refreshRow' . $this->comment->id => '$refresh'];
    }

    public function delete()
    {
        $this->authorize('comment:delete');

        $this->comment->delete();

        $this->emit('updateSidebar');

        $this->emit('refreshCommentList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_delete')]);

        try {
            broadcast(new CommentEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }

    public function toggleApproved()
    {
        $this->authorize('comment:upproved');
        
        $this->comment->approved = !$this->comment->approved;

        if ($this->comment->approved) {
            $this->comment->product()->increment('comment_count');
        } else {
            $this->comment->product()->decrement('comment_count');
        }

        if (!$this->comment->read_at) {

            $this->comment->read_at = now();

            broadcast(new CommentEvent())->toOthers();

            $this->emit('updateSidebar');
        }

        $this->comment->save();
    }

    public function render()
    {
        return view('livewire.admin.comments.item');
    }
}
