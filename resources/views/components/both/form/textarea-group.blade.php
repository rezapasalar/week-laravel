@props(['name', 'label' => null, 'maxLength' => 1000, 'require' => 'on'])

@php
    $arrName = explode('.', $name);
    $size = count($arrName);
    $fieldName = !$label
        ? $size > 1 ? __('fields.' . $arrName[1]) : __('fields.' . $name)
        : $label;
@endphp

<div x-data="{subject: @entangle($name).defer}" class="w-full mb-4">
    <div class="flex justify-between">
        <x-jet-label value="{{ $fieldName }}" class="{{ $require == 'on' ? 'my-required' : '' }}" />
        <span x-text="@fa subject ? enToFa({{ $maxLength }} - subject.length) : enToFa({{ $maxLength }}) @else subject ? {{ $maxLength }} - subject.length : {{ $maxLength }} @endfa" class="text-gray-300 dark:text-gray-500 text-sm"></span>
    </div>
    <textarea {{ $attributes }} x-model="subject" wire:model.defer="{{ $name }}" maxLength="{{ $maxLength }}" rows="4" class="border-gray-300 dark:border-gray-800 bg-gray-50 dark:bg-gray-900 text-gray-500 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1 block w-full"></textarea>
    <x-jet-input-error for="{{ $name }}" class="mt-2" />
</div>
