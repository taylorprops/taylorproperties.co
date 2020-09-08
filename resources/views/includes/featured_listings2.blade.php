<!-- Featured Listings -->
<div class="container-full" style="margin: 3em auto;">
    <h3 class="display-5 text-center">Featured Listings</h3>
    <!--Carousel Wrapper-->
    <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2" data-ride="false">
        <!--Controls-->
        <!--div class="controls-top">
            <a class="btn-floating" href="#carousel-example-multi" data-slide="prev"><i
            class="fas fa-chevron-left"></i></a>
            <a class="btn-floating" href="#carousel-example-multi" data-slide="next"><i
            class="fas fa-chevron-right"></i></a>
        </div-->
        <!--/.Controls-->
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
            <?php
                $count = $featuredListings->count();
                $pages = $count;

                for ($i = 1; $i < $pages; $i++){
                    echo '<li data-target="#carousel-example-multi" data-slide-to="'.$i.'"></li>';
                }
            ?>
        </ol>
        <!--/.Indicators-->
        <div class="carousel-inner v-2" role="listbox">
            @foreach ($featuredListings as $listing)
            <div class="carousel-item">
                <div class="col-12 col-md-3">
                    <div class="card mb-2">
                        <img class="card-img-top" src="{{ str_replace('http:', 'https:', $listing -> ListPictureURL) }}" alt="{{ $listing->FullStreetAddress }}" style="height: 300px; object-fit: cover;">
                        <div class="card-body" style="margin: 0 auto;width: 100%;text-align: center;">
                            <h5 class="card-title font-weight-bold">${{ number_format($listing -> ListPrice, 0) }}</h5>
                            <?php
                            $BathroomsTotal = $listing->BathroomsFull + ($listing->BathroomsFull /2);
                            ?>
                            <div class="stats">
                                <p class="card-text">{{ $listing->BedroomsTotal }}&nbsp;Beds</p>
                            </div>
                            <div class="stats">
                                <p class="card-text"><?php echo $BathroomsTotal ?>&nbsp;Bath</p>
                            </div>
                            <div class="stats">
                                <p class="card-text">{{ $listing->LivingArea }} Sqft</p>
                            </div>
                            <p class="card-text small">{{ ucwords(strtolower($listing->FullStreetAddress)) }} {{ ucwords(strtolower($listing->City)) }}, {{ $listing->StateOrProvince }} {{ $listing->PostalCode }}</p>
                            <!--a class="btn btn-primary btn-md btn-rounded">Button</a-->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!--/.Carousel Wrapper-->
</div>
<!-- /Featured Listings -->

@section('js')
<script type="text/javascript" defer>
$('.carousel-item:first').addClass('active');
$('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
var next = $(this).next();
if (!next.length) {
next = $(this).siblings(':first');
}
next.children(':first-child').clone().appendTo($(this));
for (var i=0;i<4;i++) {
next=next.next();
if (!next.length) {
next=$(this).siblings(':first');
}
next.children(':first-child').clone().appendTo($(this));
}
});
</script>
@endsection