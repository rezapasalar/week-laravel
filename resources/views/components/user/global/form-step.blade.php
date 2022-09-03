<div {{ $attributes }} class="hidden bg-white dark:bg-gray-800 rounded-0 md:rounded-b-lg">
    <div class="px-4 sm:px-6 my-slow-motion">
        {{ $slot }}
    </div>

    <div class="flex items-center justify-end px-4 py-3 mt-3 bg-gray-50 dark:bg-gray-700/20 text-right sm:px-6 rounded-0 md:rounded-b-lg space-x-reverse space-x-2">
        @switch($this->currentStep)
            @case(1)
                <x-jet-button wire:loading.attr="disabled" wire:click="handle">بعدی</x-jet-button>
                @break
            @case(5)
                <x-jet-secondary-button wire:loading.attr="disabled" wire:click="resetForm">بازنویسی</x-jet-secondary-button>
                <x-jet-secondary-button wire:loading.attr="disabled" wire:target="handle" wire:click="previous">قبلی</x-jet-secondary-button>
                <x-jet-button wire:loading.attr="disabled" wire:click="handle">ثبت نهایی</x-jet-button>
                @break
            @default
                <x-jet-secondary-button wire:loading.attr="disabled" wire:click="resetForm">بازنویسی</x-jet-secondary-button>
                <x-jet-secondary-button wire:loading.attr="disabled" wire:target="handle" wire:click="previous">قبلی</x-jet-secondary-button>
                <x-jet-button wire:loading.attr="disabled" wire:click="handle">بعدی</x-jet-button>
        @endswitch
    </div>
</div>
