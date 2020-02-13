@extends('layouts.results')
@section('title', 'Tayor Properties')
@section('content')
<div class="search-page-container page-results">

    <div class="container-full-results m-0 p-0">

        <div class="row">
            <div class="col-12">

            <!--Navbar-->
                <nav class="navbar navbar-expand-lg navbar-light search-options-container clear-fix navbar-search">

                <!-- Collapse button -->
                <button class="navbar-toggler btn z-depth-0" type="button" data-toggle="collapse" data-target="#search_options_nav" aria-controls="search_options_nav" aria-expanded="false" aria-label="Toggle navigation">
                    Filter Results <i class="fas fa-caret-down fa-md ml-2"></i>
                </button>

                <!-- Collapsible content -->
                <div class="collapse navbar-collapse" id="search_options_nav">

                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">

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
                                                <label class="form-check-label font-weight-bold" for="search_for_sale">
                                                    Residential - For Sale
                                                </label>
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
                                <input type="hidden" class="search-field"  id="search_beds" data-id="beds">
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
                                <input type="hidden" class="search-field"  id="search_baths" data-id="baths">
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
                                            <select class="mdb-select md-form colorful-select dropdown-primary w-100 search-field" id="search_lot_size_min" data-id="lot_size_min">
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
                                            <select class="mdb-select md-form colorful-select dropdown-primary w-100 search-field" id="search_lot_size_max" data-id="lot_size_max">
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

                    <div class="mr-5">
                        <div class="dropdown sortby-dropdown">
                            <a href="javascript: void(0)" class="btn btn-primary-outline dropdown-toggle z-depth-0" href="#" role="button" id="sortby_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort By</a>
                            <div class="dropdown-menu sortby-dropdown-menu">

                                <ul class="list-group sortby-ul">
                                    <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="MlsListDate" data-order="DESC">Newest</button></li>
                                    <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="ListPrice" data-order="DESC">Price High to Low</button></li>
                                    <li class="list-group-item border-0"><button class="dropdown-item z-depth-0" type="button" data-value="ListPrice"  data-order="ASC">Price Low to High</button></li>
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

        <div class="row m-0">

            <div class="col-12 col-lg-7 p-0">

                <div class="map_container">

                    <div id="results_map"></div>

                </div>

            </div>

            <div class="col-12 col-lg-5 p-0 m-0">

                <div class="listing-side-results">


                </div>

            </div>

        </div>

    </div>

    <div class="details-div z-depth-5">

        <div class="row">
            <div class="col-md-7 image-gallery pr-0">
                <div class="container">

                    <div class="row" id="listing_images_div"> </div><!-- ./ .row -->

                </div>

            </div><!-- ./ .col-md-7 -->

            <div class="col-md-5 pl-0">

                <div class="row">
                        <button type="button" class="btn btn-danger" id="close_listing_details">
                            <i class="fal fa-times fa-2x"></i>
                        </button>
                    <div class="col-12">
                        <div id="listing_details_div">

                        </div><!-- ./ . id="listing_details_div" -->
                    </div><!-- ./ .col-12 -->
                </div><!-- ./ .row -->

            </div><!-- ./ .col-md-5 -->

        </div><!-- ./ .row -->

    </div> <!-- ./ .details-div -->

    <div class="black-out"></div><!-- ./ .black-out -->


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


</form>

