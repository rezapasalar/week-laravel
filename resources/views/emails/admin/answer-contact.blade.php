@component('mail::message')

<div class="{{ $contact->locale == 'fa' ? 'text-right' : '' }}">
@if($contact->locale == 'fa') سلام @else Hi @endif {{ $contact->name }}
</div>

<div class="{{ $contact->locale == 'fa' ? 'text-right' : '' }}">
@if($contact->locale == 'fa') موضوع شما :  @else Your subject :  @endif {{ $contact->subject }}
</div>

<br>
<hr>
<br>

<p class="{{ $contact->locale == 'fa' ? 'text-right' : '' }}">
{{ $body }}
</p>

@component('mail::button', ['url' => config('app.url') . "/contact"])
@if($contact->locale == 'fa') پاسخ از طریق فرم تماس با ما @else Reply via contact form @endif<br>
@endcomponent

<div style="direction: {{ $contact->locale == 'fa' ? 'rtl' : 'ltr' }}">
@if($contact->locale == 'fa') تشکر @else Thanks @endif,<br>
@if($contact->locale == 'fa') {{ getSettings()->app_name_fa }} @else {{ getSettings()->app_name_en }} @endif<br>
</div>

@endcomponent
