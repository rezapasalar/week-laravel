<x-jet-section-title>
    <x-slot name="title">
        <div class="flex text-gray-600 dark:text-gray-100">
            {{ $icon }}
            <span class="px-2">{{ $title }}</span>
        </div>
    </x-slot>
    <x-slot name="description">
        <div class="text-justify text-gray-500 dark:text-gray-300 leading-8">
            {{ $description }}
        </div>
    </x-slot>
</x-jet-section-title>
