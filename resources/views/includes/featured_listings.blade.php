<div class="pt-5">
    <h2 class="text-center mb-4">Featured Listings</h1>

        <div id="featured-listings" class="container container-full mt-2">
            <div class="row">
                <div class="col-12">
                    <!--Carousel Wrapper-->
                    <div id="featured_props" class="carousel slide carousel-multi-item" data-ride="carousel" data-interval="false">
                        <!--Controls-->
                        <!--div class="controls-top">
                        <a class="btn-floating" href="#featured_props" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                        <a class="btn-floating" href="#featured_props" data-slide="next"><i class="fas fa-chevron-right"></i></a>
                    </div-->
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
                                <div class="row px-1">
                                    @foreach ($slider as $slide)
                                    <div class="col-md-6 col-lg-4 col-xl-2 mb-3 pb-5">

                                <div class="card">

                                    <!-- Card image -->
                                    <div class="view overlay">
                                        <img class="card-img-top" src="{{ str_replace('http:', 'https:', $slide -> ListPictureURL) }}" alt="{{ $slide -> FullStreetAddress }}" style="height: 200px; object-fit: cover;">
                                        <a href="/search/listing_results?listing_id={{$slide -> ListingId}}&lat={{$slide -> Latitude}}&lon={{$slide -> Longitude }}&state={{$slide -> StateOrProvince}}">
                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <!-- Card content -->
                                    <div class="card-body card-body-cascade">
                                        <!-- Title -->
                                        <p class="card-title text-center"><strong>{{ $slide -> FullStreetAddress }}<br>{{ $slide -> City }}, {{ $slide -> StateOrProvince }} {{ $slide -> PostalCode }}</strong></p>

                                    </div>

                                    <!-- Card footer -->
                                    <div class="rounded-bottom text-center pt-3 bg-primary white-text">
                                        <ul class="list-unstyled list-inline font-small">
                                            <li class="list-inline-item pr-2 white-text"><i class="far fa-dollar-sign pr-1"></i>{{ number_format($slide -> ListPrice, 0) }}</li>
                                            <li class="list-inline-item pr-2"><i class="far fa-bed pr-1"></i>{{ $slide -> BedroomsTotal }}</li>

                                            <li class="list-inline-item pr-2"><i class="far fa-toilet pr-1"> </i><?php echo $slide -> BathroomsTotalInteger ?></li>
                                            <li class="list-inline-item">{{ number_format($slide -> LivingArea) }}&nbsp;sqft.</li>
                                        </ul>
                                        <a href="/search/listing_results?listing_id={{$slide -> ListingId}}&lat={{$slide -> Latitude}}&lon={{$slide -> Longitude }}&state={{$slide -> StateOrProvince}}" class="btn btn-orange mx-auto">View Details</a>
                                    </div>

                                </div>
                                <!-- Card -->
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