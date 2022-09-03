@props(['bg' => 'bg-blue-100', 'color' => 'text-gray-500', 'message', 'loading' => false])

<div {{ $attributes->merge(['class' => "flex {$bg} rounded-0 md:rounded-lg p-4 mt-4 text-md {$color} flex-1"]) }} role="alert">

    @if($loading)
        <div class="{ $bg } loader ease-linear rounded-full border-4 border-t-4 border-gray-100 h-6 w-6 @fa ml-2 @else mr-2 @endfa"></div>
    @else
        <svg class="w-5 h-5 inline @fa ml-3 @else mr-3 @endfa" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    @endif

    <div>
        <span>{{ $message }}</span>
    </div>
</div>