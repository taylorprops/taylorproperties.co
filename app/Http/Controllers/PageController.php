<?php

namespace App\Http\Controllers;

use App\Agent;
use App\FeaturedListings;
use App\Messages;
use App\Notifications\ContactForm;
use App\Notifications\HomeValueRequest;
use App\OfficeLocation;
use Config;
use Illuminate\Http\Request;
use App\Prospects;
use App\ProspectNotes;
use App\Leads;
use App\LeadsNotes;
use App\User;

class PageController extends Controller {
    public function index() {
        $sliders        = array();
        $total          = 24;
        $slide_rows     = 4;
        $slides_per_row = 6;
        for ($i = 0; $i < $total; $i += $slides_per_row) {
            $sliders[] = FeaturedListings::where('ListPictureURL', '!=', '')
                -> where('PublicRemarks', '!=', '')
                -> whereNotNull('ListPictureURL')
                -> whereNotNull('PublicRemarks')
                -> offset($i)
                -> limit($slides_per_row)
                -> get();
        }

        return view('welcome-gp', compact('sliders'));


    }

    public function about() {
        return view('about.about');
    }
    public function team() {
        return view('about.team');
    }
    public function partners() {
        return view('about.partners');
    }
    public function privacypolicy() {
        return view('privacypolicy');
    }
    public function offices() {
        $locations = OfficeLocation::orderBy('heading') -> get();
        return view('about.offices') -> with('locations', $locations);
    }

    public function agents_list(Request $request) {

        $agents = Agent::where('company', 'Taylor Properties')
            -> orderByRaw('SUBSTR(photo_url, 1, 2) DESC')
            -> orderByRaw('designations DESC')
            -> orderByRaw('bio DESC')
            -> offset(0)
            -> paginate(24);
        return view('agents.agents_results', ['agents' => $agents]);
    }

    public function searchAgents(Request $request) {

        $agents = Agent::where('company', 'Taylor Properties')
            -> where(function($query) use ($request) {
                $query -> where('firstname', 'like', '%' . $request -> val . '%')
                    -> orWhere('lastname', 'like', '%' . $request -> val . '%')
                    -> orWhere('fullname', 'like', '%' . $request -> val . '%')
                    -> orWhere('cell', 'LIKE', '%' . $request -> val . '%')
                    -> orWhere('bio', 'LIKE', '%' . $request -> val . '%')
                    -> orWhere('designations', 'LIKE', '%' . $request -> val . '%');
            })
            -> orderByRaw('SUBSTR(photo_url, 1, 2) DESC')
            -> orderByRaw('designations DESC')
            -> orderByRaw('bio DESC')
            -> paginate(24);
        //$agents -> appends(request() -> query()) -> links();

        return view('agents.agents_results', ['agents' => $agents]);

    }

    public function searchResults() {
        return view('agents.agents_results');
    }

    public function showAgent(Request $request) {

        $agent = Agent::where('agent_id', $request -> id) -> first();

        return view('agents.agent_profile', ['agent' => $agent]);
    }

    public function showAgentProfile(Request $request) {

        $agent = Agent::where('agent_id', $request -> id) -> first();
        return view('agents.agent_profile_page', ['agent' => $agent]);
    }

