<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class ProductsGauge extends Component
{
    public function render()
    {
        return <<<'blade'
            <div style="background-color: #0277bd" class="flex justify-between items-center text-white rounded-md col-span-4 md:col-span-2 lg:col-span-1 px-3 py-8 text-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-10" viewBox="0 0 52 52" data-name="Layer 1"><g><path d="M31.9,39.5h6A1.42,1.42,0,0,0,39.4,38V14a1.42,1.42,0,0,0-1.5-1.5h-6A1.42,1.42,0,0,0,30.4,14V38A1.42,1.42,0,0,0,31.9,39.5Z"/><path d="M45.4,39.5h3A1.42,1.42,0,0,0,49.9,38V14a1.42,1.42,0,0,0-1.5-1.5h-3A1.42,1.42,0,0,0,43.9,14V38A1.42,1.42,0,0,0,45.4,39.5Z"/><path d="M25,39.5h0A1.37,1.37,0,0,0,26.5,38V14A1.42,1.42,0,0,0,25,12.5h0A1.42,1.42,0,0,0,23.5,14V38A1.37,1.37,0,0,0,25,39.5Z"/><path d="M16.6,39.5H18A1.42,1.42,0,0,0,19.5,38V14A1.42,1.42,0,0,0,18,12.5H16.5A1.42,1.42,0,0,0,15,14V38A1.45,1.45,0,0,0,16.6,39.5Z"/><path d="M3.6,39.5h6A1.42,1.42,0,0,0,11.1,38V14a1.42,1.42,0,0,0-1.5-1.5h-6A1.42,1.42,0,0,0,2.1,14V38A1.47,1.47,0,0,0,3.6,39.5Z"/></g></svg>
                </div>
                
                <div class="flex flex-col">
                    <span class="text-2xl">{{ enToFa(\App\Models\Product::count()) }}</span>
                    <small>محصولات</small>
                </div>
            </div>
        blade;
    }
}
