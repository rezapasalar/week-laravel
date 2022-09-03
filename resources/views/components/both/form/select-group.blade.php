@props(['name', 'label' => null, 'dir' => 'rtl', 'multiple' => 'off', 'disabled' => 'off', 'require' => 'on'])

@php
    $arrName = explode('.', $name);
    $size = count($arrName);
    $fieldName = !$label
        ? $size > 1 ? __('fields.' . $arrName[1]) : __('fields.' . $name)
        : $label;
@endphp

<div class="w-full mb-4">
    <x-jet-label value="{{ $fieldName }}" class="{{ $require == 'on' ? 'my-required' : '' }}" />
    <select {{ $attributes }} {{ $disabled == 'on' ? 'disabled' : '' }} {{ $multiple == 'on' ? 'multiple' : '' }} wire:model.defer="{{ $name }}" dir="{{ $dir }}" class="{{ $multiple == 'on' ? 'h-[200px]' : '' }} {{ $dir == 'rtl' ? 'bg-[left_0.5rem]' : 'bg-[right_0.5rem]' }} {{ $disabled == 'on' ? 'bg-gray-50/50 dark:bg-gray-700/50 dark:border-gray-900/50' : '' }} focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-lg border-gray-300 w-full p-2 mt-1 block dark:border-gray-900 bg-gray-50 dark:bg-gray-900 text-gray-500 dark:text-gray-300">
        {{ $slot }}
    </select>
    <x-jet-input-error for="{{ $name }}" class="mt-2" />
</div>
