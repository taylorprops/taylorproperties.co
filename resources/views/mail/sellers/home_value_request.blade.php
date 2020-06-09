<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	Seller Home Value Request sent from www.taylorproperties.co
</div>
@component('mail::message')

<div style="font-size: 18px; font-weight: bold">Seller Home Value Request submitted on taylorproperties.co</div>
@if($lead -> exists == 'yes')
<div style="margin: 10px auto; padding: 8px; background: red; color: white">This is from an existing lead</div>
@endif
<table id="" cellpadding="6">
    <tbody>
        <tr>
            <td align="right">Name:</td>
            <td><strong>{{ $lead -> l1_first.' '.$lead -> l1_last }}</strong></td>
        </tr>
        <tr>
            <td align="right">Phone:</td>
            <td><strong>{{ $lead -> l1_phone }}</strong></td>
        </tr>
        <tr>
            <td align="right">Email:</td>
            <td><strong>{{ $lead -> l1_email }}</strong></td>
        </tr>
        <tr>
            <td align="right" valign="top">Property:</td>
            <td><strong>{{ $lead -> l_street.' '.$lead -> l_city.', '.$lead -> l_state.' '.$lead -> l_zip }}</strong></td>
        </tr>
    </tbody>
</table>
<br><br>
@component('mail::button', ['url' => 'https://annearundelproperties.net/new/leads/leads.php?show='.$lead -> id])
View Lead Details
@endcomponent
<br>
@endcomponent