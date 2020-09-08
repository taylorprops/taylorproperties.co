@extends('layouts.app')
@section('title')
Welcome, {{Auth::user() -> name}}!
@endsection
@section('content')
<div class="dashboard page-dashboard">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <br><br>
    <div class="container page-container">
        <div class="row">
            <div class=col-12 w-100">
                <ul class="nav nav-tabs nav-justified md-tabs bg-primary" id="account_tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="props-tab" data-toggle="tab" href="#props" role="tab" aria-controls="props" aria-selected="false"><i class="fas fa-home d-none d-sm-inline-block"></i> Properties</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="search-tab" data-toggle="tab" href="#searches" role="tab" aria-controls="searches" aria-selected="true"><i class="fas fa-search d-none d-sm-inline-block"></i> Searches</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-user d-none d-sm-inline-block"></i> Profile</a>
                    </li>
                </ul>
                <div class="tab-content card pt-5 w-100" id="account_tabs_div">
                    <div class="tab-pane fade show active" id="props" role="tabpanel" aria-labelledby="props-tab">
                        <section class="container my-2">
                            <h3 class="card-title text-primary">Your Favorite Properties</h3>
                            <!-- Grid row -->
                            <div class="row">
                                @foreach($properties as $property)
                                @php
                                $class = '';
                                $text_color = 'text-success';
                                if($property -> MlsStatus != 'ACTIVE') {
                                $class = 'not_active';
                                $text_color = 'text-danger';
                                }
                                @endphp
                                <div class="col-12 col-md-6 col-lg-3 mb-5 mt-3">
                                    <div class="card card-cascade narrower {{ $class }}">
                                        <div class="view view-cascade overlay">
                                            <img class="card-img-top" src="{{ $property -> ListPictureURL != '' ? str_replace('http:', 'https:', $property -> ListPictureURL) : '/images/search/no_photo.png' }}" alt="{{ucwords(strtolower($property -> FullStreetAddress))}}">
                                            <a href="/search/listing_results?listing_id={{$property -> ListingId}}&lat={{$property -> Latitude}}&lon={{$property -> Longitude }}&state={{$property -> StateOrProvince}}" target="_blank">
                                                <div class="mask rgba-white-slight"></div>
                                            </a>
                                        </div>
                                        <div class="card-body card-body-cascade">
                                            <h5 class="text-primary font-11">{{ucwords(strtolower($property -> FullStreetAddress))}}<br>{{ucwords(strtolower($property -> City))}}, {{$property -> StateOrProvince}} {{$property -> PostalCode}}</h5>
                                            <div class="{{ $text_color }}">{{ $property -> MlsStatus }}</div>
                                            <p class="card-text">
                                                <strong>Price:</strong> ${{number_format($property -> ListPrice, 0)}}
                                                <br>
                                                <strong>Beds:</strong> {{ $property -> BedroomsTotal }} | Baths: {{ $property -> BathroomsTotalInteger }}
                                                <br>
                                                <strong>Sqft:</strong> {{ number_format($property -> LivingArea) }}

                                            </p>

                                            <a href="/search/listing_results?listing_id={{$property -> ListingId}}&lat={{$property -> Latitude}}&lon={{$property -> Longitude }}&state={{$property -> StateOrProvince}}" target="_blank" class="btn btn-primary btn-sm"><i class="fal fa-eye mr-2"></i> View Property</a>

                                            <a href="javascript: void(0);" class="btn btn-sm btn-default schedule_showing" data-id="{{$property -> ListingId}}" data-address="{{ucwords(strtolower($property -> FullStreetAddress))}} {{ucwords(strtolower($property -> City))}}, {{$property -> StateOrProvince}} {{$property -> PostalCode}}"><i class="fal fa-clock fa-lg mr-2"></i>
                                                Schedule Showing</a>
                                            <br>
                                            <a href="javascript: void(0);" class="btn btn-sm btn-primary info_request" data-id="{{$property -> ListingId}}" data-address="{{ucwords(strtolower($property -> FullStreetAddress))}} {{ucwords(strtolower($property -> City))}}, {{$property -> StateOrProvince}} {{$property -> PostalCode}}"><i class="fal fa-info-circle fa-lg mr-2"></i>
                                                Request Info</a>

                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <a type="button" class="btn btn-sm btn-danger delete-listing" href="javascript: void(0)" data-id="{{ $property -> ListingId }}"><i class="fal fa-trash mr-2"></i> Remove</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!-- Grid row -->
                        </section>
                    </div>
                    <div class="tab-pane fade" id="searches" role="tabpanel" aria-labelledby="serach-tab">
                        <section class="container my-2">
                            <h3 class="card-title text-primary">Your Saved Searches</h3>
                            <div class="row">
                                @foreach ($user_searches as $search)
                                @php $checked = ''; if($search['receive_email_updates'] == 'yes') { $checked = 'checked'; } @endphp
                                <div class="col-12 col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $search['search_name'] }}
                                            </h5>
                                            <div class="card-text">
                                                <strong>Search Details:</strong>
                                                <br>
                                                <strong>Location:</strong> {{ $search['location'] }}
                                                <br>
                                                <strong>Price Range:</strong> {{ $search['price'] }}
                                                <br>
                                                <strong>Listing Type:</strong> {{ $search['listing_type'] }}
                                                <br>
                                                <strong>Beds:</strong> {{ $search['beds'] }} | Baths: {{ $search['baths'] }}
                                                <br>
                                                <strong>Sale Types:</strong> {{ $search['sale_types'] }}
                                                <br>
                                                <strong>Property Types:</strong> {{ $search['property_types'] }}
                                                <br>
                                                <strong>Square Feet:</strong> {{ $search['sqft'] }}
                                                <br>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            New since last visit: {{ $search['start_from_url_count'] }}
                                            <br>
                                            <a type="button" class="btn btn-sm btn-primary mb-2" href="{{ $search['start_from_url'] }}" target="_blank"><i class="fal fa-eye mr-2"></i> View</a>
                                            <br>
                                            All listings: {{ $search['url_count'] }}
                                            <br>
                                            <a type="button" class="btn btn-sm btn-primary mb-3" href="{{ $search['url'] }}" target="_blank"><i class="fal fa-eye mr-2"></i> View</a>
                                            <hr>
                                            Receive Email Updates:
                                            <div class="switch">
                                                <label>
                                                    Off
                                                    <input type="checkbox" class="receive-email-updates" data-id="{{ $search['saved_search_id'] }}" {{ $checked }}>
                                                    <span class="lever"></span> On
                                                </label>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-center">
                                                <a type="button" class="btn btn-sm btn-primary" href="{{ $search['url'] }}" target="_blank"><i class="fal fa-edit mr-2"></i> Edit</a>
                                                <a type="button" class="btn btn-sm btn-danger delete-search" href="javascript: void(0)" data-id="{{ $search['saved_search_id'] }}"><i class="fal fa-trash mr-2"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </section>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">


                        <form id="profile_form" class="needs-validation container mb-0" novalidate>
                            <div class="modal-body mx-3">
                                <div class="form-row">
                                    <div class="col-12">
                                        <div class="md-form my-2">
                                            <i class="fal fa-user prefix grey-text fa-sm"></i>
                                            <input type="text" name="name" id="name" class="form-control validate" value="{{Auth::user() -> name}}" required>
                                            <label for="name">Your Name</label>
                                            <div class="invalid-feedback">Name is required</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="md-form my-2">
                                            <i class="fal fa-envelope prefix grey-text fa-sm"></i>
                                            <input type="email" name="email" id="email" class="form-control validate" value="{{Auth::user() -> email}}" required>
                                            <label for="email">Your Email</label>
                                            <div class="invalid-feedback">A valid email is required</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="md-form my-2">
                                            <i class="fal fa-phone prefix grey-text fa-sm"></i>
                                            <input type="tel" name="phone" id="phone" class="form-control validate phone"  value="{{Auth::user() -> phone}}" required>
                                            <label for="phone">Your Phone</label>
                                            <div class="invalid-feedback">Phone is required</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="md-form my-2">
                                            <i class="fal fa-key prefix grey-text fa-sm"></i>
                                            <input type="password" name="password" id="password" class="form-control validate" placeholder="Leave blank to keep current password">
                                            <label for="password">Password</label>
                                            <div class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary" id="edit_profile_button">Save Details <i class="fal fa-save mr-2"></i></button>
                            </div>
                        </form>

                    </div>
                </div>
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
                        <div class="form-row">
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-user prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_name" id="showing_name" class="form-control validate" required>
                                    <label for="showing_name">Your Name</label>
                                    <div class="invalid-feedback">Name is required</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-envelope prefix grey-text fa-sm"></i>
                                    <input type="email" name="showing_email" id="showing_email" class="form-control validate" required>
                                    <label for="showing_email">Your Email</label>
                                    <div class="invalid-feedback">A valid email is required</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-phone prefix grey-text fa-sm"></i>
                                    <input type="tel" name="showing_phone" id="showing_phone" class="form-control validate phone" required>
                                    <label for="showing_phone">Your Phone</label>
                                    <div class="invalid-feedback">Phone is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-calendar-alt prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_date" id="showing_date" class="form-control validate datepicker" required>
                                    <label for="showing_date">Showing Date</label>
                                    <div class="invalid-feedback">Showing date is required</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-clock prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_time" id="showing_time" class="form-control validate time" required>
                                    <label for="showing_time">Showing Time</label>
                                    <div class="invalid-feedback">Showing Time is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-calendar-alt prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_date_alt" id="showing_date_alt" class="form-control datepicker">
                                    <label for="showing_date_alt">Alternate Showing Date</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-clock prefix grey-text fa-sm"></i>
                                    <input type="text" name="showing_time_alt" id="showing_time_alt" class="form-control time">
                                    <label for="showing_time_alt">Alternate Showing Time</label>
                                </div>
                            </div>
                        </div>
                        <div class="md-form my-2">
                            <i class="fal fa-comment-alt prefix grey-text fa-sm"></i>
                            <textarea name="comments" id="comments" class="md-textarea form-control" rows="1"></textarea>
                            <label for="comments">Comments</label>
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
                        <div class="form-row">
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-user prefix grey-text fa-sm"></i>
                                    <input type="text" id="info_request_name" class="form-control validate" required>
                                    <label for="info_request_name">Your Name</label>
                                    <div class="invalid-feedback">Name is required</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-envelope prefix grey-text fa-sm"></i>
                                    <input type="email" id="info_request_email" class="form-control validate" required>
                                    <label for="info_request_email">Your Email</label>
                                    <div class="invalid-feedback">A valid email is required</div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="md-form my-2">
                                    <i class="fal fa-phone prefix grey-text fa-sm"></i>
                                    <input type="tel" id="info_request_phone" class="form-control validate phone" required>
                                    <label for="info_request_phone">Your Phone</label>
                                    <div class="invalid-feedback">Phone is required</div>
                                </div>
                            </div>
                        </div>
                        <div class="md-form my-2">
                            <i class="fal fa-comment-alt prefix grey-text fa-sm"></i>
                            <textarea id="info_request_comments" class="md-textarea form-control" rows="4"></textarea>
                            <label for="info_request_comments">Comments</label>
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
    <input type="hidden" id="listing_id">
    <input type="hidden" id="address">
