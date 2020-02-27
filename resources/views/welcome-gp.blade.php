@extends('layouts.app-gp')
@section('content')
<div class="page-container page-index">
    <div class="container-full">
        <!-- GP HERO SECTION -->
        <div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('/images/taylorprops-hero.jpeg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
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
                                    <div class="h2-responsive card-header primary-color white-text text-center py-1 py-md-2"><i class="fal fa-home-alt mr-3"></i> Home Search</div>
                                    <!--Card content-->
                                    <div class="card-body px-lg-5 pt-0">
                                        <div class="search-div d-flex justify-content-center align-items-center">
                                            <div class="search-input-container">
                                                <div class="md-form mt-2 mt-md-3">
                                                    <i class="fal fa-search prefix text-primary"></i>
                                                    <input type="text" id="index_search" class="form-control">
                                                    <label for="index_search"><span id="search_label_big">Search by City, County, Address, Subdivision</span><span id="search_label_small">Search</span></label>
                                                </div>
                                                <div class="search-results-container">
                                                    <div class="search-results-div z-depth-3"></div>
                                                </div>
                                            </div>
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


        <div class="container" style="margin-top: 75px;">
            <div class="row-fluid">
                <div class="intro-text">
                    <p class="intro-open text-center font-12">They say "home is where the heart is" and
                        we know that finding the perfect home can be a daunting task. You need an experienced partner who
                        knows the neighborhoods, the market and the process. At Taylor Properties, we understand that you are
                        not just selling or buying a house. It is much more than that!</p>
                    <h6 class="intro-close text-center" style="color: #074266;font-size: 1.4rem;font-family: 'Merriweather', serif;font-weight: 700;">
                        Taylor&nbsp;Properties. Love&nbsp;your&nbsp;home.</h6>
                </div>
            </div>
        </div>

        <!-- Full Page Intro -->
        <div class="py-5" style="background-color: #eff1f3;">
            <div class="container mb-0" style="padding-top: 1.5rem;">
                <div class="row">
                    <section>
                        <!-- Grid row -->
                        <div class="row mx-1">
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
                            <!-- Grid column -->
                            <div class="col-md-6 mb-4">
                                <!-- Card -->
                                <div class="card card-image" style="background-image: url(/images/careers.jpg);">
                                    <!-- Content -->
                                    <div class="text-white text-center d-flex align-items-center rgba-stylish-strong py-5 px-4">
                                        <div>
                                            <h3 class="pt-2 text-white"><strong>Careers</strong></h3>
                                            <p>Looking for a career change or a better brokerage for your needs? Get 100% Commission and see why Taylor Properties is now the largest independent brokerage in Maryland. </p>
                                            <a class="btn btn-orange waves-effect waves-light" href="/careers"><i class="fas fa-search left"></i> Join Us</a>
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

        <!--div class="container">
            <div class="row">
                <div class="col-12 mx-1 mt-0 col-sm-5 mx-sm-auto ml-xl-auto mr-xl-5 text-center">
                    <div class="card bg-primary-dark">
                        <div class="card-body white-text">
                            <h4 class="card-title"><a href="/agents" class="orange-text"><i class="fal fa-person-sign mr-3 fa-1x"></i> Need an Agent?</a></h4>
                            <p class="card-text white-text"> Having the right agent makes all the difference in finding that perfect home. Taylor Properties has over 800 local agents serving the Maryland, Washington DC, Virginia and Pennsylvania regions.
                                <br>
                                <a href="/agents" class="btn btn-secondary btn-sm">Search Agents</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 mx-1 mt-2 col-sm-5 mx-sm-auto mr-xl-auto ml-xl-5 text-center ">
                    <div class="card bg-primary-light">
                        <div class="card-body white-text">
                            <h4 class="card-title"><a href="/careers" class="orange-text"><i class="far fa-user-tie fa-1x mr-3"></i> Careers</a></h4>
                            <p class="card-text white-text">
                                <strong>Make The Move!</strong><br>
                                Looking for a career change or a better brokerage for your
                                needs? See why Taylor Properties is now the largest independent brokerage in Maryland.
                                <br>
                                <a href="/careers" class="btn btn-secondary btn-sm">View Details</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div-->

    </div>

    @include('includes.featured_listings')
</div>

@endsection
@section('js')
<script type="text/javascript">
let main_search_controller;
let main_search_signal;
$("#index_search").off().on('keyup', function() {
    if (main_search_controller !== undefined) {
        main_search_controller.abort();
    }
    if ('AbortController' in window) {
        main_search_controller = new AbortController;
        main_search_signal = main_search_controller.signal;
    }
    $('.search-results-div').fadeIn().html('<div class="loader"></div>');
    var val = $(this).val();
    if (val != '') {
        fetch('{{ route('search.search_results') }}', {
            method: "POST",
            signal: main_search_signal,
            body: JSON.stringify({
                val: val
            }),
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).then(function(response) {
            return response.text()
        }).then(function(data) {
            if (data) {
                $('.search-results-div').fadeIn().html(data);
                $(document).mouseup(function(e) {
                    var container = $('.search-results-div');
                    if (!container.is(e.target) && container.has(e.target).length === 0) {
                        container.hide();
                    }
                });
                $('.search-results-item').click(function() {
                    var text = $(this).text().trim().replace(/[\s]{2,}/, ' ');
                    var city = $(this).data('city');
                    var county = $(this).data('county');
                    var zip = $(this).data('zip');
                    var state = $(this).data('state');
                    var subdivision = $(this).data('subdivision');
                    var listingid = $(this).data('listing_id');
                    var lat = $(this).data('lat');
                    var lon = $(this).data('lon');
                    if(listingid != '') {
                        url = '/search/listing_results?listing_id='+listingid+'&city='+city+'&state='+state+'&lat='+lat+'&lon='+lon+'&text='+encodeURIComponent(text);
                    } else {
                        var url = '/search/listing_results?city='+city+'&state='+state+'&subdivision='+subdivision+'&county='+county+'&zip='+zip+'&lat='+lat+'&lon='+lon+'&text='+encodeURIComponent(text);
                    }
                    window.location=url;
                });
            } else {
                $('.search-results-div').fadeIn().html('No results found');
            }
        }, function(error) {
            //alert(error.message);
        });
    } else {
        $('.search-results-div').hide();
    }
});

</script>
@endsection