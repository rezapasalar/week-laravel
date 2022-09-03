@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-400 dark:text-gray-500']) }}>
    {{ $value ?? $slot }}
</label>
