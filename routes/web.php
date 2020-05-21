<?php
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegistered;
use App\User;

/* REDIRECTS */
Route::redirect('/our-agents.php', '/agents', 301);
Route::redirect('/index.php', '/', 301);
Route::redirect('/careers.php', '/careers', 301);
Route::redirect('/contact-us.php', '/contact-us', 301);
Route::redirect('/careers.html', '/careers', 301);
Route::redirect('/index.html', '/', 301);
Route::redirect('/our-agents.html', '/agents', 301);
Route::redirect('/mortgage-information.php', '/about/partners', 301);
Route::redirect('/title-information.php', '/about/partners', 301);
Route::redirect('/partners.php', '/about/partners', 301);
Route::redirect('/index', '/', 301);
Route::redirect('/our-agents', '/agents', 301);
Route::redirect('/title-information.html', '/about/partners', 301);
Route::redirect('/mortgage-information.html', '/about/partners', 301);
Route::redirect('/legal/privacy-statement.php', '/privacy-policy', 301);
Route::redirect('/careers', '/careers', 301);
Route::redirect('/contact-us', '/contact-us', 301);
Route::redirect('/mortgage-information', '/about/partners', 301);
Route::redirect('/title-information', '/about/partners', 301);
Route::redirect('/contact-us.html', '/contact-us', 301);
Route::redirect('/careers.php/contact_us.php', '/contact-us', 301);
Route::redirect('/legal/privacy-statement', '/privacy-policy', 301);
Route::any('/agents/agent-profile.php{any?}', function ($any = null) {
    $agent_id = \Request::get('agent_id');
    return Redirect::to('/agents/'.$agent_id, 301);
}) -> where('any', '.*agent-profile.*');
/* END REDIRECTS */

Route::get('/', 'PageController@index');
Route::get('/privacy-policy', 'PageController@privacypolicy');
Route::get('/about', 'PageController@about');
Route::get('/about/our-staff', 'PageController@team');
Route::get('/about/partners', 'PageController@partners');
Route::get('/about/offices', 'PageController@offices');

Route::get('/careers', function () {
    return view('about.careers');
});
Route::get('/contact-us', function () {
    return view('about.contact');
});
Route::get('/buying-a-home', function () {
    return view('buy');
});
Route::get('/sell-my-house', function () {
    return view('sell');
});


/* GARYS DESIGNS */
//Route::get('/gp-homepage', 'PageController@gphomepage');

/* SEO LANDING PAGES */
Route::get('/100-commission-real-estate-broker', function () {
    return view('landing_page.100commission');
});
Route::get('/100-commission-real-estate-broker/real-estate-classes', function () {
    return view('about.continuing_ed');
});
Route::get('/100-commission-real-estate-broker/commission-calculator', function () {
    return view('landing_page.commission_calculator');
});
Route::get('/100-commission-real-estate-broker/faqs', function () {
    return view('landing_page.faqs');
});
Route::get('/100-commission-real-estate-broker/testimonials', function () {
    return view('landing_page.testimonials');
});
Route::get('/100-commission-real-estate-broker/training', function () {
    return view('landing_page.training');
});
Route::get('/join', function () {
    return view('landing_page.join');
}) -> name('join');
Route::get('/realtors-near-me', function () {
    return view('landing_page.realtormatch');
});
Route::get('/what-is-my-home-worth', function () {
    return view('landing_page.homevalue');
});


Route::post('/contact-submit', 'PageController@contactSubmit') -> name('contact.submit');

/* PROPERTY SEARCH */
Route::get('/search/listing_results', 'SearchController@listing_results') -> name('search.listing_results');
Route::get('/search/listing_results_map', 'SearchController@listing_results_map') -> name('search.listing_results_map');
Route::post('/search/listing_results_listings', 'SearchController@listing_results_listings') -> name('search.listing_results_listings');
Route::get('/search/listing_results_props_html', function() {
    return view('search.listing_results_props_html');
});
Route::post('/search/search_results', 'SearchController@search_results') -> name('search.search_results');

Route::get('/search/search_results_html', function() {
    return view('search.search_results_html');
});
// Property Details and Images
Route::get('/search/details', 'SearchController@search_details') -> name('search.details');
Route::get('/search/listing_details_html', function() {
    return view('search.listing_details_html');
});
Route::get('/search/images', function() {
    return view('/search/images');
}) -> name('search.images');

Route::get('/search/images_mobile', function() {
    return view('/search/images_mobile');
}) -> name('search.images_mobile');

Route::get('/search/school_data', 'SearchController@school_data') -> name('search.school_data');

/* AGENT PAGES */
Route::get('/agents', function() {
    return view('agents.agents');
}) -> name('agents');
Route::get('/agents_list', 'PageController@agents_list') -> name('agents_list');
Route::get('/agents/agent_profile', 'PageController@showAgent') -> name('agents.agent_profile');


Route::get('/agents/agent_profile_page', function() {
    return view('agents.agent_profile_page');
});
Route::get('/agents/{id}/{fullname}', 'PageController@showAgentProfile');
Route::get('/agents/{id}', 'PageController@showAgentProfile');
//Route::get('/{id}', 'PageController@showAgentProfile');

Route::post('/search-agents', 'PageController@searchAgents') -> name('agents.search_agents');
Route::get('/search-results', 'PageController@searchResults');


Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');

Route::post('/register/user', 'RegisterController@addUser') -> name('register.user');
Route::post('/login/user', 'LoginController@loginUser') -> name('login.user');

/* BACKEND DASHBOARD */
Route::get('/dashboard', 'DashboardController@index');
Route::post('/dashboard/search/delete', 'DashboardController@delete_search') -> name('delete.search');
Route::post('/dashboard/property/delete', 'DashboardController@delete_property') -> name('delete.property');
Route::post('/update_email_alerts', 'DashboardController@update_email_alerts') -> name('update_email_alerts');
Route::post('/dashboard/profile/update', 'DashboardController@update_user') -> name('update_user');

Route::post('/search/save_search', 'SearchController@save_search') -> name('search.save_search');
Route::post('/search/save_favorite', 'SearchController@save_favorite') -> name('search.save_favorite');
Route::post('/search/remove_favorite', 'SearchController@remove_favorite') -> name('search.remove_favorite');
Route::get('/search/user_data', 'SearchController@get_user_data') -> name('search.user_data');
Route::post('/search/schedule_showing', 'SearchController@schedule_showing') -> name('search.schedule_showing');
Route::post('/search/info_request', 'SearchController@info_request') -> name('search.info_request');

Route::post('/share', 'ShareController@share') -> name('share');

// receive SMS
Route::post('/sms_replies', 'SearchController@sms_replies');

/* tests */
Route::get('/test', 'TestController@test');
Route::get('/test2', function () {
    return view('/_tests/test2');
});