<div class="bg-primary p-2 pl-4 white-text details-header mb-0 container-full">

    <div class="row">
        <div class="col-8">
            {{ $listings -> FullStreetAddress }}<br>
            {{ $listings -> City }}, {{ $listings -> StateOrProvince }}
            {{ $listings -> PostalCode }}
        </div>
        <div class="col-4">
            <div class="d-flex justify-content-around" id="details_options">

                <a class="my-auto share-link-listing" href="javascript: void(0)" data-type="listing" data-heading="Share Listing" data-address="{{ $listings -> FullStreetAddress }} {{ $listings -> City }}, {{ $listings -> StateOrProvince }} {{ $listings -> PostalCode }}" data-image="{{ $listings -> ListPictureURL }}" data-price="{{ $listings -> ListPrice }}" data-beds="{{ $listings -> BedroomsTotal.' BR |'.$listings -> BathroomsTotalInteger.' BA' }}">
                    <i class="far fa-share fa-lg text-white"></i>
                </a>

                <?php
                    if(in_array($listings -> ListingId, $favorites)) {
                        $add_class = 'hidden';
                        $remove_class = '';
                    } else {
                        $add_class = '';
                        $remove_class = 'hidden';
                    }
                    ?>
                <a class="favorite btn-sm my-auto mr-3 <?php echo $add_class; ?>" data-id="{{ $listings -> ListingId }}" href="javascript: void(0)">
                    <i class="fas fa-heart fa-2x pink-text"></i>
                </a>

                <a class="remove-favorite btn-floating btn-green my-auto mr-3 <?php echo $remove_class; ?>" data-id="{{ $listings -> ListingId }}" href="javascript: void(0)">
                    <i class="fas fa-check fa-lg"></i>
                </a>

                <a href="javascript: void(0)" id="close_listing_details2" class="d-none d-sm-block">
                    <i class="far fa-times fa-3x text-white"></i>
                </a>

            </div>
        </div>

    </div>

</div>

