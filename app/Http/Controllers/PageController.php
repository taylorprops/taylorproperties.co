<?php

namespace App\Http\Controllers;

use App\Agent;
use App\FeaturedListings;
use App\Messages;
use App\Notifications\ContactForm;
use App\OfficeLocation;
use Config;
use Illuminate\Http\Request;

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

        $contact = new Messages();

        $contact -> name     = $request -> name;
        $contact -> email    = $request -> email;
        $contact -> phone    = $request -> phone;
        $contact -> message  = $request -> message;
        $contact -> type     = $request -> type;
        if($request -> agent_id) {
            $contact -> agent_id = $request -> agent_id;
        }
        $contact -> save();

        \Notification::route('mail', Config::get('email_routing.contact_form.email')) -> notify(new ContactForm($contact));

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
