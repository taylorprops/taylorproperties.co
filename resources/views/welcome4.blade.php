@extends('layouts.app')
@section('content')
<div class="page-container page-index">
    <div class="container container-full">

        <div class="row">

            <div class="col-lg-5 d-flex align-items-center text-center">
                <div class="w-100">
                    <h1 class="display-3">Taylor Properties</h1>
                    <h4 class="subheading">Maryland's Largest Independent Real Estate Broker</h4>

                    <div class="container d-none d-xl-block mt-5">

                        <div class="row">

                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Careers</h5>
                                        <p class="card-text">See why so many agents are leaving tradional Brokers and
                                            joining Taylor Properties</p>
                                        <a class="btn btn-secondary">More Info</a>
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Find an Agent</h5>
                                        <p class="card-text">View profiles and listings from 100's of our agents</p>
                                        <a class="btn btn-primary" href="#">Search Agents</a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-7">

                <div class="view z-depth-3">
                    <img src="images/index/house.jpg" class="img-fluid intro-image" alt="Home Search">
                    <div class="mask flex-center rgba-white-light">

                        <div class="search-container w-75 mx-auto">

                            <!-- Material form contact -->
                            <div class="card white-text">

                                <h5 class="card-header info-color white-text text-center py-4">
                                    <strong>Home Search</strong>
                                </h5>

                                <!--Card content-->
                                <div class="card-body px-lg-5 pt-0">

                                    <div class="search-div d-flex justify-content-around align-items-center">
                                        <div class="search-input-container">
                                            <div class="md-form">
                                                <i class="fal fa-search prefix white-text"></i>
                                                <input type="text" id="index_search" class="form-control">
                                                <label for="index_search">Search Properties</label>
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

    </div>
    <div class="container" style="margin-top: 75px;">
        <div class="row-fluid">
            <div class="intro-text">
                <p class="intro-open text-center" style="font-size: 1.2rem;">They say "home is where the heart is" and
                    we know that finding the perfect home can be a daunting task. You need an experienced partner who
                    knows the neighborhoods, the market and the process. At Taylor Properties, we understand that we are
                    not only selling or buying your home. It is much more than that.</p>
                <p class="intro-close text-center text-primary" style="font-size: 1.4rem;font-family: 'Merriweather', serif;font-weight: 700;">
                    Taylor&nbsp;Properties. Love&nbsp;your&nbsp;home.</p>
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
                                <div
                                    class="text-white text-center d-flex align-items-center rgba-stylish-strong py-5 px-4">
                                    <div>
                                        <h3 class="pt-2 text-white"><strong>Find Your New Home</strong></h3>
                                        <p>Search for your perfect home today. Filter your search by price, bedrooms,
                                            bathrooms, square footage and more! No matter what your requirements, we
                                            will find the right home for you!</p>
                                        <a class="btn btn-orange waves-effect waves-light" href="/search/listing_results"><i class="fas fa-search left"></i> Search
                                            Homes</a>
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
                                <div
                                    class="text-white text-center d-flex align-items-center rgba-stylish-strong py-5 px-4">
                                    <div>
                                        <h3 class="pt-2 text-white"><strong>Search Local Agents</strong></h3>
                                        <p>Having the right agent makes all the difference in finding that perfect home.
                                            Taylor Properties has over 800 local agents serving the Washington D.C.,
                                            Maryland, Virginia and Pennsylvania regions.</p>
                                        <a class="btn btn-orange waves-effect waves-light" href="/agents"><i
                                                class="fas fa-search left"></i> Search Agents</a>
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

let main_search_controller;
let main_search_signal;

$('#results_location_search').keyup(function() {

    if (main_search_controller !== undefined) {
        main_search_controller.abort();
    }
    if ('AbortController' in window) {
        main_search_controller = new AbortController;
        main_search_signal = main_search_controller.signal;
    }
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
        }, function(error) {
            //alert(error.message);
        });
    } else {
        $('.search-results-div').hide();
    }
});

/*
$('#results_location_search').keyup(function() {
    var val = $(this).val();
    if (val != '') {
        $.ajax({
            url: '{{ route('search.search_results') }}',
            type: 'get',
            data: {
                val: val
            },
            success: function(response) {
                if (response) {
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
*/
</script>
@endsection