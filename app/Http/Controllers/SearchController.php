<?php

namespace App\Http\Controllers;

use App\InfoRequests;
use App\Listings;
use App\Notifications\MoreInfoRequest;
use App\Notifications\ShowingRequest;
use App\ShowingRequests;
use App\UserProperty;
use App\UserSearch;
use App\Zips;
use Auth;
use Config;
use Illuminate\Http\Request;
use App\User;
use App\Leads;
use App\LeadsProperties;
use Twilio\TwiML\MessagingResponse;
use Twilio\Rest\Client;

class SearchController extends Controller {

    public function get_user_data() {
        if (Auth::user()) {
            $user = Auth::user();
            $lead = Leads::where('l_user_id', $user -> id) -> orWhere('l1_email', $user -> email) -> first();
            $lead_id = $lead -> id ?? null;
            $user_data = [
                'status' => 'found',
                'id' => $user -> id,
                'name'   => $user -> name,
                'email'  => $user -> email,
                'phone'  => $user -> phone,
                'lead_id' => $lead_id
            ];
        } else {
            $user_data = [
                'status' => 'not found',
            ];
        }
        return response() -> json($user_data);
    }

    function info_request(Request $request) {

        $user_id = null;
        if (Auth::user()) {
            $user_id = Auth::user() -> id;
        }

        // add to leads database if not in there already
        $existing = Leads::where('l1_email', $request -> email) -> orWhere(function ($q) use ($user_id) {
            $q -> where('l_user_id', $user_id) -> where('l_user_id', '>', 0);
        }) -> first();

        $listing = Listings::where('ListingId', $request -> listing_id) -> first();
        $for_sale = 'Y';
        if(stristr($listing -> PropertyType, 'lease')) {
            $for_sale = 'N';
        }

        if(!$existing) {

            // add to leads
            $lead = new Leads();
            $lead -> l_source = 'www.TaylorProperties.co';
            $lead -> l1_email = $request -> email;
            $lead -> l1_first = substr($request -> name, 0, strpos($request -> name, ' '));
            $lead -> l1_last = substr($request -> name, strpos($request -> name, ' '));
            $lead -> l1_phone = $request -> phone;
            $lead -> l_status = 'Lead';
            $lead -> l_type = 'Buy';
            $lead -> l_user_id = $user_id;
            $lead -> p_type = $for_sale;
            $lead -> p_location = $listing -> County . ' - '.$listing -> StateOrProvince;
            $lead -> save();
            $lead_id = $lead -> id;

            // if user is registered update lead_id in users table
            if($user_id) {
                User::where('id', $user_id)
                    -> update(['lead_id' => $lead_id]);
            }

        } else {
            $lead_id = $existing -> id;
        }

        $property_exists = LeadsProperties::where('lead_id', $lead_id) -> where('mls', $listing -> ListingId) -> first();
        if(!$property_exists) {
            $add_property = new LeadsProperties();
            $add_property -> lead_id = $lead_id;
            $add_property -> mls = $listing -> ListingId;
            $add_property -> street = $listing -> FullStreetAddress;
            $add_property -> city = $listing -> City;
            $add_property -> state = $listing -> StateOrProvince;
            $add_property -> zip = $listing -> PostalCode;
            $add_property -> prop_status = $listing -> MlsStatus;
            $add_property -> price = $listing -> ListPrice;
            $add_property -> list_date = $listing -> MLSListDate;
            $add_property -> listing_type = $for_sale;
            $add_property -> prop_type = $listing -> PropertyType;
            $add_property -> save();
        }




        $info = new InfoRequests;
        $user_id = null;
        if (Auth::user()) {
            $user_id       = Auth::user() -> id;
            $info -> user_id = $user_id;
        }
        $info -> name = $request -> name;
        $info -> phone = $request -> phone;
        $info -> email = $request -> email;
        $info -> user_id = $user_id ?? 0;
        $info -> lead_id = $lead_id ?? 0;
        $info -> comments = $request -> comments;
        $info -> address = $request -> address;
        $info -> listing_id = $request -> listing_id;
        $info -> listing_link = config('app.url').'/search/listing_results?listing_id='.$request -> listing_id;
        $info -> save();


        $name = $request -> name;
        $first = $name;
        $last = '';
        if(stristr($name, ' ')) {
            $first = substr($name, 0, strpos($name, ' '));
            $last = substr($name, strpos($name, ' ') + 1);
        }


        AddContactToContactually('user_304134', ['Source: Taylor Properties', 'Buyer'], $first, $last, $request -> email, $request -> phone, ['bucket_125452144'], '', '', '', '', '', '', 'Client submitted an info request for '.$listing -> FullStreetAddress.' '.$listing -> City.', '.$listing -> StateOrProvince.' '.$listing -> PostalCode);


        \Notification::route('mail', Config::get('email_routing.more_info_request.email')) -> notify(new MoreInfoRequest($info));
    }

