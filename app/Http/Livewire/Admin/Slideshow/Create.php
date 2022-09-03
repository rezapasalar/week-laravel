<?php

namespace App\Http\Livewire\Admin\Slideshow;

use App\Http\Livewire\MyComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Create extends MyComponent
{
    use WithFileUploads, AuthorizesRequests;

    public $createImageModal = false;

    public $photo = null;

    public $rules = [
        'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:512', 'dimensions:width=1500,height=800'],
    ];

    public function open()
    {
        $this->authorize('slideshow:create');

        $this->dispatchBrowserEvent('close:createPhotoSlideshow');

        $this->createImageModal = true;

        $this->resetErrorBag();

        $this->resetValidation();

        $this->photo = null;
    }

    public function cancel()
    {
        $this->createImageModal = false;
    }

    public function create()
    {
        $this->authorize('slideshow:create');

        $this->validate();

        $this->slideshowPhotoUpload();

        $this->createImageModal = false;

        $this->emit('refreshImageList');

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_insert')]);
    }

    public function render()
    {
        return view('livewire.admin.slideshow.create');
    }
}
