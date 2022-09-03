<div class="mt-8">
    <div class="text-sm text-gray-500">

        <x-both.alert.simple class="text-sm" :message="__('response.license_enter')" />
        
        <div class="mt-4 relative">
            <x-jet-input type="text" class="w-full" wire:model.defer="username" wire:keydown.enter="handle" dir="ltr" />

            <x-jet-input-error for="username" class="mt-2" />

            <x-jet-button class="px-2 absolute top-1 right-1" wire:click="handle" wire:loading.attr="disabled">
                {{ __('button.apply') }}
            </x-jet-button>
        </div>
        
    </div>
</div>