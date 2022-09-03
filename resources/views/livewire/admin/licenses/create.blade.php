<x-admin.global.form-modal type="create" subject="license" description="برای ایجاد لایسنس توجه داشته باشید که نام کاربری باید یکتا باشد و همچنین نام کاربری را انگلیسی و بدون فاصله انتخاب کنید.">
    <x-both.form.select-group name="expires_at" label="نوع انقضا">
        <x-slot name="options">
            <option value="1">دقیقه</option>
            <option value="2">ساعت</option>
            <option value="3">روز</option>
            <option value="4">ماه</option>
            <option value="5">سال</option>
        </x-slot>
    </x-both.form.select-group>
    <x-both.form.input-group name="number" dir="ltr" />
    <x-both.form.input-group name="username" dir="ltr" />
</x-admin.global.form-modal>
