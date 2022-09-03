<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class CommentsGauge extends Component
{
    public function render()
    {
        return <<<'blade'
            <div style="background-color: #00acc1" class="flex justify-between items-center text-white rounded-md col-span-4 md:col-span-2 lg:col-span-1 px-3 py-8 text-center">
                <div>
                    <svg fill="none" viewBox="0 0 22 22" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                </div>
                
                <div class="flex flex-col">
                    <span class="text-2xl">{{ enToFa(\App\Models\Comment::count()) }}</span>
                    <small>کامنت ها</small>
                </div>
            </div>
        blade;
    }
}
