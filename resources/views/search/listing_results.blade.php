@extends('layouts.app')
@section('title', 'Taylor Properties')
@section('content')

<div class="search-page-container page-results">
    <div class="container-full-results">
        <div class="row">
            <div class="col-12 p-0">
                <!--Navbar-->
                <nav class="navbar navbar-expand-lg navbar-light search-options-container clear-fix navbar-search">
                    <!-- Collapse button -->
                    <button class="navbar-toggler btn z-depth-0" type="button" data-toggle="collapse" data-target="#search_options_nav" aria-controls="search_options_nav" aria-expanded="false" aria-label="Toggle navigation">Filter Results <i class="fas fa-caret-down fa-md ml-2"></i></button>
                    <a href="javascript: void(0)" id="hide_map" class="btn btn-sm btn-secondary d-block d-lg-none float-right mr-5">Hide Map</a>
                    <!-- Collapsible content -->
                    <div class="collapse navbar-collapse" id="search_options_nav">
                        <!-- Links -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item pl-4">
                                <div class="md-form my-0">
                                    <input class="form-control mr-sm-2" type="text" id="results_location_search" placeholder="Search" aria-label="Search">
                                    <div class="search-results-container">
                                        <div class="search-results-div z-depth-3"></div>
                                    </div>
                                </div>
                                <input type="hidden" class="search-field" id="search_city" data-id="city">
                                <input type="hidden" class="search-field" id="search_county" data-id="county">
                                <input type="hidden" class="search-field" id="search_zip" data-id="zip">
                                <input type="hidden" class="search-field" id="search_state" data-id="state">
                                <input type="hidden" class="search-field" id="search_subdivision" data-id="subdivision">
                                <input type="hidden" class="search-field" id="search_coordinates" data-id="coordinates">
                                <input type="hidden" class="search-field" id="search_listing_id" data-id="listing_id">
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="listing_type_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Listing Type
                                    </a>
                                    <div class="dropdown-menu listing-type-dropdown-menu">
                                        <ul class="listing_type_options list-group">
                                            <li class="list-group-item">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_for_sale" data-id="for_sale">
                                                    <label class="form-check-label font-weight-bold" for="search_for_sale">Residential - For Sale</label>
                                                </div>
                                                <ul class="list-group">
                                                    <li class="list-group-item border border-0">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input search-field for-sale-option" id="search_standard" data-id="standard" data-type="forsale">
                                                            <label class="form-check-label" for="search_standard">
                                                                Standard
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border border-0">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input search-field for-sale-option" id="search_new_construction" data-id="new_construction" data-type="forsale">
                                                            <label class="form-check-label" for="search_new_construction">
                                                                New Construction
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border border-0">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input search-field for-sale-option" id="search_foreclosures" data-id="foreclosures" data-type="forsale">
                                                            <label class="form-check-label" for="search_foreclosures">
                                                                Foreclosures/REO/HUD
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border border-0">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input search-field for-sale-option" id="search_short_sales" data-id="short_sales" data-type="forsale">
                                                            <label class="form-check-label" for="search_short_sales">
                                                                Short Sales
                                                            </label>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item border border-0">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input search-field for-sale-option" id="search_auction" data-id="auction" data-type="forsale">
                                                            <label class="form-check-label" for="search_auction">
                                                                Auction
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_rentals" data-id="rentals">
                                                    <label class="form-check-label font-weight-bold" for="search_rentals">
                                                        Rentals
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="text-center">
                                            <button class="btn btn-secondary close-dropdown mt-4">Done</button>
                                        </div>
                                    </div><!-- end .dropdown-menu -->
                                </div><!-- end .dropdown -->
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="property_type_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Property Type
                                    </a>
                                    <div class="dropdown-menu listing-type-dropdown-menu">
                                        <ul class="property_type_options list-group">
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_detached" data-id="detached">
                                                    <label class="form-check-label" for="search_detached">
                                                        Houses
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_apartments" data-id="apartments">
                                                    <label class="form-check-label" for="search_apartments">
                                                        Apartments
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_condos" data-id="condos">
                                                    <label class="form-check-label" for="search_condos">
                                                        Condos
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_townhouse" data-id="townhouse">
                                                    <label class="form-check-label" for="search_townhouse">
                                                        Townhouses
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_land" data-id="land">
                                                    <label class="form-check-label" for="search_land">
                                                        Land
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_farms" data-id="farms">
                                                    <label class="form-check-label" for="search_farms">
                                                        Farms
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_multifamily" data-id="multifamily">
                                                    <label class="form-check-label" for="search_multifamily">
                                                        Multi-Family
                                                    </label>
                                                </div>
                                            </li>
                                            <li class="list-group-item border border-0">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input search-field" id="search_duplex" data-id="duplex">
                                                    <label class="form-check-label" for="search_duplex">
                                                        Duplex
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <div class="text-center">
                                            <button class="btn btn-secondary close-dropdown mt-4">Done</button>
                                        </div>
                                    </div><!-- end .dropdown-menu -->
                                </div><!-- end .dropdown -->
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="price_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <div class="dropdown-menu price-dropdown-menu">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="md-form m-0">
                                                    <input type="text" class="form-control p-0 text-center search-field" id="search_min_price" data-id="min_price" placeholder="Min">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="md-form m-0">
                                                    <input type="text" class="form-control p-0 text-center search-field" id="search_max_price" data-id="max_price" placeholder="Max">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div id="min_price_options" class="price-options">
                                                    <ul class="list-group">
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="0">0</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="50,000">$50,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="75,000">$75,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="100,000">$100,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="150,000">$150,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="200,000">$200,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="250,000">$250,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="300,000">$300,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="400,000">$400,000+</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="500,000">$500,000+</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div id="max_price_options" class="price-options">
                                                    <ul class="list-group">
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="100,000">$100,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="200,000">$200,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="300,000">$300,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="400,000">$400,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="500,000">$500,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="600,000">$600,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="700,000">$700,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="800,000">$800,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="900,000">$900,000</button></li>
                                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="">Any Price</button></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-secondary close-dropdown mt-4">Done</button>
                                        </div>
                                    </div><!-- end .dropdown-menu -->
                                </div><!-- end .dropdown -->
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="beds_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <input type="hidden" class="search-field" id="search_beds" data-id="beds">
                                    <div class="dropdown-menu beds-dropdown-menu">
                                        <ul class="list-group beds-ul">
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="0">Any</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="1">1+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="2">2+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="3">3+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="4">4+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="5">5+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="6">6+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="7">7+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="8">8+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="9">9+</button></li>
                                        </ul>
                                    </div><!-- end .dropdown-menu -->
                                </div><!-- end .dropdown -->
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="baths_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <input type="hidden" class="search-field" id="search_baths" data-id="baths">
                                    <div class="dropdown-menu baths-dropdown-menu">
                                        <ul class="list-group baths-ul">
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="0">Any</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="1">1+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="2">2+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="3">3+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="4">4+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="5">5+</button></li>
                                            <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="6">6+</button></li>
                                        </ul>
                                    </div><!-- end .dropdown-menu -->
                                </div><!-- end .dropdown -->
                            </li>
                            <li class="nav-item">
                                <div class="dropdown">
                                    <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="other_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Other Options</a>
                                    <div class="dropdown-menu other-dropdown-menu">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="md-form">
                                                    <input type="text" id="search_sq_ft_min" class="w-75 search-field" placeholder="Min" data-id="sq_ft_min">
                                                    <label for="search_sq_ft_min">Square Feet</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="md-form">
                                                    <input type="text" id="search_sq_ft_max" class="w-75 search-field" placeholder="Max" data-id="sq_ft_max">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="md-form">
                                                    <input type="text" id="search_year_built_min" class="w-75 search-field" placeholder="Min" data-id="year_built_min">
                                                    <label for="search_year_built_min">Year Built</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="md-form">
                                                    <input type="text" id="search_year_built_max" class="w-75 search-field" placeholder="Max" data-id="year_built_max">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <select
                                                    class="mdb-select md-form colorful-select dropdown-primary w-100 search-field" id="search_lot_size_min" data-id="lot_size_min">
                                                    <option selected value="">Any</option>
                                                    <option value="1000">1,000 sqft</option>
                                                    <option value="2000">2,000 sqft</option>
                                                    <option value="3000">3,000 sqft</option>
                                                    <option value="4000">4,000 sqft</option>
                                                    <option value="5000">5,000 sqft</option>
                                                    <option value="21780">1/2 acre</option>
                                                    <option value="43560">1 acre</option>
                                                    <option value="87120">2 acres</option>
                                                    <option value="217800">5 acres</option>
                                                    <option value="435600">10 acres</option>
                                                    <option value="2178000">50 acres</option>
                                                    <option value="4356000">100 acres</option>
                                                </select>
                                                <label for="search_lot_size_min">Lot Size Min</label>
                                            </div>
                                            <div class="col-6">
                                                <select
                                                    class="mdb-select md-form colorful-select dropdown-primary w-100 search-field" id="search_lot_size_max" data-id="lot_size_max">
                                                    <option value="1000">1,000 sqft</option>
                                                    <option value="2000">2,000 sqft</option>
                                                    <option value="3000">3,000 sqft</option>
                                                    <option value="4000">4,000 sqft</option>
                                                    <option value="5000">5,000 sqft</option>
                                                    <option value="21780">1/2 acre</option>
                                                    <option value="43560">1 acre</option>
                                                    <option value="87120">2 acres</option>
                                                    <option value="217800">5 acres</option>
                                                    <option value="435600">10 acres</option>
                                                    <option value="2178000">50 acres</option>
                                                    <option value="4356000">100 acres</option>
                                                    <option selected value="">Any</option>
                                                </select>
                                                <label for="search_lot_size_min">Lot Size Max</label>
                                            </div>
                                        </div>
                                    </div><!-- end .dropdown-menu -->
                                </div><!-- end .dropdown -->
                            </li>
                        </ul>
                        <div class="mr-5" id="saved_search_div">

                            @if(session() -> has('search_name'))
                            <div>Showing your saved search <span id="search_alias" class="font-weight-bold text-primary">{{ session('search_name') }}</span></div>
                            @else
                            <a href="javascript: void(0)" class="btn-sm btn-primary white-text ml-1 ml-lg-0" id="save_search">Save Search</a>
                            <div id="search_saved">Search <span id="search_alias" class="font-weight-bold text-primary"></span> has been saved!</div>
                            @endif
                        </div>
                        <div class="mr-5">
                            <div class="dropdown sortby-dropdown">
                                <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="sortby_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</a>
                                <div class="dropdown-menu sortby-dropdown-menu">
                                    <ul class="list-group sortby-ul">
                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="MlsListDate" data-order="DESC">Newest</button>
                                        </li>
                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="ListPrice" data-order="DESC">Price High to Low</button></li>
                                        <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="ListPrice" data-order="ASC">Price Low to High</button></li>
                                    </ul>
                                </div><!-- end .dropdown-menu -->
                                <input type="hidden" class="search-field" id="search_sortby" data-id="sortby">
                                <input type="hidden" class="search-field" id="search_sortby_order" data-id="sortby_order">
                            </div>
                        </div>
                        <!-- Collapsible content -->
                </nav>
                <!--/.Navbar-->
            </div><!-- ./ .col-12 -->
        </div><!-- ./ .row -->
        <div class="row">
            <div class="col-12 col-lg-7 p-0 overflow-hidden">
                <div class="map_container pl-2">
                    <div class="loader map-loader"></div>
                    <div id="results_map"></div>
                </div>
            </div>
            <div class="col-12 col-lg-5 p-0 m-0">
                <div class="listing-side-container">
                    <div class="loader listings-loader"></div>
                    <div class="listing-side-results"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="details-div z-depth-5">
        <div class="row">
            <div class="d-none d-md-block col-md-6 col-lg-7 image-gallery pr-0">
                <div class="container">
                    <div class="row" id="listing_images_div"> </div><!-- ./ .row -->
                </div>
            </div><!-- ./ .col-md-7 -->
            <div class="d-block d-md-none col-12">
                <!-- Slider main container -->
                <div class="swiper-container">
                    <a href="javascript: void(0)" id="close_listing_details" class="d-block d-sm-none"><i class="fal fa-times-circle text-white fa-2x"></i></a>
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper" id="mobile_swiper">
                        <!-- Slides -->
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- If we need navigation buttons
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                    //If we need scrollbar
                    <div class="swiper-scrollbar"></div>
                    -->
                </div>
            </div><!-- ./ .d-block d-md-none col-12 -->
            <div class="col-12 col-md-6 col-lg-5 pl-0">
                <div class="row">
                    <div class="col-12">
                        <div id="listing_details_div">
                        </div><!-- ./ . id="listing_details_div" -->
                    </div><!-- ./ .col-12 -->
                </div><!-- ./ .row -->
            </div><!-- ./ .col-md-5 -->
        </div><!-- ./ .row -->
    </div> <!-- ./ .details-div -->


    <div class="modal fade" id="addAliasModal" tabindex="-1" role="dialog" aria-labelledby="addAliasModalLabel" aria-hidden="true">
        <!-- Change class .modal-sm to change the size of the modal -->
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary white-text">
                    <h4 class="modal-title w-100" id="addAliasModalLabel">Search Name</h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="add_alias_form" class="needs-validation container mb-0" novalidate>
                    <div class="alert alert-danger hidden" role="alert" id="save_search_alert">
                        <i class="fal fa-exclamation-triangle mr-2"></i> There is already a saved search by that name!
                    </div>
                    <div id="update_search_div">
                        <p class="note note-success">To save your search with the new settings click the button below.</p>
                        <a href="javascript: void(0)" id="update_search" class="btn btn-success btn-sm">Update Search</a>
                    </div>
                    <div class="modal-body">
                        <div class="md-form mb-4">
                            <i class="far fa-arrow-circle-right prefix"></i>
                            <input type="text" id="add_alias" class="form-control validate" value="{{ session('search_name') ?? '' }}" required>
                            <label for="add_alias">Name Your Search</label>
                            <div class="invalid-feedback">A Search Name is required</div>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="save_alias">Save Search <i class="fal fa-save mr-l"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalShowingRequest" tabindex="-1" role="dialog" aria-labelledby="modalShowingRequestLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center bg-primary white-text">
                    <h4 class="modal-title w-100 font-weight-bold">Schedule Showing</h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-header bg-default white-text d-flex justify-content-center">
                    <div id="showing_request_listing_details"></div>
                </div>
                <form id="showing_request_form" class="needs-validation container mb-0" novalidate>
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="md-form my-2">
                                    <i class="fal fa-user prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_name" id="showing_name" class="form-control validate" required>
                                    <label for="showing_name">Your Name</label>
                                    <div class="invalid-feedback">Name is required</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="md-form my-2">
                                    <i class="fal fa-envelope prefix grey-text fa-sm"></i>
                                    <input type="email" name="showing_email" id="showing_email" class="form-control validate" required>
                                    <label for="showing_email">Your Email</label>
                                    <div class="invalid-feedback">A valid email is required</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="md-form my-2">
                                    <i class="fal fa-phone prefix grey-text fa-sm"></i>
                                    <input type="tel" name="showing_phone" id="showing_phone" class="form-control validate phone" required>
                                    <label for="showing_phone">Your Phone</label>
                                    <div class="invalid-feedback">Phone is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="md-form my-2">
                                    <i class="fal fa-calendar-alt prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_date" id="showing_date" class="form-control validate datepicker" required>
                                    <label for="showing_date">Showing Date</label>
                                    <div class="invalid-feedback">Showing date is required</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="md-form my-2">
                                    <i class="fal fa-clock prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_time" id="showing_time" class="form-control validate time" required>
                                    <label for="showing_time">Showing Time</label>
                                    <div class="invalid-feedback">Showing Time is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="md-form my-2">
                                    <i class="fal fa-calendar-alt prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_date_alt" id="showing_date_alt" class="form-control datepicker">
                                    <label for="showing_date_alt">Alternate Showing Date</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="md-form my-2">
                                    <i class="fal fa-clock prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_time_alt" id="showing_time_alt" class="form-control time">
                                    <label for="showing_time_alt">Alternate Showing Time</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="md-form my-2">
                                    <i class="fal fa-comment-alt prefix grey-text fa-sm"></i>
                                    <textarea name="comments" id="comments" class="md-textarea form-control" rows="1"></textarea>
                                    <label for="comments">Comments</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="send_request_button">Send Request <i class="fal fa-share"></i></button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal fade" id="showingRequestModalSuccess" tabindex="-1" role="dialog" aria-labelledby="showingRequestModalSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Showing Request Successfully Submitted</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>An agent will contact you shortly to confirm your showing appointment</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Close</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>

    <div class="modal fade" id="modalInfoRequest" tabindex="-1" role="dialog" aria-labelledby="modalInfoRequestLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-center bg-primary white-text">
                    <h4 class="modal-title w-100 font-weight-bold">Request Info</h4>
                    <button type="button" class="close white-text" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-header bg-default white-text d-flex justify-content-center">
                    <div id="info_request_listing_details"></div>
                </div>
                <form id="info_request_form" class="needs-validation container mb-0" novalidate>
                    <div class="modal-body mx-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="md-form my-2">
                                    <i class="fal fa-user prefix grey-text fa-sm"></i>
                                    <input type="text" id="info_request_name" class="form-control validate" required>
                                    <label for="info_request_name">Your Name</label>
                                    <div class="invalid-feedback">Name is required</div>
                                </div>
                            </div>
                            <div class="col-lg-4"">
                                <div class="md-form my-2">
                                    <i class="fal fa-envelope prefix grey-text fa-sm"></i>
                                    <input type="email" id="info_request_email" class="form-control validate" required>
                                    <label for="info_request_email">Your Email</label>
                                    <div class="invalid-feedback">A valid email is required</div>
                                </div>
                            </div>
                            <div class="col-lg-4"">
                                <div class="md-form my-2">
                                    <i class="fal fa-phone prefix grey-text fa-sm"></i>
                                    <input type="tel" id="info_request_phone" class="form-control validate phone" required>
                                    <label for="info_request_phone">Your Phone</label>
                                    <div class="invalid-feedback">Phone is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="md-form my-2">
                                    <i class="fal fa-comment-alt prefix grey-text fa-sm"></i>
                                    <textarea id="info_request_comments" class="md-textarea form-control" rows="4"></textarea>
                                    <label for="info_request_comments">Comments</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="send_info_request_button">Send Request</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal fade" id="infoRequestModalSuccess" tabindex="-1" role="dialog" aria-labelledby="moreInfoRequestModalSuccessLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Information Request Successfully Submitted</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>An agent will contact you shortly to answer any questions you may have.</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">Close</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>


