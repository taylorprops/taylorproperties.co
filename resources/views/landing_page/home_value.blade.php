@extends('layouts.app-gp')
@section('title', 'What Is My Home Worth? | Home Value Estimator | Taylor Properties')
@section('meta-description')
Find out what your home is worth with a FREE Taylor Properties Home Value Estimator. List your home with Taylor Properties and be sure you're getting top dollar!
@endsection
@section('meta-keywords')
top listing agents in maryland, listing agent near me, listing real estate agent, what is my home worth
@endsection
@section('css')
<style type="text/css">
    .page-container {
        margin: 0 !important;
    }
    .search-container {
        width: 600px;
    }

    @media (max-width: 768px) {
        body {
            padding: 0 0 !important;
        }
        .search-container {
            max-width: 95%;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>
@endsection
@section('content')
<div class="page-container page-home-values">
    <div class="container-full mb-0 pt-sm-5">
        <!-- GP HERO SECTION -->
        <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('/images/taylorprops-forsale.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
            <!-- Mask & flexbox options-->
            <div class="mask rgba-stylish-light d-flex justify-content-center align-items-center">
                <!-- Content -->
                <div class="container">
                    <!--Grid row-->
                    <div class="row">
                        <!--Grid column-->

                        <div class="mask index-mask d-flex align-items-center">

                            <div class="search-container mx-auto">
                                <!-- Material form contact -->
                                <div class="card white-text">
                                    <div class="h2-responsive card-header bg-primary text-center py-1 py-md-2"><i class="fad fa-house mr-2"></i> Instant Home Value Report</div>
                                    <!--Card content-->
                                    <div class="card-body px-lg-5 pt-0">
                                        <div class="home-value-form-div">
                                            <form method="post" id="home_value_form" action="/home_value_results">

                                                <div class="form-row">
                                                    <div class="col-sm-10">
                                                        <div class="md-form">
                                                            <input type="text" id="home_value_street_search" name="home_value_street_search" class="form-control clear" placeholder="" required>
                                                            <label for="home_value_street">Property Street Address</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="md-form">
                                                            <input type="text" id="home_value_unit" name="home_value_unit" class="form-control clear">
                                                            <label for="home_value_unit">Unit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="home_value_street_number" name="home_value_street_number" class="clear">
                                                <input type="hidden" id="home_value_street_name" name="home_value_street_name" class="clear">
                                                <input type="hidden" id="home_value_state" name="home_value_state" class="clear">
                                                <input type="hidden" id="home_value_city" name="home_value_city" class="clear">
                                                <input type="hidden" id="home_value_county" name="home_value_county" class="clear">
                                                <input type="hidden" id="home_value_zip" name="home_value_zip" class="clear">
                                                <div class="form-row">
                                                    <div class="col text-center">
                                                        <button class="btn btn-primary waves-effect" id="submit_home_value_form">Get Value <i class="fad fa-arrow-circle-right fa-lg ml-2"></i></button>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="show_form" name="show_form" value="yes">
                                            </form>

                                        </div>
                                    </div>
                                </div>
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
    </div>



    <div class="container py-4">

        <!--Section: Main features & Quick Start-->
        <section class="pt-4">
            <h6 class="intro-close text-center text-primary" style="font-size: 1.8rem;font-family: 'Merriweather', serif;font-weight: 700;">Like What You See?</h6>
            <p class="intro-open text-center font-12">Learn more about our REALTOR Match Program! Our Match Program will match you with one of Taylor Properties' 800+ in-house real estate professionals in Maryland, Washington D.C., Virginia and Pennsylvania, ready to help you list and sell your home at top dollar. Our real estate agents are thoroughly vetted and chosen to help our clients based on experience.</p>

            <div class="row text-center d-flex justify-content-center mt-5 mb-0">
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                    <i class="fas fa-search-location fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">Tell us what you're looking for</h4>
                    <p class="intro-open text-center font-12">
                        Share a few details about your home selling scenario. You'll be done in a minute and we'll get started immediately.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-lg-0 mb-5">
                    <i class="fas fa-comments-alt fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">Talk with an expert matchmaker</h4>
                    <p class="intro-open text-center font-12">
                        An experienced Taylor Properties concierge will build your profile via phone or text at your convenience.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-md-0 mb-5">
                    <i class="far fa-chart-network fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">Let us do the legwork</h4>
                    <p class="intro-open text-center font-12">
                        Don't sift through or interview 20 agents to see who's qualified. We'll provide a local agent that best suits your needs. If you'd like to interview multiple agents, just let us know!
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-md-0 mb-5">
                    <i class="fas fa-handshake fa-3x mb-4" style="color: #084972 !important;"></i>
                    <h4 class="font-weight-bold mb-4">You meet your match</h4>
                    <p class="intro-open text-center font-12">
                        We'll set up a conversation with your licensed agent so you can get your home listed for the right price and all the necessary marketing. It's that easy! And the best part, it's free!
                    </p>
                </div>
            </div>

            <div class="row">
                <a href="/realtors-near-me" class="btn btn-secondary" style="margin: 0 auto;">Learn More</a>
            </div>
        </section>
        <!--Section: Main features & Quick Start-->

        <hr class="my-5">

        <!--Section: Main info-->
        <section class="wow fadeIn">
            <!--Grid row-->
            <div class="row">
                <!-- Section: Testimonials v.3 -->
                <section class="team-section text-center px-3">
                    <!-- Section heading -->
                    <h6 class="intro-close text-center text-primary" style="font-size: 1.8rem;font-family: 'Merriweather', serif;font-weight: 700;">What Our Clients Say</h6>
                    <!-- Section description -->
                    <p class="intro-open text-center font-12">After working with a Realtor Match recommended real estate agent, we ask our clients for feedback on their experience so we can better serve future sellers by ensuring we make the best connections. Here’s what they have to say:</p>
                    <!--Grid row-->
                    <div class="row text-center">
                        <!--Grid column-->
                        <div class="col-md-4 mb-md-0 mb-5">
                            <div class="testimonial">
                                <!--Content-->
                                <h4 class="font-weight-bold dark-grey-text mt-4">Courtney G.</h4>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fas fa-quote-left pr-2"></i>Taylor took over the sale of our home after it had been on the market for over 2 months in a neighborhood where houses were under contract in an average of 23 days. Immeditately upon taking over, they had us back on the market in 48 hours. The best part, after sitting on the market with no interested buyers for over 2 months, they were able to secure a contract within a week of re-listing!</p>
                                <!--Review-->
                                <div class="orange-text">
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-4 mb-md-0 mb-5">
                            <div class="testimonial">
                                <!--Content-->
                                <h4 class="font-weight-bold dark-grey-text mt-4">Chris B.</h4>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fas fa-quote-left pr-2"></i>My endless thanks to Taylor Properties and agent Kimberly Morse for how well the recent sale of my Piney Orchard condo went. Kim truly went above and beyond for me. I'm so lucky to have had her as my agent! Thanks again Kim!!</p>
                                <!--Review-->
                                <div class="orange-text">
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-4">
                            <div class="testimonial">
                                <!--Content-->
                                <h4 class="font-weight-bold dark-grey-text mt-4">Gina M.</h4>
                                <p class="font-weight-normal dark-grey-text">
                                    <i class="fas fa-quote-left pr-2"></i>We were first time home sellers and were unfamiliar with the home selling process. They made everything as easy as possible and accommodated our buy schedules without hesitation. We sold our house in 6 days!!! Working with them was smooth sailing and we would highly recommend them to anyone ready to sell.</p>
                                <!--Review-->
                                <div class="orange-text">
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                    <i class="fas fa-star"> </i>
                                </div>
                            </div>
                        </div>
                        <!--Grid column-->
                    </div>
                    <!--Grid row-->
                    <div class="row mt-3">
                        <a href="/realtors-near-me" class="btn btn-secondary" style="margin: 0 auto;">Find Your Listing Agent</a>
                    </div>
                </section>
                <!-- Section: Testimonials v.3 -->
            </div>
            <!--Grid row-->
        </section>
        <!--Section: Main info-->

    </div>


</div>

@endsection

@section('js')
<script type="text/javascript">
$(document).ready(function() {

    $('label[for="home_value_street"]').bind('click focus', function() {
        $(this).addClass('active').prev('input').focus();
    });

    $('#home_value_form').find('input.clear').val('');

    let address_search_street = document.getElementById('home_value_street_search');
    let places = new google.maps.places.Autocomplete(address_search_street);
    google.maps.event.addListener(places, 'place_changed', function () {



        let address_details = places.getPlace();

        let street_number = street_name = city = county = state = zip = '';
        address_details.address_components.forEach(function (address) {
            if (address.types.includes('street_number')) {
                street_number = address.long_name;
                $('#home_value_street_number').val(street_number);
            } else if (address.types.includes('route')) {
                street_name = address.long_name;
                $('#home_value_street_name').val(street_name);
            } else if (address.types.includes('administrative_area_level_2')) {
                county = address.long_name.replace(/'/, '');
                county = county.replace(/\sCounty/, '');
                $('#home_value_county').val(county);
            } else if (address.types.includes('locality')) {
                city = address.long_name;
                $('#home_value_city').val(city);
            } else if (address.types.includes('administrative_area_level_1')) {
                state = address.short_name;
                $('#home_value_state').val(state);
            } else if (address.types.includes('postal_code')) {
                zip = address.long_name;
                $('#home_value_zip').val(zip);
            }
        });

    });



});
</script>

@endsection