@extends('layouts.app')
@section('content')
<div class="page-container page-index">
    <div class="container-full">
        <div class="row">
            <div class="col-12">
                <div class="view z-depth-3 index-view">
                    <img id="large_intro_image" src="images/index/house_small.jpg" class="w-100 intro-image" alt="Home Search">
                    <div class="mask rgba-white-light index-mask d-flex align-items-center">

                        <div class="search-container mx-auto">
                            <!-- Material form contact -->
                            <div class="card white-text">
                                <h5 class="card-header primary-color white-text text-center py-1 py-md-2">
                                    <strong>Home Search</strong>
                                </h5>
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
                </div>
            </div>
        </div>

        <div class="row mt-5 mt-xl-n5">
            <div class="col-12 mx-1 mt-0 col-sm-5 mx-sm-auto ml-xl-auto mr-xl-5 mt-xl-n5 text-center">
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
            <div class="col-12 mx-1 mt-2 col-sm-5 mx-sm-auto mr-xl-auto ml-xl-5 text-center  mt-xl-n5">
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

    </div>
    {{-- <hr class="curly-end d-none d-sm-block">
    <div class="container">
        <div class="row-fluid">
            <div class="intro-text">
                <p class="intro-open text-center font-12">They say "home is where the heart is" and
                    we know that finding the perfect home can be a daunting task. You need an experienced partner who
                    knows the neighborhoods, the market and the process. At Taylor Properties, we understand that we are
                    not only selling or buying your home. It is much more than that.</p>
                <p class="intro-close text-center text-primary" style="font-size: 1.4rem;font-family: 'Merriweather', serif;font-weight: 700;">
                    Taylor&nbsp;Properties. Love&nbsp;your&nbsp;home.</p>
            </div>
        </div>
    </div> --}}
    <hr class="curly-end d-none d-sm-block">

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