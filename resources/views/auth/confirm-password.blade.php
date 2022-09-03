<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            این یک منطقه امن برنامه است. لطفاً قبل از ادامه رمز عبور خود را تأیید کنید.
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="رمز عبور" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required@ autocomplete="current-password" autofocus dir="ltr" />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    تایید
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
