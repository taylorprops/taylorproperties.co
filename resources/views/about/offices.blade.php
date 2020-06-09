@extends('layouts.app')

@section('title', 'Office Locations | Taylor Properties | Buying and Selling Real Estate in DC, MD, VA and PA')

@section('content')
<style>
    .container-fluid.header {
        background-image: url('/images/office-room.jpg');
        background-size: cover;
        background-position: center;
    }


    #locations {
        padding: 4em 0;
    }

    .col-md-4.locations {
        margin-bottom: 2em;
    }
</style>
<div class="page-container page-offices">
    <div class="container-fluid header">
        <div class="row">
            <div class="header-text">
                <h1>Office Locations</h1>
                <p>Convenient locations to serve you throughout the Baltimore-Washington metropolitan areas. Our offices give you the flexibility to work where you want or need to meet clients. Most have work stations plus conference rooms for meetings, training and settlements.</p>
            </div>
        </div>
    </div>
    <section id="locations">
        <div class="container">
            <div class="row">
                @foreach ($locations as $location)
                <div class="col-md-4 locations">
                    <h4>{{$location -> heading}}</h4>
                    <p>{{$location -> street}}<br>
                        {{$location -> city}}, {{$location -> state}} {{$location -> zip}}<br>
                        <a href="https://maps.google.com/?q={{$location -> street.' '.$location -> city.', '.$location -> street.' '.$location -> street }}" target="_blank">Get Directions</a></p>
                    <p>(301) 970-2447</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection