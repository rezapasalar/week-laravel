@component('mail::message')

<div class="{{ $contact->locale == 'fa' ? 'text-right' : '' }}">
{{ $contact->name }}
</div>

<div class="{{ $contact->locale == 'fa' ? 'text-right' : '' }}">
@if($contact->locale == 'fa') موضوع :  @else subject :  @endif {{ $contact->subject }}
</div>

<br>
<hr>
<br>

<p class="{{ $contact->locale == 'fa' ? 'text-right' : '' }}">
{{ $contact->body }}
</p>

@endcomponent
