<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
	New Lead - A Client Just Registered on www.TaylorProperties.co
</div>
@component('mail::message')

<div style="font-size: 18px; font-weight: bold">A Client Just Registered on taylorproperties.co</div>
<table id="" cellpadding="6">
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
    </tbody>
</table>
<br><br>
@component('mail::button', ['url' => 'https://annearundelproperties.net/new/leads/leads.php?show='.$user -> lead_id])
View Lead Details
@endcomponent
<br>

@endcomponent