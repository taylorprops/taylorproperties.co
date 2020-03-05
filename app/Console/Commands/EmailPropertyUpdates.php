<?php

namespace App\Console\Commands;
//namespace App\Mail;
use Illuminate\Console\Command;
use App\User;
use App\UserSearch;
use App\Listings;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PropertyEmailUpdate;


class EmailPropertyUpdates extends Command {

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:property_updates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send property updates to clients';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle() {
        $user_searches = UserSearch::where('receive_email_updates', 'yes') -> get() -> toArray();

        foreach ($user_searches as $search) {


            $email_data    = [];
            $string        = $search['query_string'];
            $query         = substr($string, strpos($string, '?') + 1);
            $query         = explode('&', $query);
            $data          = [];
            foreach ($query as $item) {
                $field           = explode('=', $item);
                $data[$field[0]] = $field[1] ?? NULL;
            }
            $listings = Listings::getSelectColumns()
				-> getListings($data['state'], $data['city'], $data['county'], $data['zip'], '', $data['beds'], $data['baths'], $data['min_price'], $data['max_price'], $data['for_sale'], $data['rentals'], $data['detached'], $data['apartments'], $data['condos'], $data['townhouse'], $data['land'], $data['farms'], $data['multifamily'], $data['duplex'], $data['standard'], $data['new_construction'], $data['foreclosures'], $data['short_sales'], $data['auction'], $data['subdivision'], $data['sq_ft_min'], $data['sq_ft_max'], $data['year_built_min'], $data['year_built_max'], $data['lot_size_min'], $data['lot_size_max'], $search['start_from_datetime'], '', '')
				-> get();

            $user                = User::where('id', $search['user_id']) -> first();
            $saved_search_id     = $search['id'];
            $search_name         = $search['alias'];
            $start_from_datetime = $search['start_from_datetime'];
            $url                 = $search['query_string'];
            if (substr($url, -1) == '&') {
                $url = substr($url, 0, -1);
            }
            $url .= '&search_name=' . $search_name . '&start_from_datetime=' . $start_from_datetime . '&saved_search_id=' . $saved_search_id;
            $url                       = preg_replace('/\s/', '%20', $url);
            $email_data['search_url']   = $url;
            $email_data['search_name']  = $search_name;
            $email_data['search_count'] = $listings -> count();

            if($email_data['search_count'] > 0) {
                $user -> notify(new PropertyEmailUpdate($email_data));
            }
        }


    }
}
