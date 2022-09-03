@props(['title' => 'تکرار رمز عبور', 'content' => 'برای امنیت خود، لطفا رمز عبور خود را برای ادامه تأیید کنید.', 'button' => 'تایید'])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
<x-jet-dialog-modal wire:model="confirmingPassword">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}

        <div class="mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            <x-jet-input type="password" class="mt-1 block w-full" placeholder="رمز عبور"
                        x-ref="confirmable_password"
                        wire:model.defer="confirmablePassword"
                        wire:keydown.enter="confirmPassword" dir="ltr" />

            <p class="text-sm text-red-600 my-slow-motion mt-2">@error('confirmable_password') {{ __('response.password_does_not_match_records') }} @enderror</p>
        </div>
    </x-slot>

    <x-slot name="footer">
        <div class="text-left">
            <x-jet-secondary-button wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
                انصراف
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
                {{ $button }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-dialog-modal>
@endonce
