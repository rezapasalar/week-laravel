<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class TableTitle extends Component
{
    public $titles = [];

    public function render()
    {
        return <<<'blade'
            <thead>
                <tr class="bg-gray-800 text-white truncate">
                    @foreach($this->titles as $title)
                        <td class="p-3">{{ $title }}</td>
                    @endforeach
                </tr>
            </thead>
        blade;
    }
}