<?php

if (!function_exists('AddContactToContactually')) {

    function AddContactToContactually($assigned_to_id, $tags_array, $contact_first_name, $contact_last_name, $contact_email, $contact_phone, $bucket_ids_array, $street_number, $street_name, $unit, $city, $state, $zip, $notes) {

        $curl = curl_init();

        // check if contact already exists
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.contactually.com/v2/contacts/search",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS =>"{\"data\":{\"q\":\"".$contact_email."\"}}",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Bearer ".Config::get('contactually.contactually_key')."",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $response = json_decode($response, true);
        $contact_id = count($response['data']) > 0 ? $response['data']['id'] : null;

        // add if not added already
        if(!$contact_id) {

            // if source set from marketing link
            if(session('utm_source') && session('utm_source') != '') {

                $utm_source = session('utm_source');
                $utm_medium = session('utm_medium');
                $utm_campaign = session('utm_campaign');

                $tag = 'Source: '.$utm_source.' '.$utm_medium.' '.$utm_campaign;

                // see if tag exists already and if not, add it
                $search_tag = urlencode($tag);
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.contactually.com/v2/tags?q=".$search_tag,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "GET",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/json",
                        "authorization: Bearer ".Config::get('contactually.contactually_key').""
                    ),
                ));

                $response = curl_exec($curl);
                $response = json_decode($response, true);

                $tag_id = count($response['data']) > 0 ? $response['data'][0]['id'] : null;

                // add if not added already
                if(!$tag_id) {

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => "https://api.contactually.com/v2/tags",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => "",
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "POST",
                        CURLOPT_POSTFIELDS =>"{\"data\":{\"name\":\"".$tag."\"}}",
                        CURLOPT_HTTPHEADER => array(
                            "accept: application/json",
                            "authorization: Bearer ".Config::get('contactually.contactually_key')."",
                            "content-type: application/json"
                        ),
                    ));

                    $response = curl_exec($curl);
                    $response = json_decode($response, true);
                    $new_tag_name = $response['data']['name'];

                }

                // set new bucket ids
                $tags_array[] = $new_tag_name;
            }

            $tags_array = '"'.implode('", "', $tags_array).'"';
            $bucket_ids_array = '"'.implode('", "', $bucket_ids_array).'"';

            // create new contact
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.contactually.com/v2/contacts",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",

                CURLOPT_POSTFIELDS =>"{\"data\":{\"tags\":[$tags_array],\"addresses\":[{\"street_1\":\"".$street_number.' '.$street_name." ".$unit."\",\"city\":\"".$city."\",\"state\":\"".$state."\",\"zip\":\"".$zip."\"}],\"email_addresses\":[{\"address\":\"".$contact_email."\"}],\"phone_numbers\":[{\"number\":\"".$contact_phone."\"}],\"bucket_ids\":[$bucket_ids_array],\"first_name\":\"".$contact_first_name."\",\"last_name\":\"".$contact_last_name."\",\"assigned_to_id\":\"".$assigned_to_id."\",\"created_at\":\"".date("Y-m-d")."\"}}",
                CURLOPT_HTTPHEADER => array(
                    "accept: application/json",
                    "authorization: Bearer ".Config::get('contactually.contactually_key')."",
                    "content-type: application/json",
                    "Cookie: _enforcery_session_id_production=f881322cf6cabb55add2b4e3d8e850d6"
                )
            ));

            $response = curl_exec($curl);

            // if notes, add them
            if($notes != '') {

                $response = json_decode($response, true);
                $contact_id = $response['data']['id'];

                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://api.contactually.com/v2/notes",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS =>"{\"data\":{\"body\":\"".$notes."\",\"contact_id\":\"".$contact_id."\",\"timestamp\":\"".date("Y-m-d H:i:s")."\"}}",
                    CURLOPT_HTTPHEADER => array(
                        "accept: application/json",
                        "authorization: Bearer ".Config::get('contactually.contactually_key')."",
                        "content-type: application/json",
                        "Cookie: _enforcery_session_id_production=f881322cf6cabb55add2b4e3d8e850d6"
                    )
                ));

                $response = curl_exec($curl);

            }

        }

        curl_close($curl);

    }

}