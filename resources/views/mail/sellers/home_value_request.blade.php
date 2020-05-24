<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	Seller Home Value Request sent from www.taylorproperties.co
</div>
@component('mail::message')

<div style="font-size: 18px; font-weight: bold">Seller Home Value Request submitted on taylorproperties.co</div>
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

@php
$address = urlencode($lead -> street_number.' '.$lead -> street_name.', '.($lead -> unit != '' ? $lead -> unit.', ' : '').$lead -> l_state.' '.$lead -> l_zip);
@endphp
@component('mail::button', ['url' => 'https://www.narrpr.com/find.aspx?Query='.$address.'&AppPropertyMode=Residential&Action=Reports&ReportType=ResidentialPropertyReport'])
View Property Reports
@endcomponent

@component('mail::button', ['url' => 'https://annearundelproperties.net/new/leads/leads.php?show='.$lead -> id])
View Lead Details
@endcomponent
<br>
@endcomponent