<?php

namespace App\Http\Livewire\Admin\Slideshow;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class Index extends Component
{
    protected $listeners = ['refreshImageList' => 'mount'];

    public $files = [];
    
    public function mount()
    {
        foreach(File::allFiles(storage_path('app/public/slideshow-photos')) as $image)
        {
            array_push($this->files, $image->getFilename());
        }
    }

    public function render()
    {
        authorize(['slideshow:create', 'slideshow:read', 'slideshow:delete', 'slideshow:edit']);

        return view('livewire.admin.slideshow.index')->layout('layouts.admin.master');
    }
}
