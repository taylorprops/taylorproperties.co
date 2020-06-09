<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	Contact request sent from www.taylorproperties.co
</div>
@component('mail::message')

<div style="font-size: 18px; font-weight: bold">Contact form submitted on taylorproperties.co</div>
<table cellpadding="6" style="max-width: 600px;" width="600">
    <tbody>
        <tr>
            <td align="right">Name:</td>
            <td><strong>{{ $user -> name }}</strong></td>
        </tr>
        <tr>
            <td align="right">Phone:</td>
            <td><strong>{{ $user -> phone }}</strong></td>
        </tr>
        <tr>
            <td align="right">Email:</td>
            <td><strong>{{ $user -> email }}</strong></td>
        </tr>
        <tr>
            <td align="right" valign="top">Message:</td>
            <td><strong>{!! nl2br($user -> message) !!}</strong></td>
        </tr>
    </tbody>
</table>
<br>

@endcomponent