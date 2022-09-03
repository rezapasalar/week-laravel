<div x-data="{body: @entangle('body').defer}" class="mt-8">
    <div class="flex justify-between items-center pb-3">
        <h4 class="font-bold text-gray-600 dark:text-gray-400">{{ __('comment.send') }}</h4>
        <span x-text="@fa enToFa(256 - body.length) @else 256 - body.length @endfa" class="text-gray-300 text-sm"></span>
    </div>
    <textarea x-model="body" maxLength="256" wire:model.defer="body" rows="4" class="text-gray-500 dark:text-gray-200 border-gray-300 dark:border-gray-800 dark:bg-gray-900 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full" placeholder="{{ __('comment.enter') }}"></textarea>
    <x-jet-input-error for="body" class="mt-2" />

    <div class="@fa text-left @else text-right @endfa mt-6">
        <x-jet-secondary-button class="px-2" wire:click="submit" wire:loading.attr="disabled">{{ __('button.submit') }}</x-jet-secondary-button>
    </div>
</div>