    public function save_home_value_request(Request $request) {

        $full_address = $request -> full_address;
        $street_number = $request -> street_number;
        $unit = $request -> unit;
        $street_name = $request -> street_name;
        $city = $request -> city;
        $county = $request -> county;
        $state = $request -> state;
        $zip = $request -> zip;

        $first_name = $request -> first_name;
        $last_name = $request -> last_name;
        $phone = $request -> phone;
        $email = $request -> email;

        // add to leads database if not in there already
        $existing = Leads::where('l1_email', $email) -> first();

        // add to leads
        $lead = new Leads();
        $lead -> l_source = 'Website - Home Value Request';
        $lead -> l1_email = $email;
        $lead -> l1_first = $first_name;
        $lead -> l1_last = $last_name;
        $lead -> l1_phone = $phone;
        $lead -> l_status = 'Lead';
        $lead -> l_type = 'Sell';
        $lead -> p_type = 'Y';
        $lead -> p_location = $county . ' - '.$state;
        $lead -> l_street = $street_number.' '.$street_name. ($unit != '' ? ' '.$unit : '');
        $lead -> l_city = $city;
        $lead -> l_state = $state;
        $lead -> l_zip = $zip;
        $lead -> listing_street = $street_number.' '.$street_name. ($unit != '' ? ' '.$unit : '');
        $lead -> listing_city = $city;
        $lead -> listing_state = $state;
        $lead -> listing_zip = $zip;
        if(!$existing) {
            $lead -> save();
            $lead_id = $lead -> id;
            $lead -> exists = 'no';
        } else {
            $lead_id = $existing -> id;
            $lead -> exists = 'yes';
        }
        $lead -> id = $lead_id;
        $lead -> full_address = $full_address;
        $lead -> street_number = $street_number;
        $lead -> street_name = $street_name;
        $lead -> unit = $unit;



        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.contactually.com/v2/contacts",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\"data\":{\"tags\":[\"Source: Taylor Properties\", \"Seller\"],\"addresses\":[{\"street_1\":\"".$street_number.' '.$street_name." ".$unit."\",\"city\":\"".$city."\",\"state\":\"".$state."\",\"zip\":\"".$zip."\"}],\"email_addresses\":[{\"address\":\"".$email."\"}],\"phone_numbers\":[{\"number\":\"".$phone."\"}],\"bucket_ids\":[\"bucket_125452144\"],\"first_name\":\"".$first_name."\",\"last_name\":\"".$last_name."\",\"assigned_to_id\":\"user_304134\",\"created_at\":\"".date("Y-m-d")."\"}}",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: Bearer ".Config::get('contactually.contactually_key')."",
            "content-type: application/json",
            "Cookie: _enforcery_session_id_production=f881322cf6cabb55add2b4e3d8e850d6"
        ),
        ));

        $response = curl_exec($curl);

        $address_url = urlencode($street_number.' '.$street_name . ($unit != '' ? ', ' . $unit : '') . ', '.$city.', '.$state.', '.$zip);

        $prop_links = '
        <table>
            <tr>
                <th colspan="2">Property Links</th>
            </tr>
            <tr>
                <td style="white-space: nowrap">Property / Listing Details</td>
                <td>
                    <a href="https://www.narrpr.com/find.aspx?Query='.$address_url.'&AppPropertyMode=Residential&Action=PropertyDetails&DetailsTab=Summary" target="_blank">View</a>
                </td>
            </tr>
            <tr>
                <td style="white-space: nowrap">Reports</td>
                <td>
                    <a href="https://www.narrpr.com/find.aspx?Query='.$address_url.'&AppPropertyMode=Residential&Action=Reports&ReportType=ResidentialPropertyReport" target="_blank">View</a>
                </td>
            </tr>
            <tr>
                <td style="white-space: nowrap">Neighborhoods</td>
                <td>
                    <a href="https://www.narrpr.com/find.aspx?Query='.urlencode($city.', '.$state).'&AppPropertyMode=Residential&Action=NeighborhoodDetails&DetailsTab=Summary" target="_blank">View</a>
                </td>
            </tr>
            <tr>
                <td style="white-space: nowrap">School Details</td>
                <td>
                    <a href="https://www.narrpr.com/find.aspx?Query='.$address_url.'&AppPropertyMode=Residential&Action=SchoolDetails&DetailsTab=Summary" target="_blank">View</a>
                </td>
            </tr>
        </table>';

        $response = json_decode($response, true);

        $contact_id = $response['data']['id'];

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.contactually.com/v2/notes",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\"data\":{\"body\":\"".$prop_links."\",\"contact_id\":\"".$contact_id."\",\"timestamp\":\"".date("Y-m-d H:i:s")."\"}}",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: Bearer ".Config::get('contactually.contactually_key')."",
            "content-type: application/json",
            "Cookie: _enforcery_session_id_production=f881322cf6cabb55add2b4e3d8e850d6"
        ),
        ));

        $response = curl_exec($curl);


        curl_close($curl);


        $to_email = Config::get('email_routing.home_value_request.email');
        \Notification::route('mail', $to_email) -> notify(new HomeValueRequest($lead));


    }

    public function save_home_value_request(Request $request) {

        $full_address = $request -> full_address;
        $street_number = $request -> street_number;
        $unit = $request -> unit;
        $street_name = $request -> street_name;
        $city = $request -> city;
        $county = $request -> county;
        $state = $request -> state;
        $zip = $request -> zip;

        $first_name = $request -> first_name;
        $last_name = $request -> last_name;
        $phone = $request -> phone;
        $email = $request -> email;

        // add to leads database if not in there already
        $existing = Leads::where('l1_email', $email) -> first();

        // add to leads
        $lead = new Leads();
        $lead -> l_source = 'Website - Home Value Request';
        $lead -> l1_email = $email;
        $lead -> l1_first = $first_name;
        $lead -> l1_last = $last_name;
        $lead -> l1_phone = $phone;
        $lead -> l_status = 'Lead';
        $lead -> l_type = 'Sell';
        $lead -> p_type = 'Y';
        $lead -> p_location = $county . ' - '.$state;
        $lead -> l_street = $street_number.' '.$street_name. ($unit != '' ? ' '.$unit : '');
        $lead -> l_city = $city;
        $lead -> l_state = $state;
        $lead -> l_zip = $zip;
        $lead -> listing_street = $street_number.' '.$street_name. ($unit != '' ? ' '.$unit : '');
        $lead -> listing_city = $city;
        $lead -> listing_state = $state;
        $lead -> listing_zip = $zip;
        if(!$existing) {
            $lead -> save();
            $lead_id = $lead -> id;
            $lead -> exists = 'no';
        } else {
            $lead_id = $existing -> id;
            $lead -> exists = 'yes';
        }
        $lead -> id = $lead_id;
        $lead -> full_address = $full_address;
        $lead -> street_number = $street_number;
        $lead -> street_name = $street_name;
        $lead -> unit = $unit;



        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.contactually.com/v2/contacts",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS =>"{\"data\":{\"tags\":[\"Source: Taylor Properties\", \"Seller\"],\"addresses\":[{\"street_1\":\"".$street_number.' '.$street_name." ".$unit."\",\"city\":\"".$city."\",\"state\":\"".$state."\",\"zip\":\"".$zip."\"}],\"email_addresses\":[{\"address\":\"".$email."\"}],\"phone_numbers\":[{\"number\":\"".$phone."\"}],\"bucket_ids\":[\"bucket_125452144\"],\"first_name\":\"".$first_name."\",\"last_name\":\"".$last_name."\",\"assigned_to_id\":\"user_304134\",\"created_at\":\"".date("Y-m-d")."\"}}",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "authorization: Bearer ".Config::get('contactually.contactually_key')."",
            "content-type: application/json",
            "Cookie: _enforcery_session_id_production=f881322cf6cabb55add2b4e3d8e850d6"
        ),
        ));

        $response = curl_exec($curl);


        curl_close($curl);


        $to_email = Config::get('email_routing.home_value_request.email');
        \Notification::route('mail', $to_email) -> notify(new HomeValueRequest($lead));


    }

    /* GARYS DESIGNS */
    /*public function gphomepage() {
        $sliders        = array();
        $total          = 36;
        $slide_rows     = 6;
        $slides_per_row = 6;
        for ($i = 0; $i < $total; $i += $slides_per_row) {
            $sliders[] = FeaturedListings::where('ListPictureURL', '!=', '')
                -> where('PublicRemarks', '!=', '')
                -> whereNotNull('ListPictureURL')
                -> whereNotNull('PublicRemarks')
                -> offset($i)
                -> limit($slides_per_row)
                -> get();
        }
        return view('welcome-gp', ['sliders' => $sliders]);
    }*/
}
