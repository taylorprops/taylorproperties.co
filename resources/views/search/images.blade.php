<?php

$rets_config = new \PHRETS\Configuration;
$rets_config -> setLoginUrl('http://bright-rets.brightmls.com:6103/cornerstone/login')
    -> setUsername(Config::get('rets.rets.username'))
    -> setPassword(Config::get('rets.rets.password'))
    -> setRetsVersion('RETS/1.8')
	-> setUserAgent('Bright RETS Application/1.0')
	-> setHttpAuthenticationMethod('digest') // or 'basic' if required
	-> setOption('use_post_method', true)
    -> setOption('disable_follow_location', false);

$rets = new \PHRETS\Session($rets_config);

$connect = $rets -> Login();

$ListingId = $_GET['id'];

$resource = 'Media';
$class = 'PROP_MEDIA';
$query = '(ListingId='.$ListingId.')';

$results = $rets -> Search(
    $resource,
    $class,
    $query,
    [
        'Select' => 'MediaURLFull, MediaURL, MediaURLMedium, PreferredPhotoYN, MediaCategory, MediaItemNumber'
    ]
);

$results = $results -> toArray();
$images = array();
if(count($results) > 0) {
    $c = 0;
    foreach($results as $listing) {
        //echo '<pre>';
        //print_r($listing);
        //echo '</pre>';
        if($listing['MediaCategory'] == 'Photo' || $listing['MediaCategory'] == 'Unbranded Virtual Tour') {
            $images[$c]['large'] = str_replace('http:', 'https:', $listing['MediaURLFull']);
            $images[$c]['medium'] = str_replace('http:', 'https:', $listing['MediaURL']);
            $images[$c]['thumb'] = str_replace('http:', 'https:', $listing['MediaURLMedium']);
            $images[$c]['order'] = $listing['MediaItemNumber'];
            $images[$c]['PreferredPhotoYN'] = $listing['PreferredPhotoYN'];
            $c += 1;
        }
    }


    // sort by preferred photo and then by order
    $PreferredPhotoYN = array();
    $MediaItemNumber = array();
    for ($i=0;$i<count($images);$i++) {
        $PreferredPhotoYN[] = $images[$i]['PreferredPhotoYN'];
        $MediaItemNumber[] = $images[$i]['order'];
    }
    array_multisort($PreferredPhotoYN, SORT_DESC,
        $MediaItemNumber, SORT_ASC, SORT_NUMERIC,
        $images);

    ?>
    <div id="listing_images">
    <?php
    $c = 0;
    foreach($images as $image) {
        if($c == 0) {
            echo '
            <div class="col-12 p-0">
                    <a href="'.$image['large'].'" data-lightbox="Listing"><img src="'.$image['thumb'].'" class="img-fluid listing-image-main" /></a>
            </div>';
        } else {
            if($c == 2) {
                echo '
                <div class="col-12 col-md-6 p-0">
                    <div id="listing_map"></div>
                </div>';
            }
            echo '<div class="col-12 col-md-6 p-0">';

            if(stristr($image['medium'], '.mp4')) {
                $image['medium'] = str_replace('dl=0', 'raw=1', $image['medium']);
                echo '
                <video height="300" controls autoplay muted id="listing_video">
                    <source src="'.$image['medium'].'" type="video/mp4">
                    <p>Your browser doesn\'t support HTML5 video. Here is
                    a <a href="'.$image['medium'].'">link to the video</a> instead.</p>
                </video>';
            } else if(stristr($image['medium'], '.jpg')) {
                echo '<a href="'.$image['medium'].'" data-lightbox="Listing"><img src="'.$image['thumb'].'" class="img-fluid listing-image" /></a>';
            }

            echo '</div>';
        }
        $c += 1;
    }
} else {
    echo '<div id="listing_images"><div class="display-4 w-50 mx-auto mt-5 text-primary" id="no_photos">No Photos Available</div></div>';
}
$rets -> Disconnect();
?>
</div>
