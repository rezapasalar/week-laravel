@section('title', __('menu.employment'))

<div
    x-data="{percent: 0}" 
    x-init="
        $refs.step1.style.display = 'block';
        window.addEventListener('change:step', ({detail: {step, percent: per}}) => {
            percent = per;
            if (percent != per) $dispatch('scroll:top');
            [...Array(5).keys()].forEach(item => $refs[`step${item + 1}`].style.display = 'none');
            $refs[`step${step}`].style.display = 'block';
        })
    "
>
    <x-user.global.form-page title="{{ __('employment.title') }}" description="{{ __('employment.description') }}">
        <x-slot name="icon">
            <x-both.svg.employment />
        </x-slot>

        <x-user.employment.progress-bar />

        <x-user.employment.step-one />

        <x-user.employment.step-two :gender="$gender" />

        <x-user.employment.step-three />

        <x-user.employment.step-four />

        <x-user.employment.step-five />

    </x-user.global.form-page>
</div>
