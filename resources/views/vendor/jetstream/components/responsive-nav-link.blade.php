@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-red-500 text-base font-medium text-gray-500 dark:text-gray-100 bg-red-50 dark:bg-gray-700 focus:outline-none focus:text-red-800 focus:bg-red-100 focus:border-red-500 transition'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-500 dark:text-gray-100 hover:text-gray-800 hover:bg-red-50 dark:hover:bg-gray-700/20 hover:border-red-100 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
