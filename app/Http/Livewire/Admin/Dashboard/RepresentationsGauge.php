<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class RepresentationsGauge extends Component
{
    public function render()
    {
        return <<<'blade'
            <div style="background-color: #006064" class="flex justify-between items-center text-white rounded-md col-span-4 md:col-span-2 lg:col-span-1 px-3 py-8 text-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                
                <div class="flex flex-col">
                    <span class="text-2xl">{{ enToFa(\App\Models\Representation::count()) }}</span>
                    <small>نمایندگی ها</small>
                </div>
            </div>
        blade;
    }
}
