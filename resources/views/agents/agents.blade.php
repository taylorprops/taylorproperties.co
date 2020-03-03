@extends('layouts.app')
@section('title', 'Find an Agent | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')
@section('content')
<div class="page-container page-our-agents pt-5">
    <div class="container mb-0">
        <div class="row">
            <div class="col-12">
                <h1 class="display-4 text-center text-primary">Our Agents</h1>
                <div class="md-form">
                    <i class="fal fa-search prefix"></i>
                    <input type="text" id="agent_search" class="form-control" placeholder="Search agent name, phone number, language or specialty&hellip;">
                    <!--label for="index_search">Search agent name, phone number, language or specialty&hellip;</label-->
                </div>
            </div>
        </div>
    </div>
    <div class="container-agent">
        <div class="agents-row">
            <div class="w-100 text-center"> <i class="fas fa-spinner fa-spin fa-3x text-primary"></i> </div>
        </div>
    </div>
    <div class="modal fade" id="agent_details_modal" tabindex="-1" role="dialog" aria-labelledby="agent_details_modal_label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-primary" id="agent_details_modal_label"></h2>
                    <a class="btn-floating btn-sm float-right btn-secondary" data-dismiss="modal"><i class="fal fa-times fa-2x"></i></a>
                </div>
                <div class="modal-body">
                    <div id="agent_details"></div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
<script>
    get_agents(1);

function get_agents(page) {
    $.ajax({
        type: 'get',
        url: '{{ route('agents_list') }}',
        data: { page: page },
        success: function(data) {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            $('.agents-row').hide().fadeIn('slow').html(data);
            $('.page-link').off('click').on('click', function(e) {
                $('.agents-row').html('<div class="w-100 text-center"> <i class="fas fa-spinner fa-spin fa-3x text-primary"></i> </div>');
                var page = $(this).attr('href').split('page=')[1];
                e.preventDefault();
                get_agents(page);
            });
            $('.message-agent').off('click').on('click', function() {
                message_agent($(this).data('id'), $(this).data('name'), $(this).data('email'));
            });
            $('.show-agent-details, .show-agent-details-button').click(function(e) {
                e.preventDefault();
                show_details($(this).data('id'), $(this).data('email'),  $(this).data('name'), $(this).data('des'));
                var url = $(this).prop('href');
                ChangeUrl('page', url);
                $('.button'+$(this).data('id')).html('Loading <i class="fas fa-spinner fa-spin text-primary"></i>');
            });
        }
    });

}

function ChangeUrl(page, url) {
    if (typeof(history.pushState) != "undefined") {
        var obj = {
            Page: page,
            Url: url
        };
        history.pushState(obj, obj.Page, obj.Url);
    }
}



$('#agent_search').keyup(function() {
    search_agents(1, $('#agent_search').val());
});

function message_agent(id, name, email) {
    $('#email_agent_modal').modal();
    $('#email_agent_modal_label').text('Email '+name);
    $('#agent_id').val(id);
    $('#agent_email').val(email);
}
function show_details(id, email, name, des) {
    $('#agent_details_modal').modal();
    if(des != '') {
        name = name+' <span class="h4 text-primary-dark">'+des+'</span>';
    }
    $('#agent_details_modal_label').html(name);
    $('#agent_details').html('<div class="w-100 text-center"> <i class="fas fa-spinner fa-spin fa-3x text-primary"></i> </div>');
    $.ajax({
        type: 'get',
        url: '{{ route('agents.agent_profile') }}',
        dataType: 'html',
        data: {
            id: id
        },
        success: function (response) {
            $('#agent_details').html(response);
            $('.button'+id).html('View Agent Details');
            $('.message-agent').off('click').on('click', function() {
                message_agent($(this).data('id'), $(this).data('name'), $(this).data('email'));
            });
        }
    });
}
let search_controller;
let search_signal;
function search_agents(page, val) {
    $('.agents-row').html('<div class="w-100 text-center"> <i class="fas fa-spinner fa-spin fa-3x text-primary"></i> </div>');
    var data = {
        'val': val,
        'page': page
    }
    if (search_controller !== undefined) {
        search_controller.abort();
    }
    if ('AbortController' in window) {
        search_controller = new AbortController;
        search_signal = search_controller.signal;
    }
    fetch('{{ route('agents.search_agents') }}', {
        method: "post",
        signal: search_signal,
        body: JSON.stringify(data),
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
    }).then(function (response) {
        return response.text()
    }).then(function (data) {
        if (data) {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
            $('.agents-row').hide().fadeIn('slow').html(data);

            $('.page-link').off('click').on('click', function(e) {
                var page = $(this).attr('href').split('page=')[1];
                e.preventDefault();
                // Get listng results data so we can include the map and markers data in the function
                search_agents(page, val);
            });

            $('.show-agent-details, .show-agent-details-button').click(function(e) {
                e.preventDefault();
                show_details($(this).data('id'), $(this).data('email'), $(this).data('name'), $(this).data('des'));
                $('.button'+$(this).data('id')).html('Loading <i class="fas fa-spinner fa-spin"></i>');
                var url = $(this).prop('href');
                ChangeUrl('page', url);
            });
            $('.message-agent').off('click').on('click', function() {
                message_agent($(this).data('id'), $(this).data('name'), $(this).data('email'));
            });
        }
    }, function (error) {
        //alert(error.message);
    });
}
if ($(window).width() < 768) {
	$("#agent_search").attr("placeholder", "Search agents...");
} else {
	$("#agent_search").attr("placeholder", "Search agent name, phone number, language or specialty...");
}
</script>
@endsection