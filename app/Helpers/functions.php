<?php
if (!function_exists('YesNo')) {
    function YesNo($val)
    {
        if ($val == 'Y') {
            return 'Yes';
        } else if ($val == 'N') {
            return 'No';
        }
    }
}
if (!function_exists('get_sun_score')) {
    function get_sun_score($href)
    {

        $html = file_get_html($href);
        foreach ($html -> find('span[class=tooltip-icon-small]') as $item) {
            $item -> outertext = '';
        }
        foreach ($html -> find('div[class=text-center disagree]') as $item) {
            $item -> outertext = '';
        }
        foreach ($html -> find('div[class=address]') as $item) {
            $item -> outertext = '';
        }
        $results = $html -> find('div[class=col-md-4 text-center]', 0);
        $results = str_replace('col-md-4 text-center', 'col-12 mt-2', $results);
        $results = str_replace('num-small', 'h3', $results);
        $results = str_replace('results-box first center', 'text-center text-primary mb-2', $results);
        $results .= '<div class="text-center mt-3">For more info go to <a href="' . $href . '" target="_blank">www.sunnumber.com</a></div>';

        return $results;
    }
}

if (!function_exists('sale_type')) {
    function sale_type($type)
    {

        $foreclosure_regex = "/(Bankruptcy|Foreclosure|HUD|REO)/i";
        $shortsale_regex = "/(short|third)/i";
        $auction_regex = "/auction/i";

        if (preg_match($foreclosure_regex, $type)) {
            return 'Foreclosure';
        } else if (preg_match($shortsale_regex, $type)) {
            return 'Short Sale';
        } else if (preg_match($auction_regex, $type)) {
            return 'Auction';
        } else {
            return 'Standard';
        }
    }
}

if (!function_exists('heating')) {
    function heating($heating)
    {
        if (stristr($heating, 'heat pump')) {
            $heating = 'Heat Pump';
        } else if (stristr($heating, 'central')) {
            $heating = 'Central';
        } else if (stristr($heating, 'forced')) {
            $heating = 'Forced Air';
        } else if (stristr($heating, 'Baseboard')) {
            $heating = 'Baseboard';
        } else if (stristr($heating, 'Radiator')) {
            $heating = 'Radiator';
        } else if (stristr($heating, 'Wood')) {
            $heating = 'Wood Stove';
        } else if (stristr($heating, 'Solar')) {
            $heating = 'Solar';
        } else if (stristr($heating, 'Hot Water')) {
            $heating = 'Hot Water';
        } else if (stristr($heating, 'None')) {
            $heating = 'None';
        } else {
            $heating = 'Other';
        }

        return $heating;
    }
}

if (!function_exists('cooling')) {
    function cooling($cooling)
    {
        if (stristr($cooling, 'heat pump')) {
            $cooling = 'Heat Pump';
        } else if (stristr($cooling, 'central')) {
            $cooling = 'Central';
        } else if (stristr($cooling, 'ceiling')) {
            $cooling = 'Ceiling Fans';
        } else if (stristr($cooling, 'none')) {
            $cooling = 'None';
        } else if (stristr($cooling, 'wall')) {
            $cooling = 'Wall Unit';
        } else if (stristr($cooling, 'window')) {
            $cooling = 'Window Unit';
        } else {
            $cooling = 'Other';
        }

        return $cooling;
    }
}

if (!function_exists('list_date')) {
    function dom($list_date)
    {
        //$list_date = date("Y-m-d", strtotime($list_date));
        $today = new DateTime(date('Y-m-d'));
        $list_date = new DateTime($list_date);
        $interval = $list_date -> diff($today);
        $days = $interval -> format('%a');

        if ($days == 0) {
            return 'Listed today!';
        } else if ($days == 1) {
            return 'Listed yesterday';
        } else {
            return 'Listed '.$days.' days ago';
        }
    }
}

