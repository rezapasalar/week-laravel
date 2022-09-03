<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class CategoriesGauge extends Component
{
    public function render()
    {
        return <<<'blade'
            <div style="background-color: #01579b" class="flex justify-between items-center text-white rounded-md col-span-4 md:col-span-2 lg:col-span-1 px-3 py-8 text-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"></path>
                    </svg>
                </div>

                <div class="flex flex-col">
                    <span class="text-2xl">{{ enToFa(\App\Models\Category::count()) }}</span>
                    <small class="ml-2">گروه ها</small>
                </div>
            </div>
        blade;
    }
}
