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

    .blur {
        filter: blur(0.3rem);
    }
    .rpr-avm-widget {
        width: 450px !important;
    }
    .rprw-est-value-and-date {
        width: 100% !important;
    }
    .rprw-est-value {
        width: 50% !important;
        text-align: center !important;
    }
    .search-again {
        max-width: 600px;
    }
    .home-value-header {
        font-size: 2.6rem;
    }
    #home_value_details_form {
        max-width: 500px;
    }

    @media (max-width: 768px) {
        body {
            padding: 0 0 !important;
        }
        .home-value-header {
            font-size: 1.4rem;
        }

    }
    @media (max-width: 576px) {
        .rpr-avm-widget {
            width: auto !important;
            max-width: auto !important;
        }
        .rprw-chart-cont img {
            max-width: 280px !important;
        }
    }
</style>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function() {

    @if(isset($_POST['show_form']))

    $('#home_value_modal').modal();
    $('#home_value_modal').on('hidden.bs.modal', function(e) {
        let cont = true;
        $('#home_value_details_first_name, #home_value_details_last_name, #home_value_details_phone, #home_value_details_email').each(function() {
            if($(this).val() == '') {
                cont = false;
            }
        });
        if(cont == false) {
            $('#home_value_modal').modal();
        }
    });

    $('#home_value_details_form').submit(function(e) {

        e.preventDefault();
        $('#save_home_value_button').html('<i class="fa fa-spinner fa-spin mr-2"></i> Getting Results');
        let form = $('#home_value_details_form');
        let formData = new FormData(form[0]);

        axios.post('/save_home_value_request', formData, axios_options)
            .then(function (response) {
                $('.blur').removeClass('blur');

                $('#home_value_modal').modal('hide');
            })
            .catch(function (error) {
                console.log(error);
            });
    });

    @else

    $('.blur').removeClass('blur');

    @endif



    //$('#found, #not_found').hide();
    setTimeout(function() {
        if($('#rprAvmWidget_1').html() == '') {
            $('#not_found').show();
        } else {
            $('#found').show();
        }
    }, 1000);

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
@section('content')

<div class="page-container page-home-values blur">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-1 mt-sm-4 mb-2 mb-sm-5 text-center">

                    <div class="home-value-header text-primary mb-3"><i class="fad fa-calculator mr-2"></i> Estimated Home Value Report</div>
                    <div class="p-4 rounded z-depth-1">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-xl-5 mx-auto">
                                <div class="d-flex align-items-center h-100">

                                    <div>
                                        <div class="h3 mb-1 text-secondary font-weight-normal">Your Home Value Results For</div>

                                        <div class="h5 text-primary mb-2 mb-lg-5">{{ $_POST['home_value_street_number'].' '.$_POST['home_value_street_name'] . ($_POST['home_value_unit'] != '' ? ' Unit '.$_POST['home_value_unit'] : '').' '.$_POST['home_value_city'].', '.$_POST['home_value_state'].' '.$_POST['home_value_zip'] }}</div>

                                        <div class="mt-1 mt-lg-5">
                                            Here is the estimated value of the property you have searched for. Automated property values are not as accurate as professional estimates so we strongly recommend that you speak with a Real Estate professional for a more accurate and complete home evaluation.
                                        </div>

                                        <!--div class="mt-2 mt-lg-4">
                                            <div class="h5 text-secondary">Call to schedule your professional evaluation</div>
                                        </div>
                                        <div class="mt-2">
                                            <div class="h5"><a href="tel:80059009525" class="text-primary">(800) 590-0925</a></div>
                                        </div-->

                                        <div class="mt-2 mt-lg-4">
                                            <div class="h5 text-secondary">Ready to take the next step? Learn about our REALTOR&reg; Match Program and find the perfect agent for your specific needs!</div>
                                        </div>
                                        <div class="mt-2">
                                            <a href="/realtors-near-me" class="btn btn-secondary" style="margin: 0 auto;">Find An Agent</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-xl-5 mx-auto">
                                <div id="found" class="hidden">
                                    <div class="w-100 d-flex justify-content-center mt-3">
                                        <script>
                                        var rprAvmWidgetOptions = {
                                                Token: "{{ config('narrpr.vars.narrpr_key') }}",
                                                Query: "{{ $_POST['home_value_street_number'] }} {{ $_POST['home_value_street_name'] }}, {{ $_POST['home_value_unit'] }}, {{ $_POST['home_value_city'] }}, {{ $_POST['home_value_state'] }} {{ $_POST['home_value_zip'] }}",
                                                CoBrandCode: "btstaylorproperties",
                                                ShowRprLinks: false
                                            }
                                        </script>
                                        <script src="//www.narrpr.com/widgets/avm-widget/widget.ashx/script"></script>
                                    </div>
                                </div>
                                <div id="not_found" class="h-100 hidden">
                                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                                        <div class="p-2 p-lg-5 bg-danger rounded">
                                                <div class="h5 text-white">
                                                    <i class="fal fa-exclamation-triangle mr-2"></i> We were not able to locate a property with the address provided.<br>
                                                    Please try again.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="search-again my-3 mx-auto p-3 border rounded">
                    <div class="h5 text-secondary">Search Again</div>
                    <form method="post" id="home_value_form" action="home_value_results">
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
                                <button class="btn btn-primary waves-effect" id="submit_home_value_form">Get Value</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <hr>

        <div class="container py-4">

            <!--Section: Main features & Quick Start-->
            <section class="pt-4">
                <h6 class="intro-close text-center text-primary" style="font-size: 1.8rem;font-family: 'Merriweather', serif;font-weight: 700;">Like What You See?</h6>
                <p class="intro-open text-center font-12">Learn more about our REALTOR Match Program! Our Match Program will match you with one of Taylor Properties' 800+ in-house real estate professionals in Maryland, Washington D.C. or Virginia, ready to help you list your home at top dollar. Our real estate agents are thoroughly vetted and are chosen to help our clients based on experience.</p>

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
                        <p class="intro-open text-center font-12">After working with a Realtor Match recommended real estate agent, we ask our clients for feedback on their experience so we can better serve future homebuyers and sellers by ensuring we make the best connections. Here’s what they have to say:</p>
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


</div>

<div class="modal fade" id="home_value_modal" tabindex="-1" role="dialog" aria-labelledby="home_value_modal_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center p-3 border-bottom">
                    <div>
                        <i class="fad fa-house text-primary fa-2x"></i>
                    </div>
                    <div class="text-primary font-11 ml-3">
                        Submit the following information to view your home value results
                    </div>
                </div>

                <form id="home_value_details_form" class="mx-auto">
                    <div class="form-row">
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="home_value_details_first_name" name="home_value_details_first_name" class="form-control" required>
                                <label for="home_value_details_first_name">First name</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="home_value_details_last_name" name="home_value_details_last_name" class="form-control" required>
                                <label for="home_value_details_last_name">Last name</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="md-form">
                                <input type="email" id="home_value_details_email" name="home_value_details_email" class="form-control" required>
                                <label for="home_value_details_email">E-mail</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="md-form">
                                <input type="text" id="home_value_details_phone" name="home_value_details_phone" class="form-control phone">
                                <label for="home_value_details_phone">Phone number</label>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="home_value_details_street_search" name="home_value_details_street_search" value="{{ $_POST['home_value_street_search'] }}">
                    <input type="hidden" id="home_value_details_unit" name="home_value_details_unit" value="{{ $_POST['home_value_unit'] }}">
                    <input type="hidden" id="home_value_details_street_number" name="home_value_details_street_number" value="{{ $_POST['home_value_street_number'] }}">
                    <input type="hidden" id="home_value_details_street_name" name="home_value_details_street_name" value="{{ $_POST['home_value_street_name'] }}">
                    <input type="hidden" id="home_value_details_state" name="home_value_details_state" value="{{ $_POST['home_value_state'] }}">
                    <input type="hidden" id="home_value_details_city" name="home_value_details_city" value="{{ $_POST['home_value_city'] }}">
                    <input type="hidden" id="home_value_details_county" name="home_value_details_county" value="{{ $_POST['home_value_county'] }}">
                    <input type="hidden" id="home_value_details_zip" name="home_value_details_zip" value="{{ $_POST['home_value_zip'] }}">
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-around">
                <a href="/what-is-my-home-worth" class="btn btn-danger"><i class="fa fa-arrow-left mr-2"></i> Go Back</a>
                <button class="btn btn-success" type="submit" form="home_value_details_form" id="save_home_value_button"><i class="fad fa-check mr-2"></i> See Results</button>
            </div>
        </div>
    </div>
</div>

@endsection

