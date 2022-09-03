<x-admin.global.form-modal type="edit" subject="manager" description="ایمیل باید یکتا باشد و رمز عبور حداقل 8 کاراکتر و حداکثر 64 کاراکتر باشد. همچنین برای انتخاب چند سطح مقام باید دکمه ctrl را نگه داشته و سپس گزینه های خود را انتخاب نمایید.">
    <x-both.form.input-group name="name" action="edit" />
    <x-both.form.input-group name="email" action="edit" dir="ltr" />
    <x-both.form.select-group name="roles" multiple="on">
        <x-slot name="options">
            @foreach(\App\Models\Role::all() as $role)
                <option value="{{ $role->id }}">{{ $role->name }} - {{ $role->label }}</option>
            @endforeach
        </x-slot>
    </x-both.form.select-group>
    <x-both.form.input-group name="password" action="edit" type="password" dir="ltr" />
    <x-both.form.input-group name="password_confirmation" action="edit" type="password" dir="ltr" />
</x-admin.global.form-modal>