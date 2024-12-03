@extends('layout.app')
@section('title', 'Error Page')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/errorPage.css') }}" />
@endsection
@section('content')
    <section class="error-page" id="error-page">
        <div class="d-flex justify-content-center error-page-cont">
            <div class="card reservation-details-card">
                <div class="card-body">
                    <div class="title-cont">
                        <h1 class="card-title reservation-details-title playfair-display-black error text-center">
                            {{ $error ?? '' }}
                        </h1>
                        <p class="card-text reservation-p playfair-display-regular light-grey">
                            The page you visited does not exist. Please go to homepage instead.
                        </p>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a class="btn btn-primary btn-red" href="{{ route('home') }}" role="button">
                            Go to Homepage
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h1></h1>
    </section>
@endsection
