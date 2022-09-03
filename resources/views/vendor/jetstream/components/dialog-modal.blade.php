@props(['id' => null, 'maxWidth' => null, 'type' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    @if($type == 'product')
        <div>
            <div class="text-lg px-6 py-3 bg-red-600 dark:bg-gray-900">
                {{ $title }}
            </div>

            <div class="mt-4 px-6 dark:bg-gray-800">
                {{ $content }}
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 dark:bg-gray-900 text-right">
            {{ $footer }}
        </div>
    @else
        <div class="px-6 py-4">
            <div class="text-lg">
                {{ $title }}
            </div>

            <div class="mt-4">
                {{ $content }}
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 dark:bg-gray-900 text-right">
            {{ $footer }}
        </div>
    @endif
</x-jet-modal>
