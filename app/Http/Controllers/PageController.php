<?php

namespace App\Http\Controllers;

use App\Agent;
use App\FeaturedListings;
use App\Messages;
use App\Notifications\ContactForm;
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
        //return view('welcome5', ['sliders' => $sliders]);
        return view('welcome-gp', ['sliders' => $sliders]);

        /*$featuredListings = FeaturedListings::where('ListPictureURL', '!=', '')
    -> where('PublicRemarks', '!=', '')
    -> whereNotNull('ListPictureURL')
    -> whereNotNull('PublicRemarks')
    -> limit(8)
    -> get();

    return view('welcome3') -> with('featuredListings',$featuredListings);*/
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

        $agents = Agent::where('firstname', 'like', '%' . $request -> val . '%')
            -> orWhere('lastname', 'like', '%' . $request -> val . '%')
            -> orWhere('fullname', 'like', '%' . $request -> val . '%')
            -> orWhere('cell', 'LIKE', '%' . $request -> val . '%')
            -> orWhere('bio', 'LIKE', '%' . $request -> val . '%')
            -> orWhere('designations', 'LIKE', '%' . $request -> val . '%')
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

        } else if($request -> type == 'buy_sell') {

            $to_email = Config::get('email_routing.contact_form.email');
            $user -> subject = 'Buyer/Seller Lead – Taylor Properties Website';

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