<div class="details-section-container">

    <div class="details-section pl-4">
        <div class="property-type d-inline">{{ $listings -> PropertyType }}</div>
        <div class="sale-type d-inline">
            @if(!stristr($listings -> PropertyType, 'lease'))
            | {{ sale_type($listings -> SaleType) }}
            @endif
        </div>
    </div>
    <div class="details-section pl-4">
        <span
            class="details-price font-weight-bold h3 text-primary">${{ number_format($listings -> ListPrice, 0) }}</span>
        <span class="details-beds ml-3">{{ $listings -> BedroomsTotal }} <span class="text-black-50">bd</span> |
            {{ $listings -> BathroomsTotalInteger }} <span class="text-black-50">ba</span> |
            {{ $listings -> LivingArea }}
            <span class="text-black-50">sqft</span></span>
    </div>

    <div class="details-section px-4 pt-1">

        <div class="truncated-remarks">
            {!! Str::limit($listings -> PublicRemarks, 500, '<a href="javascript: void(0)" id="show_more_remarks">...Read More</a>') !!}
        </div>

        <div class="full-remarks d-none">
            {{ $listings -> PublicRemarks }} <br>
            <a href="javascript: void(0)" id="show_less_remarks">Show Less</a>
        </div>

    </div>

    <hr>
    <div class="details-section-container d-flex justify-content-around">
        <a href="javascript: void(0);" id="schedule_showing" class="btn btn-default z-depth-3"><i class="fal fa-clock fa-lg"></i>
            Schedule Showing</a>
        <a href="javascript: void(0);" id="info_request" class="btn btn-primary z-depth-3"><i class="fal fa-info-circle fa-lg"></i>
            Request Information</a>
    </div>
    <hr>

    <div class="details-section p-3">

        <div class="section-header">Property Details</div>
        <table width="100%">
            <tr>
                <td>Status:</td>
                <td>{{ $listings -> MlsStatus }}</td>
            </tr>
            <tr>
                <td>County:</td>
                <td>{{ $listings -> County }}</td>
            </tr>
            <tr>
                <td>SubdivisionName:</td>
                <td>{{ $listings -> SubdivisionName }}</td>
            </tr>
            <tr>
                <td>Year Built:</td>
                <td>{{ $listings -> YearBuilt }}</td>
            </tr>
            <tr>
                <td>Heating:</td>
                <td>{{ heating($listings -> Heating) }}</td>
            </tr>
            <tr>
                <td>Cooling:</td>
                <td>{{ cooling($listings -> Cooling) }}</td>
            </tr>
            <tr>
                <td>Lot Size:</td>
                <td>{{ $listings -> LotSizeAcres }} Acres</td>
            </tr>
            <tr>
                <td valign="top">Basement:</td>
                <td>
                    {{ YesNo($listings -> BasementYN) }}
                    @if($listings -> BasementYN == 'Y')
                    <br>Finished: {{ $listings -> BasementFinishedPercent }}%
                    @endif
                </td>
            </tr>
            <tr>
                <td>Fireplace:</td>
                <td>{{ YesNo($listings -> FireplaceYN) }}</td>
            </tr>
            <tr>
                <td valign="top">Garage:</td>
                <td>
                    {{ YesNo($listings -> GarageYN) }}
                    @if($listings -> GarageYN == 'Y')
                    <br>Attached: {{ YesNo($listings -> AttachedGarageYN) }}
                    @endif
                </td>
            </tr>
            <tr>
                <td>Pool:</td>
                <td>{{ $listings -> Pool }}</td>
            </tr>
            @if(!stristr($listings -> PropertyType, 'lease'))
            <tr>
                <td valign="top">Appliances:</td>
                <td>{{ $listings -> Appliances }}</td>
            </tr>
            <tr>
                <td width="150" valign="top">HOA/Condo Assoc.:</td>
                <td valign="top">
                    {{ YesNo($listings -> AssociationYN) }}
                    @if($listings -> AssociationYN == 'Y')
                    <br>Fees:
                    {{ $listings -> AssociationFee }}/{{ $listings -> AssociationFeeFrequency }}
                    @endif
                </td>
            </tr>
            @endif
        </table>

    </div>


    <div class="details-section p-3">

        <div class="section-header">School Information</div>
        <div class="text-default font-8"><i class="fal fa-info-circle mr-1"></i> Click map to zoom
            in and out</div>
        <div class="map-key">
            <ul>
                <li>
                    <div class="school-circle bg-primary"></div> Public
                </li>
                <li>
                    <div class="school-circle bg-secondary"></div> Private
                </li>
                <li>
                    <div class="school-circle bg-default"></div> Charter
                </li>
            </ul>
        </div>
        <div id="school_map"></div>
        <div id="school_info"></div>

    </div>
</div>

<div class="details-section p-3">

    <div class="section-header">Walk Score</div>
    <div id="walk_score_div">
        <script type='text/javascript'>
            var ws_wsid = 'g043cbb9626cb49c08cee66395e4f843f';
            var ws_address = '{!! $address !!}';
            var ws_format = 'tall';
            var ws_width = '500';
            var ws_height = '500';
        </script>
        <style type='text/css'>
            #ws-walkscore-tile {
                position: relative;
                text-align: left
            }

            #ws-walkscore-tile * {
                float: none;
            }
        </style>
        <div id='ws-walkscore-tile'></div>
        <script type='text/javascript' src='http://www.walkscore.com/tile/show-walkscore-tile.php'></script>
    </div>

</div>

<!--
<div class="details-section p-3">

    <div class="section-header">Solar Sun Score</div>
    <div class="text-primary font-12 text-center mt-2">Thinking about Solar?</div>
    <div class="sun-score">@php //echo
        //get_sun_score('https://www.sunnumber.com/whats-my-sunnumber?address='.urlencode($address).'%2C+USA&lat='.$listings
        //-> Latitude.'&lng='.$listings -> Longitude.'&zip='.$listings ->
        //PostalCode.'&state='.$listings ->
        //StateOrProvince.'&source=sunnumber.com')
        @endphp
        </div>

</div>
-->
<div class="details-section p-3 text-center bg-primary white-text">
    Listing courtesy of {{ $listings -> ListOfficeName }}
</div>

<input type="hidden" id="address" value="{{ $listings -> FullStreetAddress }} {{ $listings -> City }}, {{ $listings -> StateOrProvince }} {{ $listings -> PostalCode }}">
<input type="hidden" id="address_for_meta" value="{{ $address }}">
<input type="hidden" id="image_for_meta" value="{{ $image }}">
<input type="hidden" id="listing_id" value="{{ $listings -> ListingId }}">