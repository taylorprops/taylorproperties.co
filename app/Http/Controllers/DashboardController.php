<?php

namespace App\Http\Controllers;

use App\Listings;
use App\User;
use App\UserProperty;
use App\UserSearch;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this -> middleware('auth');
    }

    public function delete_property(Request $request) {

        $user_id    = Auth::user() -> id;
        $listing_id = $request -> id;

        $user_property = UserProperty::where('user_id', $user_id)
            -> where('listing_id', $listing_id)
            -> delete();
    }

    public function delete_search(Request $request) {

        $search = UserSearch::find($request -> id);
        $search -> delete();

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        // get user id
        $user_id = Auth::user() -> id;

        //get listing ids by user
        $listing_ids = UserProperty::where('user_id', $user_id) -> get('listing_id');

        //get property details per each listings id
        $properties = Listings::whereIn('ListingId', $listing_ids) -> get();

        //get searches by user id
        $searches = UserSearch::where('user_id', $user_id) -> get();

        $user_searches = [];

        $c = 0;

        foreach ($searches as $search) {
            $string = $search['query_string'];
            $query  = substr($string, strpos($string, '?') + 1);
            $query  = explode('&', $query);
            $data   = [];
            foreach ($query as $item) {
                $field           = explode('=', $item);
                $data[$field[0]] = $field[1] ?? NULL;
            }

            $data['start_from_datetime'] = $search['start_from_datetime'];

            $user_searches[$c]['url_count'] = Listings::select('ListingSourceRecordKey')
                -> getListings($data['state'], $data['city'], $data['county'], $data['zip'], '', $data['beds'], $data['baths'], $data['min_price'], $data['max_price'], $data['for_sale'], $data['rentals'], $data['detached'], $data['apartments'], $data['condos'], $data['townhouse'], $data['land'], $data['farms'], $data['multifamily'], $data['duplex'], $data['standard'], $data['new_construction'], $data['foreclosures'], $data['short_sales'], $data['auction'], $data['subdivision'], $data['sq_ft_min'], $data['sq_ft_max'], $data['year_built_min'], $data['year_built_max'], $data['lot_size_min'], $data['lot_size_max'], '', '', '')
                -> count();

            $user_searches[$c]['start_from_url_count'] = Listings::select('ListingSourceRecordKey')
                -> getListings($data['state'], $data['city'], $data['county'], $data['zip'], '', $data['beds'], $data['baths'], $data['min_price'], $data['max_price'], $data['for_sale'], $data['rentals'], $data['detached'], $data['apartments'], $data['condos'], $data['townhouse'], $data['land'], $data['farms'], $data['multifamily'], $data['duplex'], $data['standard'], $data['new_construction'], $data['foreclosures'], $data['short_sales'], $data['auction'], $data['subdivision'], $data['sq_ft_min'], $data['sq_ft_max'], $data['year_built_min'], $data['year_built_max'], $data['lot_size_min'], $data['lot_size_max'], $search['start_from_datetime'], '', '')
                -> count();

            $user_searches[$c]['saved_search_id']     = $search['id'];
            $user_searches[$c]['search_name']         = $search['alias'];
            $user_searches[$c]['start_from_datetime'] = $search['start_from_datetime'];
            $user_searches[$c]['receive_email_updates'] = $search['receive_email_updates'];
            $url                                      = $search['query_string'];
            if (substr($url, -1) == '&') {
                $url = substr($url, 0, -1);
            }
            $start_from_url                      = $url . '&search_name=' . $search['alias'] . '&start_from_datetime=' . $search['start_from_datetime'] . '&saved_search_id=' . $search['id'];
            $user_searches[$c]['url']            = preg_replace('/\s/', '%20', $url);
            $user_searches[$c]['start_from_url'] = preg_replace('/\s/', '%20', $start_from_url);

            /* Search Details */
            if($data['zip'] != '') {
                $location = $data['zip'];
            } else if($data['city'] != '') {
                $location = $data['city'].', '.$data['state'];
            } else if($data['county'] != '') {
                $location = $data['county'];
            }
            $user_searches[$c]['location'] = $location;

            if($data['for_sale'] == 'on' && $data['rentals'] == 'on') {
                $listing_type  = 'For Sale and Rentals';
            } else if($data['for_sale'] == 'on') {
                $listing_type  = 'For Sale';
            } else if($data['rentals'] == 'on') {
                $listing_type  = 'Rentals';
            }
            $user_searches[$c]['listing_type'] = $listing_type;

            $price_from = 0;
            $price_to = 'No Limit';
            if($data['min_price'] != '') {
                $price_from = '$'.number_format($data['min_price'], 0);
            }
            if($data['max_price'] != '') {
                $price_to = '$'.number_format($data['max_price'], 0);
            }
            $user_searches[$c]['price'] = $price_from.' - '.$price_to;

            $user_searches[$c]['beds'] = $data['beds'].'+';
            $user_searches[$c]['baths'] = $data['baths'].'+';

            $sale_types = array();
            if($data['standard'] == 'on') {
                $sale_types[] = 'Standard';
            }
            if($data['new_construction'] == 'on') {
                $sale_types[] = 'New Construction';
            }
			if($data['foreclosures'] == 'on') {
                $sale_types[] = 'Foreclosures';
            }
			if($data['auction'] == 'on') {
                $sale_types[] = 'Auctions';
            }

            $user_searches[$c]['sale_types'] = implode(', ', $sale_types);

            $property_types = array();
            if($data['detached'] == 'on') {
                $property_types[] = 'Detached';
            }
			if($data['apartments'] == 'on') {
                $property_types[] = 'New Apartments';
            }
			if($data['condos'] == 'on') {
                $property_types[] = 'Condos';
            }
			if($data['townhouse'] == 'on') {
                $property_types[] = 'TownHomes';
            }
			if($data['duplex'] == 'on') {
                $property_types[] = 'Duplexes';
            }
			if($data['land'] == 'on') {
                $property_types[] = 'Land';
            }
			if($data['farms'] == 'on') {
                $property_types[] = 'Farms';
            }
			if($data['multifamily'] == 'on') {
                $property_types[] = 'Mutli-Famly';
            }
            $user_searches[$c]['property_types'] = implode(', ', $property_types);

            $sqft_from = 0;
            $sqft_to = 'No Limit';
            if($data['sq_ft_min'] != '') {
                $sqft_from = '$'.number_format($data['sq_ft_min'], 0);
            }
            if($data['sq_ft_max'] != '') {
                $sqft_to = '$'.number_format($data['sq_ft_max'], 0);
            }
            $user_searches[$c]['sqft'] = $sqft_from.' - '.$sqft_to;


            $c += 1;

        }

        return view('dashboard.index') -> with(['properties' => $properties, 'user_searches' => $user_searches]);
    }

    public function update_email_alerts(Request $request) {

        $search = UserSearch::find($request -> id);
        $search -> receive_email_updates = $request -> updates;
        $search -> save();
    }

    public function update_user(Request $request) {

        $user_id = Auth::user() -> id;
        $user    = User::find($user_id);

        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> phone        = $request -> phone;
        if($request -> password) {
            $user -> password = $request -> password;
        }
        $user -> save();

    }
}
