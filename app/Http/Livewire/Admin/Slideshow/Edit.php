<?php

namespace App\Http\Livewire\Admin\Slideshow;

use App\Http\Livewire\MyComponent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\WithFileUploads;

class Edit extends MyComponent
{
    use WithFileUploads, AuthorizesRequests;

    public $editImageModal = false;

    public $photo = null;

    public $filename = '';

    public $rules = [
        'photo' => ['required', 'mimes:jpg,jpeg,png', 'max:512', 'dimensions:width=1500,height=800'],
    ];

    public function open($filename)
    {
        $this->authorize('slideshow:edit');

        $this->filename = $filename;

        $this->dispatchBrowserEvent('close:editPhotoSlideshow');

        $this->editImageModal = true;

        $this->resetErrorBag();

        $this->resetValidation();

        $this->photo = null;

        $this->filename = '';
    }

    public function cancel()
    {
        $this->editImageModal = false;
    }

    public function edit()
    {
        $this->authorize('slideshow:edit');
        
        $this->validate();

        $this->slideshowPhotoUpload($this->filename);

        $this->editImageModal = false;

        $this->emit('refreshImage' . $this->filename, $this->photo->getSize());

        $this->dispatchBrowserEvent('toast:success', ['message' => __('response.successful_update')]);
    }

    public function render()
    {
        return view('livewire.admin.slideshow.edit');
    }
}