</div>
@endsection
@section('js')
<script type="text/javascript">
    var _token = $('meta[name="csrf-token"]').attr('content');

    var hash = window.location.hash.substr(1);
	if (hash == 'profile') {
		$('#profile-tab').click();
	}
	if (hash == 'searches') {
		$('#searches-tab').click();
    }

    $('#profile_form').submit(function(e) {
        $('#edit_profile_button').html('Saving <i class="fas fa-spinner fa-spin"></i>');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '{{ route('update_user') }}',
            data: { name: $('#name').val(), phone: $('#phone').val(), email: $('#email').val() },
            success: function(response) {
                $('#edit_profile_button').html('Save Details <i class="fal fa-save mr-2"></i>');
                toastr['success']('Your Details Were Successfully Updated');
            }
        });
    });

    $('.schedule_showing').unbind('click').bind('click', function() {
        $('#listing_id').val($(this).data('id'));
        $('#address').val($(this).data('address'));
        $('#showing_request_listing_details').html($('#address').val());
        $('#modalShowingRequest').modal();
        get_user_data('showing');
        $('#showing_request_form').off('submit').on('submit', function(e) {
            e.preventDefault();
            add_showing_request();
        });
    });

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

    $('.info_request').unbind('click').bind('click', function() {
        $('#listing_id').val($(this).data('id'));
        $('#address').val($(this).data('address'));
        get_user_data('info');
        $('#info_request_listing_details').html($('#address').val());
        setTimeout(function() {
            $('#info_request_comments').val('Hello,\nI am interested in the property located at ' + $('#address').val() + ' and would like more information.\nThank you').next('label').addClass('active');
        }, 500);
        $('#modalInfoRequest').modal();
        $('#info_request_form').off().on('submit', function(e) {
            e.preventDefault();
            info_request();
        });
    });

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


    $('.delete-listing').click(function() {
        var id = $(this).data('id');

        var t = $(this);
        t.html('Deleting <i class="fas fa-spinner fa-spin"></i>');
        $.ajax({
            type: 'post',
            data: { id: id },
            url: '{{ route('delete.property') }}',
            success: function() {
                t.closest('.card').parent('div').fadeOut('slow');
            }
        });
    });
    $('.delete-search').click(function() {
        var id = $(this).data('id');
        var t = $(this);
        t.html('Deleting <i class="fas fa-spinner fa-spin"></i>');
        $.ajax({
            type: 'post',
            data: { id: id },
            url: '{{ route('delete.search') }}',
            success: function() {
                t.closest('.card').parent('div').fadeOut('slow');
            }
        });
    });
    $('.receive-email-updates').change(function() {
        var id = $(this).data('id');
        var updates = 'no';
        if($(this).is(':checked')) {
            updates = 'yes';
        }
        $.ajax({
            type: 'POST',
            url: '{{ route('update_email_alerts') }}',
            data: { id: id, updates: updates },
            success: function(response) {
                tostr['success']('Email Update Preferences Updates');
            }
        });
    });
</script>
@endsection