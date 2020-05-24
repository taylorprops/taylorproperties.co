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

    public function contactSubmit(Request $request) {

        $user = new Messages();

        $user -> name     = $request -> name;
        $user -> email    = $request -> email;
        $user -> phone    = $request -> phone;
        $user -> message  = $request -> message;
        $user -> type     = $request -> type;
        if($request -> agent_id) {
            $user -> agent_id = $request -> agent_id;
            $user -> agent_email = $request -> agent_email;
        }
        $user -> save();

        // type = from_agent | to_agent | buy_sell
        if($request -> type == 'from_agent') {

            $to_email = Config::get('email_routing.join_form.email');
            $user -> subject = 'Agent Lead – Taylor Properties Website';

            $existing = Prospects::where('p_email', $request -> email) -> first();

            if(!$existing) {

                // add to prospects
                $prospect = new Prospects();
                $prospect -> p_source = 'www.TaylorProperties.co';
                $prospect -> p_email = $user -> email;
                $prospect -> p_name = $user -> name;
                $prospect -> p_phone = $user -> phone;
                $prospect -> p_status = 'live';
                $prospect -> save();
                $prospect_id = $prospect -> id;

                $user -> prospect_id = $prospect_id;

                // add comments to notes
                $notes = new ProspectNotes();
                $notes -> notes = $user -> message;
                $notes -> user = 'Client';
                $notes -> prospect_id = $prospect_id;
                $notes -> save();

            }

        } else if($request -> type == 'to_agent') {

            $to_email = $request -> agent_email;
            $user -> subject = 'Message From Client via www.taylorproperties.co';

        } else if($request -> type == 'buy_sell' || $request -> type == 'realtor_match') {

            $to_email = Config::get('email_routing.contact_form.email');
            if($request -> type == 'buy_sell') {
                $user -> subject = 'Buyer/Seller Lead – Taylor Properties Website';
            } else if($request -> type == 'realtor_match') {
                $user -> subject = 'Buyer/Seller Lead – Realtor Match Request';
            }

            $existing = Leads::where('l1_email', $request -> email) -> first();

            if(!$existing) {

                // add to leads
                $lead = new Leads();
                $lead -> l_source = 'www.TaylorProperties.co';
                $lead -> l1_email = $user -> email;
                $lead -> l1_first = substr($user -> name, 0, strpos($user -> name, ' '));
                $lead -> l1_last = substr($user -> name, strpos($user -> name, ' '));
                $lead -> l1_phone = $user -> phone;
                $lead -> l_status = 'Lead';
                $lead -> l_type = 'Buy';
                $lead -> save();
                $lead_id = $lead -> id;

                // add comments to notes
                $notes = new LeadsNotes();
                $notes -> notes = $request -> message;
                $notes -> user = 'Client';
                $notes -> lead_id = $lead_id;
                $notes -> save();

                $user -> lead_id = $lead_id;

            }

        }

        \Notification::route('mail', $to_email) -> notify(new ContactForm($user));

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
