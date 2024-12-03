@extends('layout.app')
@section('title', 'Home')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/homepage.css') }}" />
@endsection
@section('content')
    <section class="homepage" id="homepage">
        <h1 class="homepage-title">
            <span class="playfair-display-extrabold uppercase">Welcome to</span>
            <span class="hosteltransilvania-regular uppercase hotel-transylvania-text">Hotel Transylvania</span>
            <a class="btn btn-primary btn-red btn-reserve" href="{{ route('reservation-form') }}" role="button">
                Reserve a room today!
            </a>
            <a class="btn btn-primary btn-green btn-reserve" href="{{ route('check-reservation-form') }}" role="button">
                See my reservation
            </a>
        </h1>
    </section>
@endsection
