<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class LicensesGauge extends Component
{
    public function render()
    {
        return <<<'blade'
            <div style="background-color: #039be5" class="flex justify-between items-center text-white rounded-md col-span-4 md:col-span-2 lg:col-span-1 px-3 py-8 text-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" class="w-10" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
                        <rect x="7" y="12" width="17" height="1.6" class="clr-i-outline--badged clr-i-outline-path-1--badged"/><rect x="7" y="16" width="11" height="1.6" class="clr-i-outline--badged clr-i-outline-path-2--badged"/><rect x="7" y="23" width="10" height="1.6" class="clr-i-outline--badged clr-i-outline-path-3--badged"/><path d="M27.46,17.23a6.36,6.36,0,0,0-4.4,11l-1.94,2.37.9,3.61,3.66-4.46a6.26,6.26,0,0,0,3.55,0l3.66,4.46.9-3.61-1.94-2.37a6.36,6.36,0,0,0-4.4-11Zm0,10.68a4.31,4.31,0,1,1,4.37-4.31A4.35,4.35,0,0,1,27.46,27.91Z" class="clr-i-outline--badged clr-i-outline-path-4--badged"/><path d="M32,13.22v3.34a8.41,8.41,0,0,1,2,1.81v-6A7.45,7.45,0,0,1,32,13.22Z" class="clr-i-outline--badged clr-i-outline-path-5--badged"/><path d="M4,28V8H22.78a7.49,7.49,0,0,1-.28-2H4A2,2,0,0,0,2,8V28a2,2,0,0,0,2,2H19l.57-.7.93-1.14L20.41,28Z" class="clr-i-outline--badged clr-i-outline-path-6--badged"/><circle cx="30" cy="6" r="5" class="clr-i-outline--badged clr-i-outline-path-7--badged clr-i-badge"/>
                        <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
                    </svg>
                </div>
                
                <div class="flex flex-col">
                    <span class="text-2xl">{{ enToFa(\App\Models\License::count()) }}</span>
                    <small>لایسنس ها</small>
                </div>
            </div>
        blade;
    }
}
