@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600 my-slow-motion']) }}>{{ $message }}</p>
@enderror