    public function listing_results() {
        return view('search.listing_results');
    }

    public function listing_results_listings(Request $request) {

        $favorites = [];
        if (Auth::user()) {
            $user_id = Auth::user() -> id;
            $current_favorites = UserProperty::where('user_id', $user_id) -> get() -> toArray();
            $favorites = [];
            foreach ($current_favorites as $faves) {
                $favorites[] = $faves['listing_id'];
            }
        }

        $request = json_decode($request -> getContent(), true);

        foreach ($request as $key => $val) {
            if ($key != 'coordinates') {
                session([$key => preg_replace('/,/', '', $val)]);
            } else {
                if ($key == 'start_from_datetime') {
                    if ($val == '') {
                        session() -> forget('search_name', '');
                        session() -> forget('start_from_datetime', '');
                        session() -> forget('saved_search_id', '');
                    }
                }
                session([$key => $val]);
            }
        }

        $page = $request['page'];
        $search_name = '';
        if (!empty(session('start_from_datetime'))) {
            $search = UserSearch::find(session('saved_search_id'));
            $search_name = $search -> alias;
            session(['search_name' => $search_name]);
            $search -> start_from_datetime = date('Y-m-d H:i:s');
            $search -> save();

        }

        $listings = Listings::getSelectColumns()
            -> getListings(session('state'), session('city'), session('county'), session('zip'), session('coordinates'), session('beds'), session('baths'), session('min_price'), session('max_price'), session('for_sale'), session('rentals'), session('detached'), session('apartments'), session('condos'), session('townhouse'), session('land'), session('farms'), session('multifamily'), session('duplex'), session('standard'), session('new_construction'), session('foreclosures'), session('short_sales'), session('auction'), session('subdivision'), session('sq_ft_min'), session('sq_ft_max'), session('year_built_min'), session('year_built_max'), session('lot_size_min'), session('lot_size_max'), session('start_from_datetime'), session('saved_search_id'))
            -> orderBy(session('sortby'), session('sortby_order'));

        $listings = $listings -> paginate(20, $page);
        $listings -> appends(request() -> query()) -> links();

        return view('search.listing_results_props_html', ['listings' => $listings, 'favorites' => $favorites, 'search_name' => $search_name]);
    }

    public function listing_results_map(Request $request) {

        foreach ($_GET as $key => $val) {
            if ($key != 'coordinates') {
                session([$key => preg_replace('/,/', '', $val)]);
            } else {
                session([$key => $val]);
            }
        }

        //if (session('listing_id')) {
        //$listings = Listings::getSelectColumns() -> getListing(session('listing_id')) -> get();
        //} else {
        $listings = Listings::getSelectColumns()
            -> getListings(session('state'), session('city'), session('county'), session('zip'), session('coordinates'), session('beds'), session('baths'), session('min_price'), session('max_price'), session('for_sale'), session('rentals'), session('detached'), session('apartments'), session('condos'), session('townhouse'), session('land'), session('farms'), session('multifamily'), session('duplex'), session('standard'), session('new_construction'), session('foreclosures'), session('short_sales'), session('auction'), session('subdivision'), session('sq_ft_min'), session('sq_ft_max'), session('year_built_min'), session('year_built_max'), session('lot_size_min'), session('lot_size_max'), session('start_from_datetime'), session('saved_search_id'))
            -> get();
        //}

        /* dd(vsprintf(str_replace('?', '%s', $listings -> toSql()), collect($listings -> getBindings()) -> map(function($binding){
        return is_numeric($binding) ? $binding : "'{$binding}'";
        }) -> toArray())); */

        return (['listings' => $listings]);
    }

    public function remove_favorite(Request $request) {
        $user_id = Auth::user() -> id;
        $lead = Leads::where('l_user_id', $user_id) -> first();
        $lead_id = $lead -> id;
        $listing_id = $request -> listing_id;
        $remove_favorite = UserProperty::where('listing_id', $listing_id) -> where('user_id', $user_id) -> delete();
        $remove_from_lead = LeadsProperties::where('lead_id', $lead_id) -> where('mls', $listing_id) -> delete();
    }

