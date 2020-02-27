@if($agents -> count() > 0)
<div class="row">
    <div class="col-12 d-flex justify-content-center">
        <div class="mt-2 mr-4 font-8 d-none d-md-inline-block">{{ $agents -> firstItem() }} to {{ $agents -> lastItem() }} of {{$agents -> total()}}</div>
        <div>{{ $agents -> links() }}</div>
    </div>
</div>
<div class="row d-flex justify-content-center">
    @foreach($agents as $agent)
    @php
    if($agent -> photo_url != '') {
        $photo_url = $agent -> photo_url;
        $class = 'card-img-top';
    } else {
        $photo_url = '/images/agents/logo_dome.png';
        $class = 'card-img-top-default';
    }
    @endphp
    <div class="col-12 col-sm-6 mx-auto my-2 col-md-5 col-lg-4 col-xl-3">
        <!-- Card Light -->
        <div class="card">
            <!-- Card image -->
            <div class="view overlay">
                <img class="card-img-top" src="{{ $photo_url }}" alt="{{ $agent -> fullname }}">
                <a class="show-agent-details" data-name="{{ $agent -> fullname }}" data-id="{{ $agent -> agent_id }}" data-email="{{ $agent -> email }}" data-des="{{ $agent -> designations }}" href="/agents/{{ $agent -> agent_id }}/{{ $agent -> fullname }}">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>
            <!-- Card content -->
            <div class="card-body text-center text-primary">
                <!-- Title -->
                <a class="show-agent-details text-primary" data-name="{{ $agent -> fullname }}" data-id="{{ $agent -> agent_id }}"  data-email="{{ $agent -> email }}" data-des="{{ $agent -> designations }}" href="/agents/{{ $agent -> agent_id }}/{{ $agent -> fullname }}">
                    <div class="card-title h4 mb-0">{{ $agent -> fullname }}</div>
                </a>
                <a class="show-agent-details" data-name="{{ $agent -> fullname }}" data-id="{{ $agent -> agent_id }}" data-email="{{ $agent -> email }}" data-des="{{ $agent -> designations }}" href="/agents/{{ $agent -> agent_id }}/{{ $agent -> fullname }}">
                    <div class="h5 card-title text-default">{!! $agent -> designations !!}</div>
                </a>
                <div class="card-text">{{ $agent -> cell }}</div>
                <a href="javascript:void(0);" class="btn btn-sm btn-primary message-agent" data-id="{{ $agent -> agent_id }}" data-email="{{ $agent -> email }}" data-name="{{ $agent -> fullname }}" data-des="{{ $agent -> designations }}"><i class="fas fa-envelope pr-2"></i> Message Me</a>
                <a href="/agents/{{ $agent -> agent_id }}/{{ $agent -> fullname }}" class="btn btn-primary btn-sm show-agent-details-button button{{ $agent -> agent_id }}" data-name="{{ $agent -> fullname }}" data-id="{{ $agent -> agent_id }}" data-des="{{ $agent -> designations }}">View Agent Details</a>
            </div>
        </div>
        <!-- Card Light -->
    </div>
    @endforeach
</div>
<div class="row">
    <div class="col-12 d-flex justify-content-center mt-4">
        <div class="mt-2 mr-4 font-8 d-none d-md-inline-block">{{ $agents -> firstItem() }} to {{ $agents -> lastItem() }} of {{$agents -> total()}}</div>
        <div>{{ $agents -> links() }}</div>
    </div>
</div>
@else
<div class="no-results">No Results Match Your Search</div>
@endif