<x-user.global.form-step x-ref="step3">
    <div>
        <x-both.form.column-grid>
            <x-both.form.select-group name="willingness_work">
                <option value></option>
                @foreach(config('employment')['willingness_work'] as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-both.form.select-group>
            <x-both.form.input-group name="name_guarantor" require="off" />
        </x-both.form.column-grid>

        <x-both.form.column-grid>
            <x-both.form.select-group name="work_experience">
                <option value></option>
                <option value="0">دارم</option>
                <option value="1">ندارم</option>
            </x-both.form.select-group>
            <x-both.form.textarea-group name="work_experience_description" maxLength="512" require="off" />
        </x-both.form.column-grid>
    </div>
</x-user.global.form-step>
