@if(($cities && count($cities) > 0) || ($counties && count($counties) > 0) || ($zips && count($zips) > 0) || ($subdivisions && count($subdivisions) > 0) || ($listings && count($listings) > 0))
    <div class="container">
        <div class="row">
            @if($cities && count($cities) > 0)
            <div class="col-12">
                <div class="results-header"><i class="far fa-city mr-3"></i> Cities</div>
                <div class="dropdown">
                    <div class="dropdown-menu dropdown-primary show">
                        @foreach($cities as $city)
                        <a
                        class="dropdown-item search-results-item" href="javascript: void(0)" data-type="city" data-city="{{ $city -> city }}" data-county="" data-zip="" data-state="{{ $city -> state }}" data-coordinates="" data-listing_id="" data-subdivision="">{{ $city -> city }}, {{ $city -> state }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if($counties && count($counties) > 0)
            <div class="col-12">
                <div class="results-header"><i class="fas fa-globe mr-3"></i> Counties</div>
                <div class="dropdown">
                    <div class="dropdown-menu dropdown-primary show">
                        @foreach($counties as $county)
                        <a class="dropdown-item search-results-item" href="javascript: void(0)" data-type="county" data-city="" data-county="{{ $county -> county }}" data-zip="" data-state="{{ $county -> state }}" data-coordinates="" data-listing_id="" data-subdivision="">{{ $county -> county }}, {{ $county -> state }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if($zips && count($zips) > 0)
            <div class="col-12">
                <div class="results-header"><i class="far fa-map-marker-alt mr-3"></i> Zip Codes</div>
                <div class="dropdown">
                    <div class="dropdown-menu dropdown-primary show">
                        @foreach($zips as $zip)
                        <a class="dropdown-item search-results-item" href="javascript: void(0)" data-city="" data-lat="{{ $zip -> Latitude }}" data-lon="{{ $zip -> Longitude }}" data-county="" data-zip="{{ $zip -> zip }}" data-state="{{ $zip -> state }}" data-coordinates="" data-listing_id="" data-subdivision="">{{ $zip -> zip }} - {{ $zip -> city }}, {{ $zip -> state }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if($subdivisions && count($subdivisions) > 0)
            <div class="col-12">
                <div class="results-header"><i class="far fa-home mr-3"></i> Subdivisions</div>
                <div class="dropdown">
                    <div class="dropdown-menu dropdown-primary show">
                        @foreach($subdivisions as $subdivision)
                        <a class="dropdown-item search-results-item" href="javascript: void(0)" data-city="" data-lat="{{ $subdivision -> Latitude }}" data-lon="{{ $subdivision -> Longitude }}" data-county="" data-zip="" data-state="" data-coordinates="" data-listing_id="" data-subdivision="{{ $subdivision -> SubdivisionName }}">{{ $subdivision -> SubdivisionName }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if($listings && count($listings) > 0)
            <div class="col-12">
                <div class="results-header"><i class="far fa-home mr-3"></i> Properties</div>
                <div class="dropdown">
                    <div class="dropdown-menu dropdown-primary show">
                        @foreach($listings as $listing)
                        <a class="dropdown-item search-results-item" href="javascript: void(0)" data-type="listing_id" data-city="{{ $listing -> City }}" data-lat="{{ $listing -> Latitude }}" data-lon="{{ $listing -> Longitude }}" data-county="" data-zip="" data-state="{{ $listing -> StateOrProvince }}" data-coordinates="" data-subdivision="" data-listing_id="{{ $listing -> ListingId }}" data-address="{{ str_replace('#', '', $listing -> FullStreetAddress) }}-{{ $listing -> City }}-{{ $listing -> StateOrProvince }}-{{ $listing -> PostalCode }}">
                            {{ $listing -> FullStreetAddress }} {{ $listing -> City }}, {{ $listing -> StateOrProvince }}
                            {{ $listing -> PostalCode }}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endif