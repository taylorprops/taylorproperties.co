@if(count($listings) > 0)
@if($search_name)
<div class="text-primary text-center mx-auto mt-1">Showing new listings from your search <strong>{{ $search_name }}</strong></div>
@endif
<div class="row pt-2 pagination-row mx-0">
    <div class="col-12 col-md-4 mt-2 p-0 d-none d-lg-block">
        <div class="primary-text text-center w-100 m-0 p-0 pagination-count">
            {{ $listings -> firstItem() }} to {{ $listings -> lastItem() }} of
            {{$listings -> total()}}
        </div>
    </div>
    <div class="col-12 col-md-8 p-0">
        <div class="text-center w-100 m-0 p-0">{{ $listings -> links() }}</div>
    </div>
</div>
<div class="row m-0 p-0">

    @foreach($listings as $listing)

    <div class="col-12 col-sm-6 col-lg-12 col-xl-6 mb-3 px-2">

        <div class="card collection-card z-depth-1-half animated fadeIn listing-card" id="listing_{{ $listing -> ListingId }}">

            <div class="view overlay">
                <img src="{{ $listing -> ListPictureURL != '' ? $listing -> ListPictureURL : '/images/search/no_photo.png' }}" class="img-fluid listing-side-image" alt="{{ $listing -> FullStreetAddress }}">

                <div class="stripe stripe-options favorite-div">
                    <?php
                        if(in_array($listing -> ListingId, $favorites)) {
                                $add_class = 'hidden';
                                $remove_class = '';
                            } else {
                                $add_class = '';
                                $remove_class = 'hidden';
                            }
                            ?>

                    <div class="float-left listing-dom">{{ dom($listing -> MLSListDate) }}</div>

                    <a class="btn-floating btn-sm btn-pink favorite float-right <?php echo $add_class; ?>" data-id="{{ $listing -> ListingId }}" href="javascript: void(0)"><i class="fas fa-heart fa-lg"></i></a>

                    <a class="btn-floating btn-sm btn-green remove-favorite float-right <?php echo $remove_class; ?>" data-id="{{ $listing -> ListingId }}" href="javascript: void(0)"><i class="fas fa-check fa-lg"></i></a>

                </div>
                <div class="stripe stripe-address light">
                    <a>

                        <div class="d-block">
                            <h5 class="font-weight-bold d-inline">
                                ${{ number_format($listing -> ListPrice, 0) }}</h5>
                            <p class="float-right d-inline">{{ $listing -> BedroomsTotal }} BR
                                {{ $listing -> BathroomsTotalInteger }} BA</p>
                        </div>
                        <p>{{ $listing -> FullStreetAddress }} {{ $listing -> City }},
                            {{ $listing -> StateOrProvince }} {{ $listing -> PostalCode }}
                        </p>

                    </a>
                </div>

                <div class="mask rgba-yellow-slight show-details" data-id="{{ $listing -> ListingId }}" data-lat="{{ $listing -> Latitude }}" data-lon="{{ $listing -> Longitude }}" data-state="{{ $listing -> StateOrProvince }}"></div>

            </div>

        </div>

    </div>



    @endforeach

</div>

<div class="row pt-2 pagination-row mx-0">
    <div class="col-12 col-md-4 mt-2 p-0">
        <div class="primary-text text-center w-100 m-0 p-0 pagination-count">
            {{ $listings -> firstItem() }} to {{ $listings -> lastItem() }} of
            {{$listings -> total()}}</div>
    </div>
    <div class="col-12 col-md-8 p-0">
        <div class="text-center w-100 m-0 p-0">{{ $listings -> links() }}</div>
    </div>
</div>
@else
<div class="no-listings-found w-75 mx-auto mt-5 p-5 border-primary display-4 text-primary">No Listings Found</div>
@endif