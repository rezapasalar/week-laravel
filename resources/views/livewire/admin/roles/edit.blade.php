<x-admin.global.form-modal type="edit" subject="role" description="برای انتخاب چند سطح دسترسی باید دکمه ctrl را نگه داشته و سپس گزینه های خود را انتخاب نمایید.">
    <x-both.form.input-group name="name" />
    <x-both.form.input-group name="label" />
    <x-both.form.select-group name="permissions" multiple="on">
        <x-slot name="options">
            @foreach(\App\Models\Permission::all() as $permission)
                <option value="{{ $permission->id }}">{{ $permission->label }}</option>
            @endforeach
        </x-slot>
    </x-both.form.select-group>
</x-admin.global.form-modal>