</div>


<form id="search_form">
    <input type="hidden" name="for_sale" id="for_sale" value="on">
    <input type="hidden" name="rentals" id="rentals">
    <input type="hidden" name="zip" id="zip">
    <input type="hidden" name="city" id="city">
    <input type="hidden" name="state" id="state">
    <input type="hidden" name="county" id="county">
    <input type="hidden" name="subdivision" id="subdivision">
    <input type="hidden" name="coordinates" id="coordinates">
    <input type="hidden" name="listing_id" id="listing_id">
    <input type="hidden" name="beds" id="beds" value="1">
    <input type="hidden" name="baths" id="baths" value="1">
    <input type="hidden" name="min_price" id="min_price" value="0">
    <input type="hidden" name="max_price" id="max_price" value="0">
    <input type="hidden" name="sq_ft_min" id="sq_ft_min">
    <input type="hidden" name="sq_ft_max" id="sq_ft_max">
    <input type="hidden" name="year_built_min" id="year_built_min">
    <input type="hidden" name="year_built_max" id="year_built_max">
    <input type="hidden" name="lot_size_min" id="lot_size_min">
    <input type="hidden" name="lot_size_max" id="lot_size_max">
    <input type="hidden" name="standard" id="standard">
    <input type="hidden" name="new_construction" id="new_construction">
    <input type="hidden" name="foreclosures" id="foreclosures">
    <input type="hidden" name="short_sales" id="short_sales">
    <input type="hidden" name="auction" id="auction">
    <input type="hidden" name="detached" id="detached">
    <input type="hidden" name="apartments" id="apartments">
    <input type="hidden" name="condos" id="condos">
    <input type="hidden" name="townhouse" id="townhouse">
    <input type="hidden" name="land" id="land">
    <input type="hidden" name="farms" id="farms">
    <input type="hidden" name="multifamily" id="multifamily">
    <input type="hidden" name="duplex" id="duplex">
    <input type="hidden" name="sortby" id="sortby" value="MlsListDate">
    <input type="hidden" name="sortby_order" id="sortby_order" value="DESC">
    <input type="hidden" name="start_from_datetime" id="start_from_datetime">
    <input type="hidden" name="saved_search_id" id="saved_search_id">

