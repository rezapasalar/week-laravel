<x-user.global.form-page title="{{ __('contact.title') }}" description="{{ __('contact.description') }}">
    <x-slot name="icon">
        <x-both.svg.contact />
    </x-slot>

    <div wire:offline class="bg-red-700 text-white p-5 rounded border dark:border-0 mb-6 w-full"> 
        {{ __('response.check_internet') }}
    </div>

    <form wire:submit.prevent="create">
        <div class="p-6 bg-white dark:bg-gray-800 md:rounded-t-lg">
            <x-both.form.column-grid>
                <x-both.form.input-group name="contact.name" />
                <x-both.form.input-group name="contact.email" />
            </x-both.form.column-grid>
            <x-both.form.input-group name="contact.subject" />
            <x-both.form.textarea-group name="contact.body" maxLength="512" />
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-700/50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
            <x-jet-secondary-button wire:offline.attr="disabled" wire:loading.attr="disabled" class="@fa ml-2 @else mr-2 @endfa dark:bg-gray-600/90" wire:click="resetForm">{{ __('button.reset') }}</x-jet-secondary-button>
            <x-jet-button wire:offline.attr="disabled">{{ __('button.insert') }}</x-jet-button>
        </div>
    </form>
</x-user.global.form-page>