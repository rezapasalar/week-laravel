<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class ContactsGauge extends Component
{
    public function render()
    {
        return <<<'blade'
            <div style="background-color: #0097a7" class="flex justify-between items-center text-white rounded-md col-span-4 md:col-span-2 lg:col-span-1 px-3 py-8 text-center">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                
                <div class="flex flex-col">
                    <span class="text-2xl">{{ enToFa(\App\Models\Contact::count()) }}</span>
                    <small>تماس با ما</small>
                </div>
            </div>
        blade;
    }
}
