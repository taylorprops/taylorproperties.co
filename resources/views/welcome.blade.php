@extends('layouts.app')
@section('content')
<div class="page-container page-index">
    <!-- Full Page Intro -->
    <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('/images/taylorprops-hero.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-stylish-strong d-flex justify-content-center align-items-center">
            <!-- Content -->
            <div class="container">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-md-12 mb-4 white-text text-center">
                        <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown" data-wow-delay="0.3s"><strong>LOVE YOUR HOME</strong></h1>
                        <h5 class="text-uppercase mb-4 white-text wow fadeInDown" data-wow-delay="0.4s"><strong>We’ll help you find a place you’ll love.</strong></h5>
                        <div class="input-group md-form form-sm form-1 pl-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text orange" id="basic-text1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
                            </div>
                            <input id="results_location_search" class="form-control my-0 py-1" type="text" placeholder="Search Address, City, State, Zip Code, etc." aria-label="Search" style="background: #fff;">
                            <div class="search-results-container">
                                <div class="search-results-div z-depth-3"></div>
                            </div>
                            <input type="hidden" class="search-field" id="search_city" data-id="city">
                            <input type="hidden" class="search-field" id="search_county" data-id="county">
                            <input type="hidden" class="search-field" id="search_zip" data-id="zip">
                            <input type="hidden" class="search-field" id="search_state" data-id="state">
                            <input type="hidden" class="search-field" id="search_subdivision" data-id="subdivision">
                            <input type="hidden" class="search-field" id="search_coordinates" data-id="coordinates">
                            <input type="hidden" class="search-field" id="search_listing_id" data-id="listing_id">
                        </div>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <div class="container" style="margin-top: 75px;">
        <div class="row-fluid">
            <div class="intro-text">
                <p class="intro-open text-center" style="font-size: 1.2rem;">They say "home is where the heart is" and we know that finding the perfect home can be a daunting task. You need an experienced partner who knows the neighborhoods, the market and the process. At Taylor Properties, we understand that we are not only selling or buying your home. It is much more than that.</p>
                <p class="intro-close text-center text-primary" style="font-size: 1.4rem;font-family: 'Merriweather', serif;font-weight: 700;">Taylor&nbsp;Properties. Love&nbsp;your&nbsp;home.</p>
            </div>
        </div>
    </div>
    <!-- Full Page Intro -->
    <div class="py-5" style="background-color: #e7ecef;">
        <div class="container mb-0" style="padding-top: 1.5rem;">
            <div class="row">
                <section>
                    <!-- Grid row -->
                    <div class="row mx-1">
                        <!-- Grid column -->
                        <div class="col-md-6 mb-4">
                            <!-- Card -->
                            <div class="card card-image" style="background-image: url(/images/find-home.jpg);">
                                <!-- Content -->
                                <div class="text-white text-center d-flex align-items-center rgba-stylish-strong py-5 px-4">
                                    <div>
                                        <h3 class="pt-2 text-white"><strong>Find Your New Home</strong></h3>
                                        <p>Search for your perfect home today. Filter your search by price, bedrooms, bathrooms, square footage and more! No matter what your requirements, we will find the right home for you!</p>
                                        <a class="btn btn-orange waves-effect waves-light" href="/search/listing_results"><i class="fas fa-search left"></i> Search Homes</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-6 mb-4">
                            <!-- Card -->
                            <div class="card card-image" style="background-image: url(/images/find-agent.jpg);">
                                <!-- Content -->
                                <div class="text-white text-center d-flex align-items-center rgba-stylish-strong py-5 px-4">
                                    <div>
                                        <h3 class="pt-2 text-white"><strong>Search Local Agents</strong></h3>
                                        <p>Having the right agent makes all the difference in finding that perfect home. Taylor Properties has over 800 local agents serving the Washington D.C., Maryland, Virginia and Pennsylvania regions.</p>
                                        <a class="btn btn-orange waves-effect waves-light" href="/agents"><i class="fas fa-search left"></i> Search Agents</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card -->
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </section>
            </div>
        </div>
    </div>
    @include('includes.featured_listings')
</div>
@endsection
@section('js')
<script type="text/javascript">
$("#results_location_search").keyup(function() {
var val = $(this).val();
if(val != '') {
$.ajax({
url: '{{ route('search.search_results') }}',
type: 'get',
data: { val: val },
success: function(response) {
if(response) {
$('.search-results-div').fadeIn().html(response);
$('.search-results-item').click(function() {
var type = $(this).data('type');
var text = $(this).text().trim();
$('#search_city, #city').val($(this).data('city'));
$('#search_county, #county').val($(this).data('county'));
$('#search_zip, #zip').val($(this).data('zip'));
$('#search_state, #state').val($(this).data('state'));
$('#search_subdivision, #subdivision').val($(this).data('subdivision'));
$('#search_coordinates, #coordinates').val($(this).data('coordinates'));
$('#search_listing_id, #listing_id').val($(this).data('listing_id'));
$('.search-results-div').hide();
$("#results_location_search").val(text);
$('#search_city, #city').trigger('change');
});
$(document).mouseup(function(e) {
var container = $('.search-results-div');
if (!container.is(e.target) && container.has(e.target).length === 0) {
container.hide();
}
});
} else {
$('.search-results-div').fadeIn().html('No results found');
}
}
});
} else {
$('.search-results-div').hide();
}
});
</script>
@endsection