    public function save_favorite(Request $request) {

        $listing_id = $request -> listing_id;
        $lead_id = $request -> lead_id;

        $user_id = Auth::user() -> id;

        $favorite = new UserProperty;
        $favorite -> listing_id = $listing_id;
        $favorite -> user_id = $user_id;
        $favorite -> save();

        // add property to lead system properties
        $listing = Listings::where('ListingId', $listing_id) -> first();
        $property_exists = LeadsProperties::where('lead_id', $lead_id) -> where('mls', $listing_id) -> first();

        $for_sale = 'Y';
        if(stristr($listing -> PropertyType, 'lease')) {
            $for_sale = 'N';
        }

        if(!$property_exists) {

            $add_property = new LeadsProperties();
            $add_property -> lead_id = $lead_id;
            $add_property -> mls = $listing_id;
            $add_property -> street = $listing -> FullStreetAddress;
            $add_property -> city = $listing -> City;
            $add_property -> state = $listing -> StateOrProvince;
            $add_property -> zip = $listing -> PostalCode;
            $add_property -> prop_status = $listing -> MlsStatus;
            $add_property -> price = $listing -> ListPrice;
            $add_property -> list_date = $listing -> MLSListDate;
            $add_property -> listing_type = $for_sale;
            $add_property -> prop_type = $listing -> PropertyType;
            $add_property -> save();
        }
    }

    public function save_search(Request $request) {
        $user_id = Auth::user() -> id;
        $count = UserSearch::where('user_id', $user_id) -> where('alias', $request -> alias) -> count();
        if ($count > 0 && $request -> update_search == 'no') {
            $response = [
                'status' => 'fail',
            ];
        } elseif ($request -> update_search == 'yes') {
            $saved_search = UserSearch::where('alias', $request -> alias) -> where('user_id', $user_id) -> first();
            $saved_search -> query_string = $request -> search_url;
            $saved_search -> alias = $request -> alias;
            $saved_search -> start_from_datetime = date('Y-m-d H:i:s');
            $saved_search -> save();
            $response = [
                'status' => 'success',
            ];
        } else {
            $saved_search = new UserSearch;

            $saved_search -> query_string = $request -> search_url;
            $saved_search -> user_id = $user_id;
            $saved_search -> alias = $request -> alias;
            $saved_search -> start_from_datetime = date('Y-m-d H:i:s');
            $saved_search -> save();
            session(['search_name' => $request -> alias]);
            $response = [
                'status' => 'success',
            ];
        }
        return response() -> json($response);
    }

    public function schedule_showing(Request $request) {

        $user_id = '';
        if (Auth::user()) {
            $user_id = Auth::user() -> id;
        }

        // add to leads database if not in there already
        $existing = Leads::where('l1_email', $request -> email) -> orWhere('l_user_id', $user_id) -> where('l_user_id', '>', 0) -> first();

        $listing = Listings::where('ListingId', $request -> listing_id) -> first();

        $for_sale = 'Y';
        if(stristr($listing -> PropertyType, 'lease')) {
            $for_sale = 'N';
        }

        if(!$existing) {

            // add to leads
            $lead = new Leads();
            $lead -> l_source = 'www.TaylorProperties.co';
            $lead -> l1_email = $request -> email;
            $lead -> l1_first = substr($request -> name, 0, strpos($request -> name, ' '));
            $lead -> l1_last = substr($request -> name, strpos($request -> name, ' '));
            $lead -> l1_phone = $request -> phone;
            $lead -> l_status = 'Lead';
            $lead -> l_type = 'Buy';
            $lead -> l_user_id = $user_id;
            $lead -> p_type = $for_sale;
            $lead -> p_location = $listing -> County . ' - '.$listing -> StateOrProvince;
            $lead -> save();
            $lead_id = $lead -> id;

            // if user is registered update lead_id in users table
            if($user_id) {
                User::where('id', $user_id)
                    -> update(['lead_id' => $lead_id]);
            }

        } else {
            $lead_id = $existing -> id;
        }

        $property_exists = LeadsProperties::where('lead_id', $lead_id) -> where('mls', $listing -> ListingId) -> first();

        if(!$property_exists) {
            $add_property = new LeadsProperties();
            $add_property -> lead_id = $lead_id;
            $add_property -> mls = $listing -> ListingId;
            $add_property -> street = $listing -> FullStreetAddress;
            $add_property -> city = $listing -> City;
            $add_property -> state = $listing -> StateOrProvince;
            $add_property -> zip = $listing -> PostalCode;
            $add_property -> prop_status = $listing -> MlsStatus;
            $add_property -> price = $listing -> ListPrice;
            $add_property -> list_date = $listing -> MLSListDate;
            $add_property -> listing_type = $for_sale;
            $add_property -> prop_type = $listing -> PropertyType;
            $add_property -> save();
        }

        $showing = new ShowingRequests;
        $showing -> name = $request -> name;
        $showing -> phone = $request -> phone;
        $showing -> email = $request -> email;
        $showing -> user_id = $user_id ?? 0;
        $showing -> lead_id = $lead_id ?? 0;
        $showing -> email = $request -> email;
        $showing -> showing_date = $request -> showing_date;
        $showing_time = $request -> showing_time;
        $time = substr($showing_time, 0, 5) . ':00';
        if (stristr($showing_time, 'PM')) {
            $time = date("H:i:00", strtotime("$time +12 hour"));
        }
        $showing -> showing_time = $time;
        $showing -> showing_date_alt = $request -> showing_date_alt;
        $showing_time_alt = $request -> showing_time_alt;
        $time_alt = '';
        if ($showing_time_alt != '') {
            $time_alt = substr($showing_time_alt, 0, 5) . ':00';
            if (stristr($showing_time_alt, 'PM')) {
                $time_alt = date("H:i:00", strtotime("$time_alt +12 hour"));
            }
        }
        $showing -> showing_time_alt = $time_alt;
        $showing -> comments = $request -> comments;
        $showing -> listing_id = $request -> listing_id;
        $showing -> listing_link = config('app.url').'/search/listing_results?listing_id='.$request -> listing_id;
        $showing -> address = $request -> address;
        $showing -> _token = $request -> _token;
        $showing -> save();

        $other_showings = ShowingRequests::select('listing_id', 'address', 'showing_date', 'showing_time')
            -> where('email', $request -> email)
            -> where('showing_date', '>=', date('Y-m-d'))
            -> where('id', '!=', $showing -> id)
            -> orderBy('showing_date')
            -> orderBy('showing_time')
            -> groupBy('listing_id')
            -> get()
            -> toArray();
        $showing['other_showings'] = $other_showings;


        $name = $request -> name;
        $first = $name;
        $last = '';
        if(stristr($name, ' ')) {
            $first = substr($name, 0, strpos($name, ' '));
            $last = substr($name, strpos($name, ' ') + 1);
        }


        AddContactToContactually('user_304134', ['Source: Taylor Properties', 'Buyer'], $first, $last, $request -> email, $request -> phone, ['bucket_125452144'], '', '', '', '', '', '', 'Client submitted a showing request for '.$listing -> FullStreetAddress.' '.$listing -> City.' '.$listing -> State.' '.$listing -> PostalCode);



        \Notification::route('mail', Config::get('email_routing.showing_request.email')) -> notify(new ShowingRequest($showing));
    }

