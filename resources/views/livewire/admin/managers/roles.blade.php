<div class="mr-2">
    <x-jet-button wire:click="open" wire:loading.attr="disabled">
        {{ __('سطح دسترسی') }}
    </x-jet-button>

    <!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="rolesUserModal">
        <x-slot name="title">
            {{ __('فرم سطح دسترسی') }}
        </x-slot>

        <x-slot name="content" class="overflow-auto">
            {{ __('') }}

            <div class="mt-4">
                <x-jet-label>{{ __('عنوان') }}</x-jet-label>
                <select multiple wire:model.defer="product.category_id" style="background-position: left 0.5rem center;" class="focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full p-2 rounded border-gray-300">
                    @foreach(config('roles') as $role)
                        <option value="{{ $role['id'] }}" class="px-10">{{ $role['description'] }}</option>
                    @endforeach
                </select>

                <x-jet-input-error for="product.category_id" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label>{{ __('ایمیل') }}</x-jet-label>
                <x-jet-input type="text" class="mt-1 block w-full"
                            wire:model.defer="email"
                            wire:keydown.enter="create"
                            dir="ltr" />

                <x-jet-input-error for="email" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label>{{ __('رمز عبور') }}</x-jet-label>
                <x-jet-input type="password" class="mt-1 block w-full"
                            wire:model.defer="password"
                            wire:keydown.enter="create"
                            dir="ltr" />

                <x-jet-input-error for="password" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-jet-label>{{ __('تایید رمز عبور') }}</x-jet-label>
                <x-jet-input type="password" class="mt-1 block w-full"
                            wire:model.defer="password_confirmation"
                            wire:keydown.enter="create"
                            dir="ltr" />

                <x-jet-input-error for="password_confirmation" class="mt-2" />
            </div>
            
        </x-slot>

        <x-slot name="footer">
            <div class="text-left">
            <x-jet-secondary-button wire:click="cancel" wire:loading.attr="disabled">
                {{ __('all.cancel') }}
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled" wire:target="photo">
                {{ __('all.insert') }}
            </x-jet-button>
            </div>
        </x-slot>
    </x-jet-dialog-modal>
</div>