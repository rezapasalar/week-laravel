<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0 space-y-5">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>

        <p class="text-sm text-gray-600">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
