<?php

namespace App\Http\Livewire\User\Products;

use App\Events\CommentEvent;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class CommentForm extends Component
{
    protected $listeners = ['resetCommentForm'];

    public $product;

    public $body = '';

    public $rules = [
        'body' => ['required', 'min:8', 'max:256']
    ];

    public function submit()
    {
        $this->validate();

        Comment::create([
            'locale' => app()->currentLocale(),
            'product_id' => $this->product->id,
            'body' => $this->body
        ]);

        $this->resetCommentForm($this->product);

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_send_comment')]);

        try {
            broadcast(new CommentEvent())->toOthers();
        } catch (\RuntimeException $e) {
            Log::error($e);
        }
    }

    public function resetCommentForm()
    {   
        $this->body = '';

        $this->resetErrorBag();

        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.user.products.comment-form');
    }
}
