<?php

namespace App\Http\Livewire\Admin\Comments;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $select = 2;

    protected $listeners = [
        'searchHandler',
        'refreshCommentList' => '$refresh',
        'echo-private:channel-comment,CommentEvent' => '$refresh',
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
        authorize(['comment:create', 'comment:read', 'comment:delete', 'comment:edit']);

        $comments = Comment::query();

        switch($this->select) {
            case 3:
                $employments = $comments->whereNull('parent_id');
                break;

            case 4:
                $employments = $comments->whereNotNull('parent_id');
                break;

            default:
                if ($this->select == 0 || $this->select == 1) {
                    $comments = $comments->whereApproved($this->select); 
                }
                break;
        }

        $comments = $comments->with(['product'])->latest()->paginate(10);

        $this->dispatchBrowserEvent('loading:work:space');

        return view('livewire.admin.comments.index', compact('comments'))->layout('layouts.admin.master');
    }
}
