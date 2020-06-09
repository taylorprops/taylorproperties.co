<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	Property Info Request sent from www.taylorproperties.co
</div>
@component('mail::message')

<div style="font-size: 18px; font-weight: bold">Property Information Request submitted on taylorproperties.co</div>
<table id="" cellpadding="6">
    <tbody>
        <tr>
            <td align="right">Name:</td>
            <td><strong>{{ $info -> name }}</strong></td>
        </tr>
        <tr>
            <td align="right">Phone:</td>
            <td><strong>{{ $info -> phone }}</strong></td>
        </tr>
        <tr>
            <td align="right">Email:</td>
            <td><strong>{{ $info -> email }}</strong></td>
        </tr>
        <tr>
            <td align="right" valign="top">Message:</td>
            <td><strong>{!! nl2br($info -> comments) !!}</strong></td>
        </tr>
    </tbody>
</table>
<br><br>
@component('mail::button', ['url' => config('app.url').'/search/listing_results?listing_id='.$info -> listing_id])
View Property Details
@endcomponent
<br>

@endcomponent