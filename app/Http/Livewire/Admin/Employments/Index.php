<?php

namespace App\Http\Livewire\Admin\Employments;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Employment;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Index extends Component
{
    use WithPagination, AuthorizesRequests; 

    protected $listeners = [
        'searchHandler',
        'refreshEmploymentList' => '$refresh',
        'echo-private:channel-employment,EmploymentEvent' => '$refresh',
    ];

    public $first_select = 0;

    public $second_select = null;

    public $search;

    public function searchHandler($first_select, $second_select)
    {
        $this->first_select = $first_select;

        $this->second_select = $second_select;

        $this->search = null;

        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->first_select = 4;

        $this->resetPage();
    }

    public function updatingPage()
    {
        $this->dispatchBrowserEvent('scroll:top');
    }

    public function render()
    {
        authorize(['employment:create', 'employment:read', 'employment:delete', 'employment:edit']);

        $employments = Employment::query();

        switch($this->first_select) {
            case 1:
                $employments = $employments->whereGender($this->second_select);
                break;

            case 2:
                $employments = $employments->where('year', '>=', $this->second_select);
                break;

            case 3:
                $employments = $employments->whereEducation($this->second_select);
                break;

            case 4:
                $employments = $employments
                                    ->where('first_name', 'LIKE', "%{$this->search}%")
                                    ->orWhere('last_name', 'LIKE', "%{$this->search}%")
                                    ->orWhere('code', 'LIKE', "{$this->search}%");
                break;
        }

        $employments = $employments->latest()->paginate(10);

        $this->dispatchBrowserEvent('loading:work:space');

        return view('livewire.admin.employments.index', compact('employments'))->layout('layouts.admin.master');
    }
}