    public function school_data(Request $request) {
        $state = $request -> state;
        $lat = $request -> lat;
        $lon = $request -> lon;

        $schools = Listings::school($state, $lat, $lon);
        if($schools) {
            return (['schools' => $schools['school']]);
        }
        return '';
    }

    public function search_details(Request $request) {
        $favorites = [];
        if (Auth::user()) {
            $user_id = Auth::user() -> id;
            $current_favorites = UserProperty::where('user_id', $user_id) -> get() -> toArray();
            $favorites = [];
            foreach ($current_favorites as $faves) {
                $favorites[] = $faves['listing_id'];
            }
        }

        $listings = Listings::getListing($request -> id) -> get();
        $listings = $listings[0];

        $address = $listings['FullStreetAddress'] . ' ' . $listings['City'] . ' ' . $listings['StateOrProvince'] . ' ' . $listings['PostalCode'];
        $image = str_replace('http:', 'https:', $listings['ListPictureURL']);

        return view('search.listing_details_html', ['listings' => $listings, 'address' => $address, 'image' => $image, 'favorites' => $favorites]);
    }

    public function search_results(Request $request) {
        $val = trim($request['val']);

        $cities = $counties = $zips = $subdivisions = $listings = '';

        if (!preg_match('/[0-9]/', $val)) {
            $cities = Zips::where('city', 'like', '%' . $val . '%')
                -> groupBy('city')
                -> get();

            $counties = Zips::where('county', 'like', '%' . $val . '%')
                -> groupBy('county')
                -> get();

            $subdivisions = Listings::select('ListingId', 'FullStreetAddress', 'City', 'StateOrProvince', 'PostalCode', 'SubdivisionName')
                -> where('SubdivisionName', 'like', '%' . $val . '%')
                -> where('MlsStatus', 'Active')
                -> groupBy('SubdivisionName')
                -> take(10)
                -> get();
        } else {
            $zips = Zips::where('zip', 'like', '%' . $val . '%')
                -> groupBy('zip')
                -> get();

            $listings = Listings::select('ListingId', 'FullStreetAddress', 'City', 'StateOrProvince', 'PostalCode', 'Latitude', 'Longitude')
                -> where('FullStreetAddress', 'like', '%' . $val . '%')
                -> get();
        }

        if ($cities || $zips || $counties || $listings || $subdivisions) {
            return view('search.search_results_html', compact('cities', 'counties', 'zips', 'listings', 'subdivisions'));
        } else {
            return false;
        }
    }

    public function sms_replies(Request $request) {
        // Set the content-type to XML to send back TwiML from the PHP Helper Library
        header("content-type: text/xml");

        $response = new MessagingResponse();
        $response -> message(
            "This number does not accept incoming messages. Please call us at 800-590-0925"
        );

        return $response;
    }
}
