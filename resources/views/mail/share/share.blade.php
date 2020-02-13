<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">

</div>
@component('mail::message')
<strong>From {{ $share['from_name'].' - '.$share['from_email'] }}</strong>
<br>
{!! $share['message'] !!}

@endcomponent