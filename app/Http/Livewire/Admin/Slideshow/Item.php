<?php

namespace App\Http\Livewire\Admin\Slideshow;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class Item extends Component
{
    use AuthorizesRequests;
    
    public $filename;

    public $size;

    public function getListeners()
    {
        return [
            'refreshImage' . $this->filename => 'refreshImage'
        ];
    }

    public function refreshImage($size)
    {
        $this->size = $size;

        $this->render();
    }

    public function delete()
    {
        $this->authorize('slideshow:delete');

        $path = storage_path('app/public/slideshow-photos/') . $this->filename;

        if (File::exists($path)) {
            File::delete($path);

            $this->emit('refreshImageList');

            $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_insert')]);
        } else {
            $this->dispatchBrowserEvent('toast:success', ['message' => __('response.operation_failed')]);
        }
    }

    public function render()
    {
        return view('livewire.admin.slideshow.item');
    }
}
