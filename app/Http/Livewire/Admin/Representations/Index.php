<?php

namespace App\Http\Livewire\Admin\Representations;

use App\Models\Representation;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshRepresentationList' => '$refresh',
        'echo-private:channel-representation,RepresentationEvent' => '$refresh',
    ];

    public $search;

    public $queryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPage()
    {
        $this->dispatchBrowserEvent('scroll:top');
    }

    public function render()
    {
        authorize(['representation:create', 'representation:read', 'representation:delete', 'representation:edit']);

        $representations = Representation::query();

        if ($this->search != '') {
            $representations = $representations
                                    ->where('name', 'like', "%{$this->search}%")
                                    ->orWhere('company_name', 'like', "%{$this->search}%")
                                    ->orWhere('city', 'like', "%{$this->search}%")
                                    ->orWhere('phone', 'like', "%{$this->search}%")
                                    ->orWhere('address', 'like', "%{$this->search}%");
        }

        $representations = $representations->latest()->paginate(10);

        $this->dispatchBrowserEvent('loading:work:space');
        
        return view('livewire.admin.representations.index', compact('representations'))->layout('layouts.admin.master');
    }
}
