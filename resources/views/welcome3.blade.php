@extends('layouts.app')
@section('title', 'Tayor Properties')
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
                                        <p class="card-text">See why so many agents are leaving tradional Brokers and joining Taylor Properties</p>
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

    <hr class="curly-end">

    <h1 class="display-3 text-center">Featured Listings</h1>

    <div class="container container-full mt-2">

        <div class="row">

            <div class="col-12">

                <!--Carousel Wrapper-->
                <div id="featured_props" class="carousel slide carousel-multi-item" data-ride="carousel">

                    <!--Controls-->
                    <div class="controls-top">
                        <a class="btn-floating" href="#featured_props" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                        <a class="btn-floating" href="#featured_props" data-slide="next"><i
                        class="fas fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->

                    <!--Indicators-->
                    <?php $c = 0; ?>
                        <ol class="carousel-indicators">
                            @foreach ($sliders as $slider)
                                <?php
                                $active = '';
                                if($c < 1) {
                                    $active = 'active';
                                }
                                ?>
                                <li data-target="#featured_props" data-slide-to="<?php echo $c; ?>" class="<?php echo $active; ?>"></li>
                                <?php $c += 1; ?>
                            @endforeach
                        </ol>
                        <!--/.Indicators-->

                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">

                            <?php $c = 0; ?>
                                @foreach ($sliders as $slider)
                                <?php
                            $active = '';
                            if($c < 1) {
                                $active = 'active';
                            }
                            $c += 1;
                            ?>

                                    <div class="carousel-item <?php echo $active; ?>">

                                        <div class="row">
                                            @foreach ($slider as $slide)

                                            <div class="col-md-6 col-lg-4 col-xl-2 mb-3 pb-5">

                                                <div class="card card-cascade narrower card-grid-container">

                                                    <!-- Card image -->
                                                    <div class="view view-cascade overlay align-self-stretch">
                                                        <img class="card-img-top img-fluid" src="{{ str_replace('http:', 'https:', $slide -> ListPictureURL) }}" alt="{{ $slide -> FullStreetAddress }}" alt="{{ $slide -> FullStreetAddress }}">
                                                        <a href="#!">
                                                            <div class="mask rgba-white-slight"></div>
                                                        </a>
                                                    </div>

                                                    <!-- Card content -->
                                                    <div class="card-body card-body-cascade">

                                                        <!-- Title -->
                                                        <p class="card-title text-center"><strong>{{ $slide -> FullStreetAddress }}<br>{{ $slide -> City }}, {{ $slide -> StateOrProvince }} {{ $slide -> PostalCode }}</strong></p>
                                                        <!-- Text -->
                                                        <p class="card-text">{{ $slide -> PublicRemarks }}</p>

                                                    </div>

                                                    <div class="card-footer rounded-bottom mdb-color lighten-3 text-center pt-3">
                                                        <ul class="list-unstyled list-inline font-small mb-0">
                                                            <li class="list-inline-item pr-2 white-text">
                                                                <h5 class="pb-2 text-center"><strong>${{ number_format($slide -> ListPrice, 0) }}</strong></h5>
                                                            </li>
                                                            <li class="list-inline-item pr-2"><a href="#" class="btn btn-primary"><i class="fal fa-home-lg mr-3"></i> View Details</a></li>
                                                        </ul>
                                                    </div>

                                                </div>

                                            </div>

                                            @endforeach
                                        </div>

                                    </div>

                                    @endforeach

                        </div>
                        <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->

            </div>

        </div>

    </div>

</div>

@endsection

@section('js')
<script>
    image_resize();

    function image_resize() {
        $('.carousel-item').each(function() {
            var max = 0;
            if($(this).find('.card-img-top').height() > 0) {
                $(this).find('.card-img-top').each(function() {
                    if($(this).height() > max) {
                        max = $(this).height();
                    }
                });
                $(this).find('.card-img-top').height(max);
            } else {
                setTimeout(image_resize, 1000);
            }
        });
    }
</script>
@endsection

