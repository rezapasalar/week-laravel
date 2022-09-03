<div class="max-w-7xl mx-auto py-8 sm:px-6 lg:px-8 my-required-star">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <x-user.global.introduction :title="$title" :description="$description">
            <x-slot name="icon">{{ $icon }}</x-slot>
        </x-user.global.introduction>
        <div class="md:col-span-2 rounded-0 md:rounded-lg shadow-md">
            {{ $slot }}
        </div>
    </div>
</div>