<input type="hidden" id="search_id">
<input type="hidden" id="map_initiated" value="no">




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

    setTimeout(get_map_data, 300);

    var marker_layer = L.markerClusterGroup({ disableClusteringAtZoom: 15, maxClusterRadius: 40, chunkedLoading: true });

    //var drawnItems = L.featureGroup().addTo(map);

    var custom_icon = L.Icon.extend({
        options: {
            iconSize:     [20, 16],
            iconAnchor:   [10, 0],
            popupAnchor:  [0, -10]
        }
    });
    var forsale_icon = new custom_icon({iconUrl: '/images/search/forsale_icon.png'});
    var forrent_icon = new custom_icon({iconUrl: '/images/search/forrent_icon.png'});

    function add_markers(listings, search_id) {

        if($('#search_id').val() == search_id) {

            // Gather lats and longs for boundaries
            var latLngs = [];

            // Loop through listings
            listings.forEach(function(listing) {

                if($('#search_id').val() == search_id) {

                    // lat and long for boundaries
                    latLngs.push([listing.Latitude, listing.Longitude]);

                    // Popup options
                    var detailsPopupOptions = {
                        'className': 'map-popup'
                    }
                    // Tooltip Options
                    if(listing.PropertyType.match(/lease/i)) {
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
                    if(listing.PropertyType.match(/lease/i)) {
                        var marker = L.marker([listing.Latitude, listing.Longitude], { icon: forrent_icon });
                    } else {
                        var marker = L.marker([listing.Latitude, listing.Longitude], { icon: forsale_icon });
                    }

                    // Create popup


                    var detailsPopUpContent = '<div id="popup_container" class="popup-container z-depth-3" data-id="'+listing.ListingId+'" data-lat="'+listing.Latitude+'" data-lon="'+listing.Longitude+'"><a href="javascript: void(0)" href=""><a href="javascript: void(0)"><img src="'+listing.ListPictureURL+'" height="100" class="popupImage"><br><div class="popup-data text-center">'+listing.FullStreetAddress+'<br>'+listing.City+', '+listing.StateOrProvince+' '+listing.PostalCode+'</a></div>';

                    var popup = L.popup({ offset: L.point(0, 10) })
                        .setLatLng([listing.Latitude, listing.Longitude])
                        .setContent(detailsPopUpContent);

                    // bind popup and tooltip with price
                    marker.bindPopup(popup)
                        .bindTooltip(shorten_price(listing.ListPrice), tooltipOptions);

                    marker.on('mouseover', function (e) {
                        this.openPopup();
                    });

                    // add key to communicate with listings results
                    marker.key = 'listing_'+listing.ListingId;

                    // Add marker to markers layer
                    marker_layer.addLayer(marker);

                }

            });

            map.addLayer(marker_layer);

            // Create boundary based on latLngs array
            var bounds = L.latLngBounds(latLngs);
            map.fitBounds(bounds);

        }

    }

    function show_popup(id){
        var markers = marker_layer._featureGroup._layers;
        for (var i in markers){
            var markerID = markers[i].key;
            //console.log(markerID+' = '+id);
            if (markerID == id){
                markers[i].openPopup();
            };
        }
    }

    $('.search-field').not('#search_coordinates').not('div.search-field').unbind('change').bind('change', function() {
        $('.search-field').each(function() {
            var id = $(this).data('id');
            var val = $(this).val();
            if($(this).prop('id').match(/price/)) {
                val = val.replace(/,/g, '');
            } else if($(this).is(':checkbox')) {
                val = '';
                if($(this).is(':checked')) {
                    val = 'on';
                }
            }
            $('#'+id).val(val);
        });

        $('#coordinates, #search_coordinates').val('');

        setTimeout(function() {
            get_map_data();
            create_url('no', 'no');
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
            if($(this).prop('id') == 'search_coordinates' && coords == 'no') {
                var val = '';
            } else {
                var val = $(this).val();
            }
            if($(this).prop('id').match(/price/)) {
                val = val.replace(/,/g, '');
            } else if($(this).is(':checkbox')) {
                val = '';
                if($(this).is(':checked')) {
                    val = 'on';
                }
            }
            url = url+$(this).data('id')+'='+val+'&';
        });
        if(goto == 'no') {
            ChangeUrl('page', url);
        } else {
            window.location = url;
        }
    }

    function get_map_data() {
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

                map.off('zoomend').on('zoomend', function() {
                    if($('#map_initiated').val() == 'yes') {
                        //remove_markers();
                        //drawnItems.clearLayers();
                        var bounds = map.getBounds();
                        var coords =
                        bounds._northEast.lat+' '+bounds._northEast.lng+'#'+bounds._northEast.lat+' '+bounds._southWest.lng+'#'+bounds._southWest.lat+' '+bounds._southWest.lng+'#'+bounds._southWest.lat+' '+bounds._northEast.lng+'#'+bounds._northEast.lat+' '+bounds._northEast.lng;

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

                map.off('dragend').on('dragend', function() {
                    if($('#map_initiated').val() == 'yes') {
                        //remove_markers();
                        //drawnItems.clearLayers();
                        var bounds = map.getBounds();
                        var coords =
                        bounds._northEast.lat+' '+bounds._northEast.lng+'#'+bounds._northEast.lat+' '+bounds._southWest.lng+'#'+bounds._southWest.lat+' '+bounds._southWest.lng+'#'+bounds._southWest.lat+' '+bounds._northEast.lng+'#'+bounds._northEast.lat+' '+bounds._northEast.lng;

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

                $(document).off('click').on('click', '.popup-container',
                    function() {
                        var id = $(this).data('id');
                        var longitude = $(this).data('lon');
                        var latitude = $(this).data('lat');
                        var url = window.location.href .replace(/id=[a-zA-Z0-9]+&/, '');
                        url = url.replace(/#/, '');
                        url = url+'&id='+id;
                        url = url.replace(/&&/, '&');
                        ChangeUrl('page', url);
                        get_details(id, latitude, longitude);
                    }
                );


                var listings = response.listings;
                if(listings.length > 0) {
                    var search_id = Date.now();
                    $('#search_id').val(search_id);
                    add_markers(listings, search_id);
                    listings_data(1);
                }


            }
        });

    }

    function listings_data(page) {

        var data = $('#search_form').serializeArray();
        var sortby = $('#sortby').val();
        data.push({
            name: 'page',
            value: page
        });
        $.ajax({
            type: 'get',
            url: '{{ route('search.listing_results_listings') }}',
            data: data,
            success: function(response) {
                $('.listing-side-results').animate({
                    scrollTop : 0,
                    opacity: 1
                }, 100)
                .html(response);

                // Pagination - convert to ajax call
                $('.page-link').off('click').on('click', function (e) {

                    $('.listing-side-results').animate({
                        scrollTop : 0,
                        opacity: 0
                    }, 500);
                    // Get page number for pagination and prevent opening link
                    var page = $(this).attr('href').split('results=')[1];
                    e.preventDefault();
                    // Get listng results data so we can include the map and markers data in the function
                    listings_data(page);

                });
                $('.listing-card').mouseenter(function() {
                    show_popup($(this).prop('id'));
                }).off('click').on('click', function() {
                    var id = $(this).data('id');
                    var longitude = $(this).data('lon');
                    var latitude = $(this).data('lat');
                    var url = window.location.href .replace(/id=[a-zA-Z0-9]+&/, '');
                    url = url.replace(/#/, '');
                    url = url+'&id='+id;
                    url = url.replace(/&&/, '&');
                    ChangeUrl('page', url);
                    get_details(id, latitude, longitude);


                });
            }
        });
    }

    function get_details(id, latitude, longitude) {
        $('.details-div, .black-out').fadeIn();
        $('#close_listing_details').click(function() {
            $('.details-div, .black-out').fadeOut();
            $('#listing_images_div, #listing_details_div').html('');
        });
        $.ajax({
            type: 'get',
            url: '{{ route('search.images') }}',
            data: { id: id },
            dataType: 'html',
            success: function(response) {
                var r = $($.parseHTML(response));
                $('#listing_images_div').html(r.filter('#listing_images').html());
                lightbox.option({
                    'resizeDuration': 200,
                    'wrapAround': true,
                    'positionFromTop': 5
                });


                var map_details = L.map('listing_map')
                    .setView([latitude, longitude], 13);

                var token = '{{ Config::get('leaflet.leaflet.token') }}';
                L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + token, {
                    attribution: 'Map data &copy; <a href="javascript: void(0)" href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="javascript: void(0)" href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="javascript: void(0)" href="https://www.mapbox.com/">Mapbox</a>',
                    //maxZoom: 11,
                    id: 'mapbox.streets',
                    accessToken: token
                }).addTo(map_details);


                var marker = L.marker([latitude, longitude]).addTo(map_details);

                //////////////// Street view //////////////////////
                L.StreetView = L.Control.extend({
                options: {
                    google: true,
                    bing: false,
                    yandex: false,
                    mapillary: false,
                    mapillaryId: false,
                    openstreetcam: false,
                    mosatlas: false
                },

                providers: [
                    ['google', 'Street View', 'Google Street View', false,
                    'https://www.google.com/maps?layer=c&cbll={lat},{lon}'],
                    ['bing', 'Bing', 'Bing StreetSide',
                    L.latLngBounds([[25, -168], [71.4, 8.8]]),
                    'https://www.bing.com/maps?cp={lat}~{lon}&lvl=19&style=x&v=2'],
                    ['yandex', 'ЯП', 'Yandex Panoramas',
                    L.latLngBounds([[35.6, 18.5], [72, 180]]),
                    'https://yandex.ru/maps/?panorama%5Bpoint%5D={lon},{lat}'],
                    ['mapillary', 'Mplr', 'Mapillary Photos', false,
                    'https://a.mapillary.com/v3/images?client_id={id}&closeto={lon},{lat}&lookat={lon},{lat}'],
                    ['openstreetcam', 'OSC', 'OpenStreetCam', false,
                    'lat={lat}&lng={lon}&distance=50'],
                    ['mosatlas', 'Мос', 'Панорамы из Атласа Москвы',
                    L.latLngBounds([[55.113, 36.708], [56.041, 38]]),
                    'http://atlas.mos.ru/?lang=ru&z=9&ll={lon}%2C{lat}&pp={lon}%2C{lat}'],
                ],

                onAdd: function(map) {
                    this._container = L.DomUtil.create('div', 'leaflet-bar');
                    this._buttons = [];

                    for (var i = 0; i < this.providers.length; i++)
                    this._addProvider(this.providers[i]);

                    map.on('moveend', function() {
                    if (!this._fixed)
                        this._update(map.getCenter());
                    }, this);
                    this._update(map.getCenter());
                    return this._container;
                },

                fixCoord: function(latlon) {
                    this._update(latlon);
                    this._fixed = true;
                },

                releaseCoord: function() {
                    this._fixed = false;
                    this._update(this._map.getCenter());
                },

                _addProvider: function(provider) {
                    if (!this.options[provider[0]])
                    return;
                    if (provider[0] == 'mapillary' && !this.options.mapillaryId)
                    return;
                    var button = L.DomUtil.create('a');
                    button.innerHTML = provider[1];
                    button.title = provider[2];
                    button._bounds = provider[3];
                    button._template = provider[4];
                    button.href = '#';
                    button.target = 'streetview';
                    button.style.padding = '0 8px';
                    button.style.width = 'auto';

                    // Some buttons require complex logic
                    if (provider[0] == 'mapillary') {
                    button._needUrl = false;
                    L.DomEvent.on(button, 'click', function(e) {
                        if (button._href) {
                        this._ajaxRequest(
                            button._href.replace(/{id}/, this.options.mapillaryId),
                            function(data) {
                            if (data && data.features && data.features[0].properties) {
                                var photoKey = data.features[0].properties.key,
                                    url = 'https://www.mapillary.com/map/im/{key}'.replace(/{key}/, photoKey);
                                window.open(url, button.target);
                            }
                            }
                        );
                        }
                        return L.DomEvent.preventDefault(e);
                    }, this);
                    } else if (provider[0] == 'openstreetcam') {
                    button._needUrl = false;
                    L.DomEvent.on(button, 'click', function(e) {
                        if (button._href) {
                        this._ajaxRequest(
                            'http://openstreetcam.org/nearby-tracks',
                            function(data) {
                            if (data && data.osv && data.osv.sequences) {
                                var seq = data.osv.sequences[0],
                                    url = 'https://www.openstreetcam.org/details/'+seq.sequence_id+'/'+seq.sequence_index;
                                window.open(url, button.target);
                            }
                            },
                            button._href
                        );
                        }
                        return L.DomEvent.preventDefault(e);
                    }, this);
                    } else
                    button._needUrl = true;

                    // Overriding some of the leaflet styles
                    button.style.display = 'inline-block';
                    button.style.border = 'none';
                    button.style.borderRadius = '0 0 0 0';
                    this._buttons.push(button);
                },

                _update: function(center) {
                    if (!center)
                    return;
                    var last;
                    for (var i = 0; i < this._buttons.length; i++) {
                    var b = this._buttons[i],
                        show = !b._bounds || b._bounds.contains(center),
                        vis = this._container.contains(b);

                    if (show && !vis) {
                        ref = last ? last.nextSibling : this._container.firstChild;
                        this._container.insertBefore(b, ref);
                    } else if (!show && vis) {
                        this._container.removeChild(b);
                        return;
                    }
                    last = b;

                    var tmpl = b._template;
                    tmpl = tmpl
                        .replace(/{lon}/g, L.Util.formatNum(center.lng, 6))
                        .replace(/{lat}/g, L.Util.formatNum(center.lat, 6));
                    if (b._needUrl)
                        b.href = tmpl;
                    else
                        b._href = tmpl;
                    }
                },

                _ajaxRequest: function(url, callback, post_data) {
                    if (window.XMLHttpRequest === undefined)
                    return;
                    var req = new XMLHttpRequest();
                    req.open(post_data ? 'POST' : "GET", url);
                    if (post_data)
                    req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    req.onreadystatechange = function() {
                    if (req.readyState === 4 && req.status == 200) {
                        var data = (JSON.parse(req.responseText));
                        callback(data);
                    }
                    };
                    req.send(post_data);
                }
                });

                L.streetView = function(options) {
                return new L.StreetView(options);
                }
                L.streetView().addTo(map_details);
                //////////////// Street view //////////////////////
            }
        });

        $.ajax({
            type: 'get',
            url: '{{ route('search.details') }}',
            data: { id: id },
            dataType: 'html',
            success: function(response) {
                $('#listing_details_div').html(response);
                $('#show_more_remarks').click(function() {
                    $('.full-remarks').removeClass('d-none');
                    $('.truncated-remarks').addClass('d-none');
                });
                $('#show_less_remarks').click(function() {
                    $('.full-remarks').addClass('d-none');
                    $('.truncated-remarks').removeClass('d-none');
                });
            }
        });
    }


    function remove_markers() {
        marker_layer.clearLayers();
        map.removeLayer(marker_layer);
    }

    function init_map(){
        // initialize map container
        var token = '{{ Config::get('leaflet.leaflet.token') }}';
        var map_base = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + token, {
            attribution: 'Map data &copy; <a href="javascript: void(0)" href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="javascript: void(0)" href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="javascript: void(0)" href="https://www.mapbox.com/">Mapbox</a>',
            //maxZoom: 11,
            id: 'mapbox.streets',
            accessToken: token
        });

        map = L.map('results_map')
            //.setView([38.9072, -77.0369], 10)
            .addLayer(map_base);

        // add the tiles to the map
        map_base.addTo(map);

    }

    function set_input_values() {
        $('.search-options-container .btn').css({ 'text-transform': 'none' });
        var required_vals = [
            {'key': 'city', 'val': 'Annapolis'},
            {'key': 'county', 'val': ''},
            {'key': 'zip', 'val': ''},
            {'key': 'coordinates', 'val': ''},
            {'key': 'state', 'val': 'MD'},
            {'key': 'for_sale', 'val': 'on'},
            {'key': 'standard', 'val': 'on'},
            {'key': 'new_construction', 'val': 'on'},
            {'key': 'foreclosures', 'val': 'on'},
            {'key': 'short_sales', 'val': 'on'},
            {'key': 'auction', 'val': 'on'},
            {'key': 'rentals', 'val': 'on'},
            {'key': 'detached', 'val': 'on'},
            {'key': 'apartments', 'val': 'on'},
            {'key': 'condos', 'val': 'on'},
            {'key': 'townhouse', 'val': 'on'},
            {'key': 'land', 'val': 'on'},
            {'key': 'farms', 'val': 'on'},
            {'key': 'multifamily', 'val': 'on'},
            {'key': 'duplex', 'val': 'on'},
            {'key': 'min_price', 'val': '0'},
            {'key': 'max_price', 'val': ''},
            {'key': 'beds', 'val': '0'},
            {'key': 'baths', 'val': '0'},
            {'key': 'sq_ft_min', 'val': ''},
            {'key': 'sq_ft_max', 'val': ''},
            {'key': 'year_built_min', 'val': ''},
            {'key': 'year_built_max', 'val': ''},
            {'key': 'lot_size_min', 'val': ''},
            {'key': 'lot_size_max', 'val': ''},
            {'key': 'sortby', 'val': 'MlsListDate'},
            {'key': 'sortby_order', 'val': 'Desc'}
        ];
        var params = new URLSearchParams(window.location.search);
        params.forEach(function(val, key) {

            //remove from required
            required_vals = $.grep(required_vals, function(e){
               return e.key != key;
            });

            // set search options
            if($('#search_'+key).prop('type') == 'checkbox') {
                if(val == 'on') {
                    $('#search_'+key).prop('checked', true);
                }
            } else {
                if(key == 'min_price') {
                    if(val == '') {
                        val = '0';
                    }
                    $('#search_min_price').val(format_number(val));
                    set_price_option();
                } else if(key == 'max_price') {
                    if(val > 0) {
                        val = format_number(val);
                    }
                    $('#search_max_price').val(val);
                    set_price_option();
                } else if(key == 'beds') {
                    $('#search_beds').val(val);
                    $('#beds_dropdown').text(val+'+ Beds');
                } else if(key == 'baths') {
                    $('#search_baths').val(val);
                    $('#baths_dropdown').text(val+'+ Baths');
                } else {
                    $('#search_'+key).val(val);
                }

            }

            // set search inputs
            $('#'+key).val(val);

        });



        // Add any missed parameters with defaults
        if(required_vals.length > 0) {

            $.each(required_vals, function(k,v) {
                var key = v['key'];
                var val = v['val'];

                if($('#search_'+key).prop('type') == 'checkbox') {
                    if(val == 'on') {
                        $('#search_'+key).prop('checked', true);
                    }
                } else {
                    if(key == 'min_price') {
                        if(val == '') {
                            val = '0';
                        }
                        $('#search_min_price').val(format_number(val));
                        set_price_option();
                    } else if(key == 'max_price') {
                        if(val > 0) {
                            val = format_number(val);
                        }
                        $('#search_max_price').val(val);
                        set_price_option();
                    } else if(key == 'beds') {
                        $('#search_beds').val(val);
                        $('#beds_dropdown').text(val+'+ Beds');
                    } else if(key == 'baths') {
                        $('#search_baths').val(val);
                        $('#baths_dropdown').text(val+'+ Baths');
                    } else {
                        $('#search_'+key).val(val);
                    }
                }

                // set search inputs
                $('#'+key).val(val);

            });

            setTimeout(function() {
                create_url('yes', 'no');
            }, 200);
        }


    }

    function search_options() {

        // stop dropdown from closing when clicked inside
        $('.listing-type-dropdown-menu, .price-dropdown-menu, .other-dropdown-menu').click(function(e) {
            e.stopPropagation();
        });
        // add focus and show options
        $('#price_dropdown').click(function() {
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

        $('#min_price_options .dropdown-item').click(function() {
            $('#min_price_options .dropdown-item.active').removeClass('active');
            $('#search_min_price').val($(this).data('value'));
            $(this).addClass('active');
            set_price_option();
        });
        $('#max_price_options .dropdown-item').click(function() {
            $('#max_price_options .dropdown-item.active').removeClass('active');
            $('#search_max_price').val($(this).data('value'));
            $(this).addClass('active');
            set_price_option();
        });
        $('.beds-ul .dropdown-item').click(function() {
            $('#beds_dropdown').text($(this).text()+' Beds');
            $('#search_beds').val($(this).data('value')).trigger('change');
        });
        $('.baths-ul .dropdown-item').click(function() {
            $('#baths_dropdown').text($(this).text()+' Baths');
            $('#search_baths').val($(this).data('value')).trigger('change');
        });
        $('#search_for_sale').click(function() {
            if(!$(this).is(':checked')) {
                $('[data-type="forsale"]').prop('checked', false);
            } else {
                if($('[data-type="forsale"]:checked').length == 0) {
                    $('#search_standard').prop('checked', true);
                }
            }
        });

        $('[data-type="forsale"]').click(function(e) {
            if($('[data-type="forsale"]:checked').length == 0) {
                //e.preventDefault();
            }
        });
        // hide dropdowns that don't automatically close
        $('.close-dropdown').click(function() {
            $(this).closest('.dropdown-menu').removeClass('show').closest('.dropdown').removeClass('show');
        });

        $('.sortby-ul .dropdown-item').click(function() {
            $('#search_sortby_order').val($(this).data('order'));
            $('#search_sortby').val($(this).data('value')).trigger('change');
        });

        $("#results_location_search").off().on('keyup focus mousedown', function() {

            var val = $(this).val();
            if(val != '') {

                const abortableFetch = ('signal' in new Request('')) ? window.fetch : fetch;
                const controller = new AbortController();

                fetch('{{ route('search.search_results') }}', {
                    method: "POST",
                    signal: controller.signal,
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
                    if(data) {
                        $('.search-results-div').fadeIn().html(data);
                        $('.search-results-item').click(function() {
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
                            $('#search_city, #city').trigger('change');

                            $(document).mouseup(function(e) {
                                var container = $('.search-results-div');
                                if (!container.is(e.target) && container.has(e.target).length === 0) {
                                    container.hide();
                                }
                            });

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
        if(min == 0 || min == '') {
            from = 'Up to';
        } else {
            if(min < 10000) {
                from = '$'+min+' -';
            } else if(min >= 10000 && min < 100000) {
                from = '$'+min.substr(0,2)+'k -';
            } else if(min >= 100000 && min < 1000000) {
                from = '$'+min.substr(0,3)+'k -';
            } else if(min >= 1000000 && min < 10000000) {
                from = '$'+min.substr(0,1);
                if(min.substr(1,2) != '00') {
                    from = from+'.'+min.substr(1,3)+'M -';
                } else {
                    from = from+'M';
                }
            } else {
                from = '$10M +';
            }
        }
        if(max == 0 || max == '' || max == 'NaN') {
            to = 'No Limit';
        } else {
            if(max < 10000) {
                to = '$'+max+'';
            } else if(max >= 10000 && max < 100000) {
                to = '$'+max.substr(0,2)+'k';
            } else if(max >= 100000 && max < 1000000) {
                to = '$'+max.substr(0,3)+'k';
            } else if(max >= 1000000 && max < 10000000) {
                to = '$'+max.substr(0,1);
                if(max.substr(1,2) != '00') {
                    to = to+'.'+max.substr(1,3)+'M';
                } else {
                    to = to+'M';
                }
            } else {
                to = '$10M +';
            }
        }
        $('#price_dropdown').html(from+' '+to);
        $('#search_min_price').trigger('change');
    }

    function format_number(num) {
        num = num.replace(/,/g, '');
        num = parseFloat(num);
        return num.toLocaleString('en');
    }

    function ChangeUrl(page, url) {
        if (typeof (history.pushState) != "undefined") {
            var obj = {Page: page, Url: url};
            history.pushState(obj, obj.Page, obj.Url);
        } else {
            window.location.href = "/";
            // alert("Browser does not support HTML5.");
        }
    }

    function shorten_price(val) {
        val = val.replace(/,/g, '');
        if(val < 10000) {
            return '$'+Math.round(val)+'';
        } else if(val >= 10000 && val < 100000) {
            return '$'+val.substr(0,2)+'k';
        } else if(val >= 100000 && val < 1000000) {
            return '$'+val.substr(0,3)+'k';
        } else {
            var mils = '$'+val.substr(0,1);
            if(val.substr(1,2) != '00') {
                return mils+'.'+val.substr(1,2)+'M';
            } else {
                return mils+'M';
            }
        }

    }


</script>

@endsection