</form>

<input type="hidden" id="search_id">
<input type="hidden" id="map_initiated" value="no">
<input type="hidden" id="add_favorite_listing_id">

@endsection
@section('map_js')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>
<script src="{{ asset('addons/cluster/leaflet.markercluster.js') }}"></script>
@endsection
@section('js')
<script>
    var map;
    init_map();

    set_input_values();
    search_options();
    setTimeout(function() {
        get_map_data();
        listings_data(1);
    }, 300);

    toastr.options = {
        "timeOut": 2000
    }

    setTimeout(function() {
        $('#save_search').click(save_search);
    }, 1000);

    var _token = '{{ csrf_token() }}';

    window.axios_options = {
        headers: { 'X-CSRF-TOKEN': _token }
    };

    $('#hide_map').click(function() {
        if($(this).text() == 'Hide Map') {
            $(this).text('Show Map');
            $('.map_container').hide();
            $('.listing-side-results').css({ height: '85VH' });
        } else {
            $(this).text('Hide Map');
            $('.map_container').show();
            $('.listing-side-results').css({ height: '55VH' });
        }
    });


    /* had to add this function to this file because it would not work in global.js */
    function register_user() {
        $('#signup_button').html('Saving <i class="fas fa-spinner fa-spin"></i>');
        let formData = new FormData();
        formData.append('email', $('#register_email').val());
        formData.append('password', $('#register_password').val());
        formData.append('phone', $('#register_phone').val());
        formData.append('name', $('#register_name').val());

        axios.post('/register/user', formData, axios_options)
        .then(function (response) {
            data = response.data;
            if (data.status == 'error') {
                $('#register_error').show();
                $('#already_registered_login').unbind('click').bind('click', function() {
                    $('#modalRegisterForm').modal('hide');
                    $('#modalSignInForm').modal();
                });
            } else {
                $('#modalRegisterForm').modal('hide');
                $('#nav_logged').html('<div id="nav_logged_in"><a href="/dashboard" class="mb-n2 text-white float-right"><i class="fal fa-user-circle mr-2"></i> My Account</a><br><a href="/logout" class="text-yellow float-right"><small><i class="fal fa-sign-out mr-2"></i> Logout </small></a></div>');
                if ($('#active_service').val() == 'save_search') {
                    add_alias();
                } else if ($('#active_service').val() == 'save_favorite') {
                    setTimeout(function() {
                        add_favorite(data.lead_id);
                    }, 500);
                }
            }
            $('#signup_button').html('Sign Up');
        })
        .catch(function (error) {
            console.log(error);
        });

    }


    function add_showing_request() {
        var cont = 'yes';
        $('#showing_request_form .validate').each(function() {
            if(!$(this).hasClass('valid')) {
                cont = 'no';
            }
        });
        if(cont == 'yes') {
            $('#send_request_button').html('Sending <i class="fas fa-spinner fa-spin"></i>').prop('disabled', true);
            var name = $('#showing_name').val();
            var phone = $('#showing_phone').val();
            var email = $('#showing_email').val();
            var address = $('#address').val();
            var showing_date = $('#showing_date').val();
            var showing_time = $('#showing_time').val();
            var showing_date_alt = $('#showing_date_alt').val();
            var showing_time_alt = $('#showing_time_alt').val();
            var comments = $('#comments').val();
            var listing_id = $('#listing_id').val();
            $.ajax({
                type: 'post',
                url: '{{ route('search.schedule_showing') }}',
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    showing_date: showing_date,
                    showing_time: showing_time,
                    showing_date_alt: showing_date_alt,
                    showing_time_alt: showing_time_alt,
                    comments: comments,
                    listing_id: listing_id,
                    address: address,
                    _token: _token
                },
                success: function(response) {
                    $('#modalShowingRequest').modal('hide');
                    clear_form($('#showing_request_form'));
                    $('#showingRequestModalSuccess').modal();
                }
            });
        }
    }

    function info_request() {
        $('#send_info_request_button').html('Sending <i class="fas fa-spinner fa-spin"></i>').prop('disabled', true);
        var name = $('#info_request_name').val();
        var phone = $('#info_request_phone').val();
        var email = $('#info_request_email').val();
        var comments = $('#info_request_comments').val();
        var listing_id = $('#listing_id').val();
        var address = $('#address').val();
        var url = window.location.href;
        $.ajax({
            type: 'post',
            url: '{{ route('search.info_request') }}',
            data: {
                name: name,
                phone: phone,
                email: email,
                comments: comments,
                listing_id: listing_id,
                address: address,
                url: url,
                _token: _token
            },
            success: function(response) {
                $('#modalInfoRequest').modal('hide');
                clear_form($('#info_request_form'));
                $('#infoRequestModalSuccess').modal();
            }
        });
    }

    function clear_form(form) {
        form.find('input, select, textarea').val('');
        form.find('.valid').removeClass('valid');
        form.find('label.active').removeClass('active');
        $('#send_request_button, #send_info_request_button').html('Send Request <i class="fal fa-share"></i>').prop('disabled', false);
    }

    function get_user_data(type) {
        $.ajax({
            type: 'get',
            url: '{{ route('search.user_data') }}',
            data: {
                _token: _token
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'found') {
                    if (type == 'showing') {
                        $('#showing_name').val(response.name).addClass('valid').next('label').addClass('active');
                        $('#showing_email').val(response.email).addClass('valid').next('label').addClass('active');
                        $('#showing_phone').val(response.phone).addClass('valid').next('label').addClass('active');
                    } else if (type == 'info') {
                        $('#info_request_name').val(response.name).addClass('valid').next('label').addClass('active');
                        $('#info_request_email').val(response.email).addClass('valid').next('label').addClass('active');
                        $('#info_request_phone').val(response.phone).addClass('valid').next('label').addClass('active');
                    }
                }
            }
        });
    }

    function remove_favorite() {
        var listing_id = $(this).data('id');
        $.ajax({
            type: 'post',
            url: '{{ route('search.remove_favorite') }}',
            data: {
                listing_id: listing_id,
                _token: _token
            },
            success: function(response) {
                $('#listing_' + listing_id).find('.favorite').show();
                $('#listing_' + listing_id).find('.remove-favorite').hide();
                $('#details_options').find('.favorite').show();
                $('#details_options').find('.remove-favorite').hide();
                toastr['info']('Property Removed From Your Favorites');
            }
        });
    }

    function add_favorite(lead_id) {
        var listing_id = $('#add_favorite_listing_id').val();
        $.ajax({
            type: 'post',
            url: '{{ route('search.save_favorite') }}',
            data: {
                listing_id: listing_id,
                lead_id: lead_id,
                _token: _token
            },
            success: function(response) {
                $('#listing_' + listing_id).find('.favorite').hide();
                $('#listing_' + listing_id).find('.remove-favorite').show();
                $('#details_options').find('.favorite').hide();
                $('#details_options').find('.remove-favorite').show();
                toastr['success']('Property Saved To Your Favorites');
            }
        });
    }

    function add_to_favorites() {
        var id = $(this).data('id');
        $('#add_favorite_listing_id').val(id);

        $.ajax({
            type: 'get',
            data: {
                _token: _token
            },
            url: '{{ route('search.user_data') }}',
            success: function(response) {
                if (response.status == 'found') {
                    add_favorite(response.lead_id);
                } else {
                    $('#modalRegisterForm').modal();
                    $('#active_service').val('save_favorite');
                    $('#register_form').off().on('submit', function (e) {
                        e.preventDefault();
                        register_user();
                    });

                    $('.open-login').unbind('click').bind('click', function () {
                        $('#modalRegisterForm').modal('hide');
                        $('#modalSignInForm').modal();
                    });
                }
            }
        });

    }

    function save_search() {

        $.ajax({
            type: 'get',
            data: {
                _token: _token
            },
            url: '{{ route('search.user_data') }}',
            success: function(response) {
                if (response.status == 'found') {
                    add_alias();
                } else {
                    $('#modalRegisterForm').modal();
                    $('#active_service').val('save_search');
                    $('#register_form').off().on('submit', function(e) {
                        e.preventDefault();
                        register_user();
                    });

                    $('.open-login').unbind('click').bind('click', function() {
                        $('#modalRegisterForm').modal('hide');
                        $('#modalSignInForm').modal();
                    });
                }
            }
        });

    }

    function add_alias() {
        $('#addAliasModal').modal();
    }

    $('#add_alias_form').off().on('submit', function(e) {
        e.preventDefault();
        $('#save_alias').html('Saving  <i class="fas fa-spinner fa-spin"></i>');
        save_alias('no');
        $('#update_search').click(function() {
            save_alias('yes');
            $(this).html('Saving  <i class="fas fa-spinner fa-spin"></i>');
        });
    });
    function save_alias(update_search) {
        var search_url = window.location.href;
        var alias = $('#add_alias').val();

        $.ajax({
            type: 'post',
            url: '/search/save_search',
            data: {
                _token: _token,
                search_url: search_url,
                alias: alias,
                update_search: update_search
            },
            success: function(response) {
                $('#save_alias').html('Save Search <i class="fal fa-save ml-2"></i>');
                $('#update_search').html('Update Search');
                if (response.status == 'fail') {
                    $('#save_search_alert').show();
                    $('#update_search_div').show();
                } else {
                    toastr['success']('Search has been saved!');
                    $('#save_search').hide();
                    $('#search_saved').show();
                    $('#addAliasModal').modal('hide');
                    $('#search_alias').html(alias);
                    $('#save_search_alert, #update_search_div').hide();
                    $('#add_alias').val('');
                }
            }
        });
    }



    <?php
    $listing_id = $_GET['listing_id'] ?? null;
    $lat        = $_GET['lat'] ?? null;
    $lon        = $_GET['lon'] ?? null;
    $state      = $_GET['state'] ?? null;
    $text       = $_GET['text'] ?? null;

    if ($listing_id != '') { ?>
    show_details('<?php echo $listing_id; ?>', '<?php echo $lat; ?>', '<?php echo $lon; ?>', '<?php echo $state; ?>');
    <?php } ?>

    $('#results_location_search').val('<?php echo $text; ?>');



    var marker_layer = L.markerClusterGroup({
        disableClusteringAtZoom: 18,
        maxClusterRadius: 80,
        chunkedLoading: true
    });
    //var drawnItems = L.featureGroup().addTo(map);
    var custom_icon = L.Icon.extend({
        options: {
            iconSize: [20, 16],
            iconAnchor: [10, 0],
            popupAnchor: [0, -10]
        }
    });

    var forsale_icon = new custom_icon({
        iconUrl: '/images/search/forsale_icon.png'
    });
    var forrent_icon = new custom_icon({
        iconUrl: '/images/search/forrent_icon.png'
    });

    function add_markers(listings, search_id) {
        if ($('#search_id').val() == search_id) {
            // Gather lats and longs for boundaries
            var latLngs = [];
            // Loop through listings
            listings.forEach(function(listing) {
                if ($('#search_id').val() == search_id) {
                    // lat and long for boundaries
                    latLngs.push([listing.Latitude, listing.Longitude]);

                    // Tooltip Options
                    if (listing.PropertyType.match(/lease/i)) {
                        toolTipClass = 'tooltip-rental';
                    } else {
                        toolTipClass = 'tooltip-sale';
                    }
                    var tooltipOptions = {
                        permanent: true,
                        direction: 'top',
                        className: toolTipClass
                    }
                    // Create new marker for property's lat and long
                    /*
                    if (listing.PropertyType.match(/lease/i)) {
                        var marker = L.marker([listing.Latitude, listing.Longitude], {
                            icon: forrent_icon
                        });
                    } else {
                        var marker = L.marker([listing.Latitude, listing.Longitude], {
                            icon: forsale_icon
                        });
                    }
                    */
                    if (listing.PropertyType.match(/lease/i)) {
                        var marker = L.circleMarker([listing.Latitude, listing.Longitude], {
                            color: '#FF7E6B'
                        });
                    } else {
                        var marker = L.circleMarker([listing.Latitude, listing.Longitude], {
                            color: '#3273FF'
                        });
                    }
                    // Create popup
                    if(listing.ListPictureURL != '') {
                        var image_src = listing.ListPictureURL;
                    } else {
                        var image_src = '/images/search/no_photo.png';
                    }
                    var detailsPopUpContent = '<div id="popup_container" class="popup-container z-depth-3" data-id="' + listing.ListingId + '" data-lat="' + listing.Latitude + '" data-lon="' + listing.Longitude + '" data-state="' + listing.StateOrProvince +'"><a href="javascript: void(0)"><img src="' + image_src + '" height="100" class="popupImage"><br><div class="popup-data text-center">' + listing.FullStreetAddress + '<br>' + listing.City + ', ' + listing.StateOrProvince + ' ' + listing.PostalCode + '</a></div>';
                    var popup = L.popup({ offset: L.point(0, 10) }).setLatLng([listing.Latitude, listing.Longitude]).setContent(detailsPopUpContent);
                    // bind popup and tooltip with price
                    marker.bindPopup(popup).bindTooltip(shorten_price(listing.ListPrice), tooltipOptions);
                    marker.on('mouseover', function(e) {
                        this.openPopup();
                    });
                    // add key to communicate with listings results
                    marker.key = 'listing_' + listing.ListingId;
                    // Add marker to markers layer
                    marker_layer.addLayer(marker);
                }
            });
            map.addLayer(marker_layer);
            // Create boundary based on latLngs array
            var bounds = L.latLngBounds(latLngs);
            setTimeout(function() {
                map.fitBounds(bounds);
            }, 500);

            $('.map-loader').hide();
        }
    }

    function show_popup(id) {
        var markers = marker_layer._featureGroup._layers;
        for (var i in markers) {
            var markerID = markers[i].key;
            //console.log(markerID+' = '+id);
            if (markerID == id) {
                markers[i].openPopup();
            };
        }
    }

    $('.search-field').not('#search_coordinates').not('div.search-field').unbind('change').bind('change', function() {
        $('#start_from_datetime').val('');
        $('.search-field').each(function() {
            var id = $(this).data('id');
            var val = $(this).val();
            if ($(this).prop('id').match(/price/)) {
                val = val.replace(/,/g, '');
            } else if ($(this).is(':checkbox')) {
                val = '';
                if ($(this).is(':checked')) {
                    val = 'on';
                }
            }
            $('#' + id).val(val);
        });
        $('#coordinates, #search_coordinates').val('');
        setTimeout(function() {
            get_map_data();
            listings_data(1);
            create_url('no', '');
        }, 500);
    });


    /*
    var drawControl = new L.Control.Draw({
        draw: {
            polyline: false,
            polygon: {
                allowIntersection: true
            },
            circle: false,
            marker: false
        },
        edit: {
            featureGroup: drawnItems
        }
    });
    map.addControl(drawControl);
    */
    function create_url(goto, coords) {
        var url = '/search/listing_results?';
        $('.search-options-container').find('input[id^=search_], checkbox[id^=search_], select[id^=search_]').each(function() {
            if ($(this).prop('id') == 'search_coordinates' && coords == 'no') {
                var val = '';
            } else {
                var val = $(this).val();
            }
            if ($(this).prop('id').match(/price/)) {
                val = val.replace(/,/g, '');
            } else if ($(this).is(':checkbox')) {
                val = '';
                if ($(this).is(':checked')) {
                    val = 'on';
                }
            }
            if($(this).prop('id') != 'start_from_datetime' && $(this).prop('id') !=  'saved_search_id') {
                url = url + $(this).data('id') + '=' + val + '&';
            }
        });
        if (goto == 'no') {
            ChangeUrl('page', url);
        } else {
            window.location = url;
        }
    }

    function get_map_data() {
        $('.map-loader').show();
        remove_markers();
        var data = $('#search_form').serializeArray();
        var xhr = $.ajax({
            type: 'get',
            url: '{{ route('search.listing_results_map') }}',
            data: data,
            dataType: 'json',
            success: function(response) {
                /*
                map.on('draw:created', function (e) {
                    var type = e.layerType
                    var layer = e.layer;
                    drawnItems.addLayer(layer);
                    var geojson = layer.toGeoJSON();
                    var coords = geojson.geometry.coordinates[0];
                    var lats_longs = '';
                    $.each(coords, function(key, val) {
                        lats_longs = lats_longs+val[1]+' '+val[0]+',';
                    });
                    $('#coordinates, #search_coordinates').val(lats_longs.slice(0, -1));
                    setTimeout(function() {
                        get_map_data();
                        create_url('no', 'yes');
                    }, 500);
                });
                map.on('draw:edited', function (e) {
                    e.layers.eachLayer(function (layer) {
                        var geojson = layer.toGeoJSON();
                        var coords = geojson.geometry.coordinates[0];
                        var lats_longs = '';
                        $.each(coords, function(key, val) {
                            lats_longs = lats_longs+val[1]+' '+val[0]+',';
                        });
                        $('#coordinates, #search_coordinates').val(lats_longs.slice(0, -1));
                        listings_data(1);
                       // setTimeout(function() {
                            //get_map_data();
                            //create_url('no', 'yes');
                        //}, 200);
                    });
                });
                // remove old shape when new one is created
                map.on('draw:drawstart', function(e) {
                    if (drawnItems.getLayers().length === 1){
                        drawnItems.clearLayers();
                    };
                });
                // remove markers before new ones are added
                map.on('draw:drawstop', function() {
                    //remove_markers();
                });
                */
                map.on('zoomend', function() {
                    if ($('#map_initiated').val() == 'yes') {
                        //remove_markers();
                        //drawnItems.clearLayers();
                        var bounds = map.getBounds();
                        var coords = bounds._northEast.lat + ' ' + bounds._northEast.lng + '#' + bounds._northEast.lat + ' ' + bounds._southWest.lng + '#' + bounds._southWest.lat + ' ' + bounds._southWest.lng + '#' + bounds._southWest.lat + ' ' + bounds._northEast.lng + '#' + bounds._northEast.lat + ' ' + bounds._northEast.lng;
                        $('#coordinates, #search_coordinates').val(coords);
                        //$('#search_city, #city, #search_zip, #zip, #search_county, #county, #search_listing_id, #listing_id').val('');
                        listings_data(1);
                        /*
                        setTimeout(function() {
                            get_map_data();
                            create_url('no', 'yes');
                        }, 600);
                        */
                    } else {
                        $('#map_initiated').val('yes');
                    }
                });
                map.on('dragend', function() {
                    if ($('#map_initiated').val() == 'yes') {
                        //remove_markers();
                        //drawnItems.clearLayers();
                        var bounds = map.getBounds();
                        var coords = bounds._northEast.lat + ' ' + bounds._northEast.lng + '#' + bounds._northEast.lat + ' ' + bounds._southWest.lng + '#' + bounds._southWest.lat + ' ' + bounds._southWest.lng + '#' + bounds._southWest.lat + ' ' + bounds._northEast.lng + '#' + bounds._northEast.lat + ' ' + bounds._northEast.lng;
                        $('#coordinates, #search_coordinates').val(coords);
                        //$('#search_city, #city, #search_zip, #zip, #search_county, #county, #search_listing_id, #listing_id').val('');
                        listings_data(1);
                        /*
                        setTimeout(function() {
                            get_map_data();
                            create_url('no', 'yes');
                        }, 600);
                        */
                    } else {
                        $('#map_initiated').val('yes');
                    }
                });
                $(document).on('click', '.popup-container',
                    function() {
                        show_details($(this).data('id'), $(this).data('lat'), $(this).data('lon'), $(this).data('state'));
                    }
                );
                var listings = response.listings;
                if (listings.length > 0) {
                    var search_id = Date.now();
                    $('#search_id').val(search_id);
                    add_markers(listings, search_id);
                } else {
                    $('.map-loader').hide();
                }
            }
        });
    }

    let listings_controller;
    let listings_signal;
    function listings_data(page) {

        $('.listings-loader').show();

        if (listings_controller !== undefined) {
            listings_controller.abort();
        }
        if ('AbortController' in window) {
            listings_controller = new AbortController;
            listings_signal = listings_controller.signal;
        }


        var formdata = $('#search_form').serializeArray();
        formdata.push({
            name: 'page',
            value: page
        });
        formdata = JSON.stringify(form_to_json(formdata));

        //var sortby = $('#sortby').val();

        fetch('{{ route('search.listing_results_listings') }}', {
            method: "POST",
            signal: listings_signal,
            body: formdata,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).then(function(response) {
            return response.text()
        }).then(function(data) {
            if (data) {

                $('.listing-side-results').animate({ scrollTop: 0, opacity: 1 }, 100).html(data);
                // Pagination - convert to ajax call
                $('.page-link').off('click').on('click', function(e) {
                    $('.listing-side-results').animate({ scrollTop: 0 }, 500);
                    // Get page number for pagination and prevent opening link
                    var page = $(this).attr('href').split('page=')[1];
                    e.preventDefault();
                    // Get listng results data so we can include the map and markers data in the function
                    listings_data(page);
                });
                $('.listing-card').mouseenter(function() {
                    show_popup($(this).prop('id'));
                });
                $('.favorite').off('click').on('click', add_to_favorites);
                $('.remove-favorite').off('click').on('click', remove_favorite);
                $('.show-details').off('click').on('click', function(e) {
                    show_details($(this).data('id'), $(this).data('lat'), $(this).data('lon'), $(this).data('state'));
                });
                $('#saved_search_div').html('<a href="javascript: void(0)" class="btn-sm btn-primary" id="save_search">Save Search</a><div id="search_saved">Search <span id="search_alias" class="font-weight-bold text-primary"></span> has been saved!</div>');
                setTimeout(function() {
                    $('#save_search').click(save_search);
                }, 1000);
                $('.listings-loader').hide();

            }
        }, function(error) {
            //alert(error.message);
        });

    }

    function remove_listing_details_from_url() {
        var url = window.location.href.replace(/listing_id=[a-zA-Z0-9]+/, '').replace(/lat=[a-z0-9\.-]+/, '').replace(/lon=[a-z0-9\.-]+/, '').replace(/#/, '').replace(/[&]{2,}/, '&');
        ChangeUrl('page', url);
    }

    function show_details(listing_id, latitude, longitude, state) {

        var url = window.location.href.replace(/listing_id=[a-zA-Z0-9]+/, '');
        url = url.replace(/lat=[0-9\.-]+/, '');
        url = url.replace(/lon=[0-9\.-]+/, '');
        url = url.replace(/#/, '');
        url = url + '&listing_id=' + listing_id + '&lat=' + latitude + '&lon=' + longitude;
        //url = url.replace(/\.[a-zA-Z0-9]+\.email&/, '');
        url = url.replace(/[&]{2,}/, '&');
        ChangeUrl('page', url);
        get_details(listing_id, latitude, longitude, state);
    }

    function get_details(listing_id, latitude, longitude, state) {
        $('.details-div, .black-out').fadeIn();
        $.ajax({
            type: 'get',
            url: '{{ route('search.images') }}',
            data: {
                id: listing_id
            },
            dataType: 'html',
            success: function(response) {
                var r = $($.parseHTML(response));
                $('#listing_images_div').html(r.filter('#listing_images').html());
                lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true,
                    'positionFromTop': 5
                });
                var map_details = L.map('listing_map').setView([latitude, longitude], 13);
                var token = '{{ Config::get('leaflet.leaflet.token') }}';
                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + token, {
                    attribution: 'Map data &copy; <a href="javascript: void(0)" href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="javascript: void(0)" href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="javascript: void(0)" href="https://www.mapbox.com/">Mapbox</a>',
                    //maxZoom: 11,
                    id: 'mapbox.streets',
                    accessToken: token
                }).addTo(map_details);
                var listing_marker = L.marker([latitude, longitude]).addTo(map_details);

            }
        });
        $.ajax({
            type: 'get',
            url: '{{ route('search.images_mobile') }}',
            data: {
                id: listing_id
            },
            dataType: 'html',
            success: function(response) {
                var r = $($.parseHTML(response));
                $('#mobile_swiper').html(r.filter('#listing_images_mobile').html());
                lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true,
                    'positionFromTop': 10
                });
                var mySwiper = new Swiper('.swiper-container', {
                    loop: true,
                    grabCursor: true,
                    cubeEffect: {
                        shadow: true,
                        slideShadows: true,
                        shadowOffset: 20,
                        shadowScale: 0.94,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        dynamicBullets: true,
                    },
                });
            }
        });
        $.ajax({
            type: 'get',
            url: '{{ route('search.details') }}',
            data: {
                id: listing_id
            },
            dataType: 'html',
            success: function(response) {
                $('#listing_details_div').html(response);
                $('#show_more_remarks').unbind('click').bind('click', function() {
                    $('.full-remarks').removeClass('d-none');
                    $('.truncated-remarks').addClass('d-none');
                });
                $('#show_less_remarks').unbind('click').bind('click', function() {
                    $('.full-remarks').addClass('d-none');
                    $('.truncated-remarks').removeClass('d-none');
                });
                $('#close_listing_details, #close_listing_details2').unbind('click').bind('click',
                    function() {
                        $('.details-div, .black-out').fadeOut();
                        $('#listing_images_div, #listing_details_div').html('');
                        remove_listing_details_from_url();
                    });
                var map_school = L.map('school_map', {
                        scrollWheelZoom: false
                    }).setView([latitude, longitude], 14);
                map_school.on('click', function() {
                    map_school.scrollWheelZoom.enable();
                });
                var token = '{{ Config::get('leaflet.leaflet.token') }}';
                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + token, {
                    attribution: 'Map data &copy; <a href="javascript: void(0)" href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="javascript: void(0)" href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="javascript: void(0)" href="https://www.mapbox.com/">Mapbox</a>',
                    //maxZoom: 11,
                    id: 'mapbox.streets',
                    accessToken: token
                }).addTo(map_school);
                var school_center_marker = L.marker([latitude, longitude]).addTo(map_school);
                $.ajax({
                    type: 'get',
                    url: '{{ route('search.school_data') }}',
                    data: {
                        lat: latitude,
                        lon: longitude,
                        state: state
                    },
                    dataType: 'json',
                    success: function(data) {
                        var school_marker_layer = L.markerClusterGroup({
                            disableClusteringAtZoom: 11,
                            maxClusterRadius: 80
                        });
                        var publicOptions = {
                            color: '#074266',
                            opacity: '.8',
                            radius: 6
                        }
                        var privateOptions = {
                            color: '#b1493a',
                            opacity: '.8',
                            radius: 6
                        }
                        var charterOptions = {
                            color: '#f5b22d',
                            opacity: '.8',
                            radius: 6
                        }
                        $.each(data.schools, function(index, school) {
                            if (school.type == 'public') {
                                var school_marker = L.circleMarker([school.lat, school.lon], publicOptions).on('click', show_school_details);
                                var school_popup = L.popup({  offset: L.point(0, 10) });
                                var popup_class = 'popup-public';
                            } else if (school.type == 'private') {
                                var school_marker = L.circleMarker([school.lat, school.lon], privateOptions).on('click', show_school_details);
                                var school_popup = L.popup({ offset: L.point(0, 10) });
                                var popup_class = 'popup-private';
                            } else if (school.type == 'charter') {
                                var school_marker = L.circleMarker([school.lat, school.lon], charterOptions).on('click', show_school_details);
                                var school_popup = L.popup({ offset: L.point(0, 10) });
                                var popup_class = 'popup-charter';
                            }
                            var schoolPopUpContent = '<div id="school_popup_container" class="school-popup-container ' + popup_class + ' z-depth-3"><a href="javascript: void(0)" class="school-link"><strong>' + school.name + '</a></div>';

                            function show_school_details() {
                                var school_info = '<div class="school-info"><div class="school-info-name"><a href="' +school.overviewLink + '" target="_blank">' + school.name +'</a></div><div class="school-info-details">Type: ' +school.type.toUpperCase() + '<br>Enrollment: ' +school.enrollment + '<br>Grade Range: ' + school.gradeRange + '<br>Address: ' + school.address +'<br>Phone: ' + school.phone +'<br>Website: <a href="' + school.website +'" target="_blank">' + school.website +'</a><br><a href="' + school.ratingsLink +'" target="_blank">View Ratings Details</a><br><a href="' +school.reviewsLink +'" target="_blank">View School Reviews</a></div></div>';$('#school_info').fadeOut('fast').html('').fadeIn('slow').html(school_info);
                                var scroll_to = ($('#listing_details_div').scrollTop() +$('#school_map').position().top) - 200;
                                $('#listing_details_div').animate({scrollTop: scroll_to}, 'slow');
                            }
                            school_popup.setLatLng([school.lat, school.lon]).setContent(schoolPopUpContent);
                            // bind popup and tooltip with price
                            school_marker.bindPopup(school_popup);
                            school_marker_layer.addLayer(school_marker);
                        });
                        map_school.addLayer(school_marker_layer);
                    }
                });
                $('.favorite').off('click').on('click', add_to_favorites);
                $('.remove-favorite').off('click').on('click', remove_favorite);

                $('#schedule_showing').unbind('click').bind('click', function() {
                    $('#showing_request_listing_details').html($('#address').val());
                    $('#modalShowingRequest').modal();
                    get_user_data('showing');
                    $('#showing_request_form').off('submit').on('submit', function(e) {
                        e.preventDefault();
                        add_showing_request();
                    });
                });

                $('#info_request').unbind('click').bind('click', function() {
                    get_user_data('info');
                    $('#info_request_listing_details').html($('#address').val());
                    setTimeout(function() {
                        $('#info_request_comments').val('Hello,\nI am interested in the property located at ' + $('#address').val() + ' and would like more information.\nThank you').next('label').addClass('active');
                    }, 500);
                    $('#modalInfoRequest').modal();
                    $('#info_request_form').off('submit').on('submit', function(e) {
                        e.preventDefault();
                        info_request();
                    });
                });
            }
        });
    }

    function remove_markers() {
        marker_layer.clearLayers();
        map.removeLayer(marker_layer);
    }

    function init_map() {
        // initialize map container
        var token = '{{ Config::get('leaflet.leaflet.token') }}';
        var map_base = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + token, {
            attribution: 'Map data &copy; <a href="javascript: void(0)" href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="javascript: void(0)" href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="javascript: void(0)" href="https://www.mapbox.com/">Mapbox</a>',
            //maxZoom: 11,
            id: 'mapbox.streets',
            accessToken: token
        });
        map = L.map('results_map', { preferCanvas: true })
            //.setView([38.9072, -77.0369], 10)
            .addLayer(map_base);
        // add the tiles to the map
        map_base.addTo(map);
    }

    function set_input_values() {
        $('.search-options-container .btn').css({ 'text-transform': 'none' });
        var required_vals = [{
                'key': 'city',
                'val': 'Annapolis'
            },
            {
                'key': 'county',
                'val': ''
            },
            {
                'key': 'zip',
                'val': ''
            },
            {
                'key': 'coordinates',
                'val': ''
            },
            {
                'key': 'state',
                'val': 'MD'
            },
            {
                'key': 'for_sale',
                'val': 'on'
            },
            {
                'key': 'standard',
                'val': 'on'
            },
            {
                'key': 'new_construction',
                'val': 'on'
            },
            {
                'key': 'foreclosures',
                'val': 'on'
            },
            {
                'key': 'short_sales',
                'val': 'on'
            },
            {
                'key': 'auction',
                'val': 'on'
            },
            {
                'key': 'rentals',
                'val': 'on'
            },
            {
                'key': 'detached',
                'val': 'on'
            },
            {
                'key': 'apartments',
                'val': 'on'
            },
            {
                'key': 'condos',
                'val': 'on'
            },
            {
                'key': 'townhouse',
                'val': 'on'
            },
            {
                'key': 'land',
                'val': 'on'
            },
            {
                'key': 'farms',
                'val': 'on'
            },
            {
                'key': 'multifamily',
                'val': 'on'
            },
            {
                'key': 'duplex',
                'val': 'on'
            },
            {
                'key': 'min_price',
                'val': '0'
            },
            {
                'key': 'max_price',
                'val': ''
            },
            {
                'key': 'beds',
                'val': '0'
            },
            {
                'key': 'baths',
                'val': '0'
            },
            {
                'key': 'sq_ft_min',
                'val': ''
            },
            {
                'key': 'sq_ft_max',
                'val': ''
            },
            {
                'key': 'year_built_min',
                'val': ''
            },
            {
                'key': 'year_built_max',
                'val': ''
            },
            {
                'key': 'lot_size_min',
                'val': ''
            },
            {
                'key': 'lot_size_max',
                'val': ''
            },
            {
                'key': 'sortby',
                'val': 'MlsListDate'
            },
            {
                'key': 'sortby_order',
                'val': 'Desc'
            }
        ];
        var params = new URLSearchParams(window.location.search);
        params.forEach(function(val, key) {
            //remove from required
            required_vals = $.grep(required_vals, function(e) {
                return e.key != key;
            });
            // set search options
            if ($('#search_' + key).prop('type') == 'checkbox') {
                if (val == 'on') {
                    $('#search_' + key).prop('checked', true);
                }
            } else {
                if (key == 'min_price') {
                    if (val == '') {
                        val = '0';
                    }
                    $('#search_min_price').val(format_number(val));
                    set_price_option();
                } else if (key == 'max_price') {
                    if (val > 0) {
                        val = format_number(val);
                    }
                    $('#search_max_price').val(val);
                    set_price_option();
                } else if (key == 'beds') {
                    $('#search_beds').val(val);
                    $('#beds_dropdown').text(val + '+ Beds');
                } else if (key == 'baths') {
                    $('#search_baths').val(val);
                    $('#baths_dropdown').text(val + '+ Baths');
                } else {
                    $('#search_' + key).val(val);
                }
            }
            // set search inputs
            $('#' + key).val(val);
        });
        // Add any missed parameters with defaults
        if (required_vals.length > 0) {
            $.each(required_vals, function(k, v) {
                var key = v['key'];
                var val = v['val'];
                if ($('#search_' + key).prop('type') == 'checkbox') {
                    if (val == 'on') {
                        $('#search_' + key).prop('checked', true);
                    }
                } else {
                    if (key == 'min_price') {
                        if (val == '') {
                            val = '0';
                        }
                        $('#search_min_price').val(format_number(val));
                        set_price_option();
                    } else if (key == 'max_price') {
                        if (val > 0) {
                            val = format_number(val);
                        }
                        $('#search_max_price').val(val);
                        set_price_option();
                    } else if (key == 'beds') {
                        $('#search_beds').val(val);
                        $('#beds_dropdown').text(val + '+ Beds');
                    } else if (key == 'baths') {
                        $('#search_baths').val(val);
                        $('#baths_dropdown').text(val + '+ Baths');
                    } else {
                        $('#search_' + key).val(val);
                    }
                }
                // set search inputs
                $('#' + key).val(val);
            });
            setTimeout(function() {
                create_url('no', 'no');

            }, 200);
        }
    }

    let search_controller;
    let search_signal;
    function search_options() {
        // stop dropdown from closing when clicked inside
        $('.listing-type-dropdown-menu, .price-dropdown-menu, .other-dropdown-menu').click(function(e) {
            e.stopPropagation();
        });
        // add focus and show options
        $('#price_dropdown').unbind('click').bind('click', function() {
            setTimeout(function() {
                $('#search_min_price').focus();
            }, 500);
        });
        $('#search_min_price').focus(function() {
            $('#min_price_options').show();
            $('#max_price_options').hide();
        });
        $('#search_max_price').focus(function() {
            $('#max_price_options').show();
            $('#min_price_options').hide();
        });
        $('#search_min_price, #search_max_price').bind('keyup', function() {
            $(this).val(format_number($(this).val()));
            set_price_option();
        });
        $('#min_price_options .dropdown-item').unbind('click').bind('click', function() {
            $('#min_price_options .dropdown-item.active').removeClass('active');
            $('#search_min_price').val($(this).data('value'));
            $(this).addClass('active');
            set_price_option();
        });
        $('#max_price_options .dropdown-item').unbind('click').bind('click', function() {
            $('#max_price_options .dropdown-item.active').removeClass('active');
            $('#search_max_price').val($(this).data('value'));
            $(this).addClass('active');
            set_price_option();
        });
        $('.beds-ul .dropdown-item').unbind('click').bind('click', function() {
            $('#beds_dropdown').text($(this).text() + ' Beds');
            $('#search_beds').val($(this).data('value')).trigger('change');
        });
        $('.baths-ul .dropdown-item').unbind('click').bind('click', function() {
            $('#baths_dropdown').text($(this).text() + ' Baths');
            $('#search_baths').val($(this).data('value')).trigger('change');
        });
        $('#search_for_sale').unbind('click').bind('click', function() {
            if (!$(this).is(':checked')) {
                $('[data-type="forsale"]').prop('checked', false);
            } else {
                if ($('[data-type="forsale"]:checked').length == 0) {
                    $('#search_standard').prop('checked', true);
                }
            }
        });
        $('[data-type="forsale"]').click(function(e) {
            if ($('[data-type="forsale"]:checked').length == 0) {
                //e.preventDefault();
            }
        });
        // hide dropdowns that don't automatically close
        $('.close-dropdown').unbind('click').bind('click', function() {
            $(this).closest('.dropdown-menu').removeClass('show').closest('.dropdown').removeClass('show');
        });
        $('.sortby-ul .dropdown-item').unbind('click').bind('click', function() {
            $('#search_sortby_order').val($(this).data('order'));
            $('#search_sortby').val($(this).data('value')).trigger('change');
        });
        $("#results_location_search").off().on('keyup focus mousedown', function() {

            if (search_controller !== undefined) {
                search_controller.abort();
            }
            if ('AbortController' in window) {
                search_controller = new AbortController;
                search_signal = search_controller.signal;
            }
            var val = $(this).val();
            if (val != '') {
                fetch('{{ route('search.search_results') }}', {
                    method: "POST",
                    signal: search_signal,
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
                        $('.search-results-item').unbind('click').bind('click', function() {
                            var type = $(this).data('type');
                            var text = $(this).text().trim();
                            $('#search_city, #city').val($(this).data('city'));
                            $('#search_county, #county').val($(this).data('county'));
                            $('#search_zip, #zip').val($(this).data('zip'));
                            $('#search_state, #state').val($(this).data('state'));
                            $('#search_subdivision, #subdivision').val($(this).data('subdivision'));
                            //$('#search_coordinates, #coordinates').val($(this).data('coordinates'));
                            $('#search_listing_id, #listing_id').val($(this).data('listing_id'));
                            $('.search-results-div').hide();
                            $('#results_location_search').val(text);
                            if (type == 'listing_id') {
                                show_details($(this).data('listing_id'), $(this).data('lat'), $(this).data('lon'), $(this).data('state'));
                            } else {
                                $('#search_city, #city').trigger('change');
                            }
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
    }

    function set_price_option() {
        var min = $('#search_min_price').val();
        min = min.replace(/,/g, '');
        var max = $('#search_max_price').val();
        max = max.replace(/,/g, '');
        var from, to;
        if (min == 0 || min == '') {
            from = 'Up to';
        } else {
            if (min < 10000) {
                from = '$' + min + ' -';
            } else if (min >= 10000 && min < 100000) {
                from = '$' + min.substr(0, 2) + 'k -';
            } else if (min >= 100000 && min < 1000000) {
                from = '$' + min.substr(0, 3) + 'k -';
            } else if (min >= 1000000 && min < 10000000) {
                from = '$' + min.substr(0, 1);
                if (min.substr(1, 2) != '00') {
                    from = from + '.' + min.substr(1, 3) + 'M -';
                } else {
                    from = from + 'M';
                }
            } else {
                from = '$10M +';
            }
        }
        if (max == 0 || max == '' || max == 'NaN') {
            to = 'No Limit';
        } else {
            if (max < 10000) {
                to = '$' + max + '';
            } else if (max >= 10000 && max < 100000) {
                to = '$' + max.substr(0, 2) + 'k';
            } else if (max >= 100000 && max < 1000000) {
                to = '$' + max.substr(0, 3) + 'k';
            } else if (max >= 1000000 && max < 10000000) {
                to = '$' + max.substr(0, 1);
                if (max.substr(1, 2) != '00') {
                    to = to + '.' + max.substr(1, 3) + 'M';
                } else {
                    to = to + 'M';
                }
            } else {
                to = '$10M +';
            }
        }
        $('#price_dropdown').html(from + ' ' + to);
        $('#search_min_price').trigger('change');
    }

    function format_number(num) {
        num = num.replace(/,/g, '');
        num = parseFloat(num);
        return num.toLocaleString('en');
    }

    function ChangeUrl(page, url) {
        if (typeof(history.pushState) != "undefined") {
            var obj = {
                Page: page,
                Url: url
            };
            history.pushState(obj, obj.Page, obj.Url);
        } else {
            window.location.href = "/";
            // alert("Browser does not support HTML5.");
        }
    }

    function shorten_price(val) {
        val = val.replace(/,/g, '');
        if (val < 10000) {
            return '$' + Math.round(val) + '';
        } else if (val >= 10000 && val < 100000) {
            return '$' + val.substr(0, 2) + 'k';
        } else if (val >= 100000 && val < 1000000) {
            return '$' + val.substr(0, 3) + 'k';
        } else {
            var mils = '$' + val.substr(0, 1);
            if (val.substr(1, 2) != '00') {
                return mils + '.' + val.substr(1, 2) + 'M';
            } else {
                return mils + 'M';
            }
        }
    }



    function form_to_json(data){
        var jsonObj = {};
        $.map( data, function( n, i ) {
            jsonObj[n.name] = n.value;
        });

        return jsonObj;
    }
</script>
@endsection