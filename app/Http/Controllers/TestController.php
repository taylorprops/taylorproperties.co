<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

use App\Listings;
use App\Agent;

use Illuminate\Support\Facades\Mail;
use App\Mail\EmailClient;



class TestController extends Controller
{


    function test() {


        phpinfo();

        /*
        Strings
        $truncated = Str::limit('The quick brown fox jumps over the lazy dog', 20, ' <a href="#">Read More...</a>');
        echo $truncated;
        */

        /*
        Sort by (sorts by company)

        sortBy('company') and toArray() have to be run after get()
        $agents = Agent::select('fullname', 'email', 'company') -> get() -> sortBy('company') -> toArray();

        echo '<pre>'; print_r($agents); echo '</pre>';
        */

        /*
        //Sort (sorts by  fullname)
        $agents = Agent::select('fullname', 'email', 'company') -> get() -> toArray();
        $sorted = array_values(Arr::sort($agents, function ($agent) {
            return $agent['fullname'];
        }));

        //echo '<pre>'; print_r($sorted); echo '</pre>';

        return (['sorted' => $sorted]);
        */



        //Groups
        /*
        $agents = Agent::select('fullname', 'email', 'company') -> get();
        $grouped = $agents -> mapToGroups(function ($item, $key) {
            return [$item['company'] => [ $item['fullname'], $item['email'], $item['company'] ]];
        });

        $grouped -> toArray();

        $tp = $grouped -> get('Taylor Properties') -> all();
        $aap = $grouped -> get('Anne Arundel Properties') -> all();

        echo '<pre>'; print_r($aap); echo '</pre>';
        */










        /*
        $listings = Listings::select('ListPrice') -> where('MlsListDate', '2018-01-01') -> get();
        return view('/_tests/test', ['listings' => $listings]);
        */

    }



}
