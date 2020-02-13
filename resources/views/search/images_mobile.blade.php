<?php

$rets_config = new \PHRETS\Configuration;
$rets_config->setLoginUrl('http://csrets.mris.com:6103/platinum/login')
    ->setUsername(Config::get('rets.rets.username'))
    ->setPassword(Config::get('rets.rets.password'))
    ->setRetsVersion('RETS/1.8')
	->setUserAgent('Bright RETS Application/1.0')
	->setHttpAuthenticationMethod('digest') // or 'basic' if required
	->setOption('use_post_method', true)
    ->setOption('disable_follow_location', false);

$rets = new \PHRETS\Session($rets_config);
$connect = $rets->Login();

$ListingId = $_GET['id'];

$resource = 'Media';
$class = 'PROP_MEDIA';
$query = '(ListingId='.$ListingId.')';

$results = $rets->Search(
    $resource,
    $class,
    $query,
    [
        'Select' => 'MediaURLFull, MediaURL, MediaURLMedium, PreferredPhotoYN, MediaCategory, MediaItemNumber'
    ]
);

$results = $results->toArray();
$images = array();

$c = 0;
foreach($results as $listing) {
    //echo '<pre>';
    //print_r($listing);
    //echo '</pre>';
    if($listing['MediaCategory'] == 'Photo' || $listing['MediaCategory'] == 'Unbranded Virtual Tour') {
    	$images[$c]['large'] = $listing['MediaURLFull'];
        $images[$c]['medium'] = $listing['MediaURL'];
        $images[$c]['thumb'] = $listing['MediaURLMedium'];
        $images[$c]['order'] = $listing['MediaItemNumber'];
        $images[$c]['PreferredPhotoYN'] = $listing['PreferredPhotoYN'];
        $c += 1;
    }
}

$rets->Disconnect();

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
<div id="listing_images_mobile">
    <?php
    foreach($images as $image) {
        //echo '<div class="swiper-slide"><a href="'.$image['large'].'" data-lightbox="Listing"><img src="'.$image['thumb'].'"></a></div>';
        echo '<div class="swiper-slide"><img src="'.$image['thumb'].'"></div>';
    }
    ?>
</div>
