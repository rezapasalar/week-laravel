@section('title', __('menu.representation'))

<x-user.global.form-page title="{{ __('representation.title') }}" description="{{ __('representation.description') }}">
    <x-slot name="icon">
        <x-both.svg.representation />
    </x-slot>

    <form wire:submit.prevent="create">
        <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 sm:rounded-tl-md sm:rounded-tr-md">
            <div wire:offline class="bg-blue-100 text-gray-500 p-5 rounded border mb-6 w-full"> 
                {{ __('response.check_internet') }}
            </div>

            <x-both.form.column-grid>
                <x-both.form.input-group name="representation.name" />
                <x-both.form.input-group name="representation.company_name" />
            </x-both.form.column-grid>

            <x-both.form.column-grid>
                <x-both.form.input-group name="representation.city" />
                <x-both.form.input-group name="representation.phone" dir="ltr" />
            </x-both.form.column-grid>                     

            <x-both.form.input-group name="representation.address" counter="on" maxLength="128" />
            <x-both.form.textarea-group name="representation.description" counter="on" maxLength="512" require="off" />
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-700/50 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
            <x-jet-secondary-button wire:click="resetForm" wire:offline.attr="disabled" wire:loading.attr="disabled" wire:target="create" class="@fa ml-2 @else mr-2 @endfa dark:bg-gray-600/90">{{ __('button.reset') }}</x-jet-secondary-button>
            <x-jet-button wire:offline.attr="disabled" wire:target="resetForm">{{ __('button.insert') }}</x-jet-button>
        </div>
    </form>
</x-user.global.form-page>

