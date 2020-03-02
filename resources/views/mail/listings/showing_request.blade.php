<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    Showing Request Sent from {{ $showing['name'] }}
</div>
@component('mail::message')
<style>
    th { text-align: left; }
</style>
<div style="font-weight: normal; font-size: 18px; width: 100%; text-align: center">
    Showing Request Sent from <span class="text-primary" style="font-size: 24px;font-weight: bold">{{ $showing['name'] }}</span>
</div>
<br>
<div style="font-weight: bold; font-size: 18px; color: #ff8800">
    Showing Request Details
</div>
<table cellpadding="5">
    <tr>
        <td align="right" width="150">Name</td>
        <td><strong>{{ $showing['name'] }}</strong></td>
    </tr>
    <tr>
        <td align="right">Phone</td>
        <td><strong>{{ $showing['phone'] }}</strong></td>
    </tr>
    <tr>
        <td align="right">Email</td>
        <td><strong>{{ $showing['email'] }}</strong></td>
    </tr>
    <tr>
        <td align="right">Date</td>
        <td><strong>{{ $showing['showing_date'] }}</strong></td>
    </tr>
    <tr>
        <td align="right">Time</td>
        <td><strong>{{ date("h:i A", strtotime($showing['showing_time'])) }}</strong></td>
    </tr>
    @if($showing['showing_date_alt'] != '' && $showing['showing_date_alt'] != '0000-00-00')
    <tr>
        <td align="right">Alternate Date</td>
        <td><strong>{{ $showing['showing_date_alt'] }}</strong></td>
    </tr>
    <tr>
        <td align="right">Alternate Time</td>
        <td><strong>{{ date("h:i A", strtotime($showing['showing_time_alt'])) }}</strong></td>
    </tr>
    @endif
    <tr>
        <td align="right">Comments</td>
        <td><strong>{{ $showing['comments'] }}</strong></td>
    </tr>
    <tr>
        <td align="right">Property Details</td>
        <td><strong>{{ $showing['address'] }}</strong></td>
    </tr>
    <tr>
        <td colspan="2">
            <table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td align="center">
                        @component('mail::button', ['url' => $showing['listing_link']])
                        View Property Details
                        @endcomponent
                    </td>
                    <td align="center">
                        @if(!empty($showing['lead_id']))
                            @component('mail::button', ['url' => 'https://annearundelproperties.net/new/leads/leads.php?show='.$showing['lead_id']])
                            View Client Details
                            @endcomponent
                        @endif
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@if(!empty($showing['other_showings']))
<div style="font-weight: bold; font-size: 18px; color: #ff8800">
    Other Open Requests By This Client
</div>
@component('mail::table')
| Address | Date and Time |
| ----- | ----- | ----- |
@foreach($showing['other_showings'] as $other)
| <a href="{{ config('app.url') }}/search/listing_results?listing_id={{ $other['listing_id'] }}" target="_blank"> {!! $other['address'] !!} </a> | {{ $other['showing_date'] }} <br> {{ date("h:i A", strtotime($other['showing_time'])) }} |
@endforeach
@endcomponent
@endif
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
