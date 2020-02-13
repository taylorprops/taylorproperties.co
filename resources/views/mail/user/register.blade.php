@component('mail::layout')

{{-- Header --}}
@slot('header')
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	Taylor Properties - Property Manager
</div>
@component('mail::header', ['url' => config('app.url')])
<img src="{{ asset('/images/logos/logo-horizantal-white.png') }}" width="200" alt="Taylor Properties">
@endcomponent
@endslot

{{-- Body --}}
Welcome {{ $user -> name }},
<br>
Thank you for registering your Property Manager account with Taylor Properties.
<br>
<br>
You can now save your searches, save your favorite properties and get email updates when new properties in your search
come on the market.
<br>
<br>
To visit your Property Manager page just click on the "My Account" link in the navigation bar on <a href="{{ url('/') }}" target="_blank">{!! url('/') !!}</a>.
<br>
<br>
Thank you,
<br>
Taylor Properties
{{-- Footer --}}
@slot('footer')
@component('mail::footer')

@endcomponent
@endslot
@endcomponent