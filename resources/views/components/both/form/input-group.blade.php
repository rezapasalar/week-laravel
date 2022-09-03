@props(['name', 'label' => null, 'maxLength' => 1000, 'counter' => 'off', 'action' => null, 'require' => 'on'])

@php
    $arrName = explode('.', $name);
    $size = count($arrName);
    $fieldName = !$label
        ? $size > 1 ? __('fields.' . $arrName[1]) : __('fields.' . $name)
        : $label;
@endphp

<div class="w-full mb-4">
    @if (isset($counter) && $counter == 'on')
        <div x-data="{subject: @entangle($name).defer}" class="col-span-6 sm:col-span-4 mb-4">
            <div class="flex justify-between">
                <x-jet-label value="{{ $fieldName }}" class="{{ $require == 'on' ? 'my-required' : '' }}" />
                <span x-text="@fa subject ? enToFa({{ $maxLength }} - subject.length) : enToFa({{ $maxLength }}) @else subject ? {{ $maxLength }} - subject.length : {{ $maxLength }} @endfa" class="text-gray-300 dark:text-gray-500 text-sm"></span>
            </div>
            <x-jet-input {{ $attributes }} x-model="subject" wire:model.defer="{{ $name }}" wire:keydown.enter="{{ $action != null ? $action : null }}" type="{{ $type ?? 'text'}}" class="mt-1 block w-full" maxLength="{{ $maxLength }}" />
            <x-jet-input-error for="{{ $name }}" class="mt-2" />
        </div>
    @else
        <x-jet-label value="{{ $fieldName }}" class="{{ $require == 'on' ? 'my-required' : '' }}" />
        <x-jet-input {{ $attributes }} wire:model.defer="{{ $name }}" wire:keydown.enter="{{ $action != null ? $action : null }}" type="{{ $type ?? 'text'}}" class="mt-1 block w-full" maxLength="{{ $maxLength }}" />
        <x-jet-input-error for="{{ $name }}" class="mt-2" />
    @endif
</div>