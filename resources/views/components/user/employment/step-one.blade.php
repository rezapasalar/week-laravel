<x-user.global.form-step x-ref="step1">
    <div>
        <x-both.form.column-grid>
            <x-both.form.input-group name="first_name" />
            <x-both.form.input-group name="last_name" />
        </x-both.form.column-grid>

        <x-both.form.column-grid>
            <x-both.form.input-group name="code" maxLength="10" dir="ltr" />
            <x-both.form.select-group name="year" dir="ltr">
                <option value></option> 
                @foreach(range(1390, 1330) as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </x-both.form.select-group>
        </x-both.form.column-grid>

        <x-both.form.column-grid>
            <x-both.form.select-group name="gender">
                <option value></option>
                <option value="0">زن</option>
                <option value="1">مرد</option>
            </x-both.form.select-group>
            <x-both.form.select-group name="marital_status">
                <option value></option>
                <option value="0">مجرد</option>
                <option value="1">متاهل</option>
            </x-both.form.select-group>
        </x-both.form.column-grid>
    </div>
</x-user.global.form-step>
