<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	Property Updates from Taylor Properties
</div>

@component('mail::message')

<div style="font-weight: normal; font-size: 18px; width: 100%; text-align: center">
    Property Updates from Taylor Properties for you search
    <br>
    <span class="text-primary" style="font-size: 24px; font-weight: bold">{{ $email_data['search_name'] }}</span>
</div>
<br>
<br>
You have {{ $email_data['search_count'] }} new listings to view for you search. To view the listings click the button below.
<br>
<br>
@component('mail::button', ['url' => $email_data['search_url']])
View New Listings
@endcomponent

<br>
<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
