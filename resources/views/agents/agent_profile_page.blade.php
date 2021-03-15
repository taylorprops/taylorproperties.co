@extends('layouts.app')
@section('title', $agent -> fullname)
@section('content')
<div class="page-container page-agent_profile">

    <div class="container pt-5">
        <div class="row">
            <div class="col-12">
                    <div class="card mb-2 mt-4">
                            <div class="row">
                                    <div class="col-12 mx-auto col-sm-4">

                                        <div class="agent-profile card-body contact">

                                            <div class="h2 w-100 text-center text-primary">{{ $agent -> fullname }}</div>

                                            @if (empty($agent -> photo_url))
                                            <img class="pb-4 profile-img-top" src="{{ asset('images/logos/TaylorProperties-1x1.jpg') }}" alt="{{ $agent -> fullname }}" style="width: 100%;padding: 1em;">
                                            @else
                                            <img class="pb-4 profile-img-top" src="{{ $agent -> photo_url }}" alt="{{ $agent -> fullname }}" width="100%" style="max-height: 400px; width:100%;object-fit: cover; padding: 1em;">
                                            @endif
                                            <ul class="text-lg-left list-unstyled ml-4">
                                                <li>
                                                    <i class="fas fa-phone mr-3 text-primary"></i>@if($agent -> agent_id != '20000540') <a href="tel:{{$agent -> cell}}">{{$agent -> cell}}</a> @endif
                                                </li>
                                                <li>
                                                    <i class="fas fa-envelope mr-2 text-primary"></i> <a href="javascript:void(0);" class="btn btn-primary message-agent" data-id="{{ $agent -> agent_id }}" data-email="{{ $agent -> email }}" data-name="{{ $agent -> fullname }}" data-des="{{ $agent -> designations }}">Message Me</a>
                                                </li>
                                                <li>
                                                    @if (empty($agent -> website))
                                                    <i class="fas fa-globe-americas mr-3 text-primary"></i> <a href="https://www.taylorproperties.co/" target="_blank">www.taylorproperties.co</a>
                                                    @else
                                                    <i class="fas fa-globe-americas mr-3 text-primary"></i> <a href="{{$agent -> website}}" target="_blank">{{$agent -> website}}</a>
                                                    @endif
                                                </li>
                                            </ul>
                                            <ul class="list-inline list-unstyled ml-5 mt-3">
                                                <li class="list-inline-item">
                                                    @if (!empty($agent -> facebook))
                                                    <a href="{{$agent -> facebook}}" class="p-2 fa-lg tw-ic" target="_blank">
                                                        <i class="fab fa-facebook text-primary"></i>
                                                    </a>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    @if (!empty($agent -> linkedin))
                                                    <a href="{{$agent -> linkedin}}" class="p-2 fa-lg tw-ic" target="_blank">
                                                        <i class="fab fa-linkedin-in text-primary"> </i>
                                                    </a>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    @if (!empty($agent -> instagram))
                                                    <a href="{{$agent -> instagram}}" class="p-2 fa-lg tw-ic" target="_blank">
                                                        <i class="fab fa-instagram text-primary"> </i>
                                                    </a>
                                                    @endif
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" class="btn btn-primary ml-0 share-link-agent" data-type="agent" data-heading="Share Agent Details" data-agentname="{{ $agent -> fullname }}" data-agentphone="{{ $agent -> cell }}" data-agentemail="{{ $agent -> email }}" data-image="{{ $agent -> photo_url }}">Share <i class="fa fa-share-alt text-white ml-2"></i></a>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                    @if($agent -> bio != '')
                                    <div class="col-12 col-sm-8">
                                        <div class="card-body">
                                            <h3 class="mt-4 text-primary">About</h3>
                                            <p>{!! $agent -> bio !!}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                        </div>
            </div>
        </div><!-- ./ .row -->
    </div><!-- ./ .container -->

</div>
@endsection
