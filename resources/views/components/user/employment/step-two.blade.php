<x-user.global.form-step x-ref="step2">
    <div>
        <x-both.form.column-grid>
            <x-both.form.input-group name="father_job" require="off" />
            <x-both.form.select-group name="military_status" disabled="{{ !$gender ? 'on' : 'off' }}" require="{{ !$gender ? 'off' : 'on' }}">
                <option value="0"></option>
                @foreach(array_splice(config('employment')['military_status'], 1) as $key => $value)
                    <option value="{{ $key + 1 }}">{{ $value }}</option>
                @endforeach
            </x-both.form.select-group>
        </x-both.form.column-grid>

        <x-both.form.column-grid>
            <x-both.form.select-group name="education">
                <option value></option>
                @foreach(config('employment')['education'] as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </x-both.form.select-group>
            <x-both.form.input-group name="field" require="off" />
        </x-both.form.column-grid>
    </div>
</x-user.global.form-step>
