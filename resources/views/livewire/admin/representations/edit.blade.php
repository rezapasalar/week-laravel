@php
    $dir = $representation->locale == 'fa' ? 'rtl' : 'ltr';
@endphp

<x-admin.global.form-modal type="edit" subject="representation">
    <x-both.form.input-group name="representation.name" dir="{{ $dir }}" />
    <x-both.form.input-group name="representation.company_name" dir="{{ $dir }}" />
    <x-both.form.input-group name="representation.city" dir="{{ $dir }}" />
    <x-both.form.input-group name="representation.phone" dir="ltr" dir="{{ $dir }}" />
    <x-both.form.input-group name="representation.address" dir="{{ $dir }}" />
    <x-both.form.textarea-group name="representation.description" maxLength="512" dir="{{ $dir }}" />
</x-admin.global.form-modal>
