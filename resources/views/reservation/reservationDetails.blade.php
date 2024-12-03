@extends('layout.app')
@section('title', 'Student Registration Success')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/reservation.css') }}" />
@endsection
@section('content')
    <section class="reservation-details" id="reservation-details">
        @if (isset($data))
            <div class="d-flex justify-content-center reservation-form-cont">
                <div class="card reservation-details-card">
                    <div class="card-body">
                        <div class="title-cont">
                            <h3 class="card-title reservation-details-title playfair-display-black success">
                                @if ($data['irjNoOfGuests'] == 1)
                                    You have successfully reserved a room!
                                @else
                                    You have successfully reserved {{ $data['irjNoOfGuests'] }} rooms!
                                @endif
                            </h3>
                            <p class="card-text reservation-p playfair-display-regular light-grey">
                                You may close this tab. See you on
                                {{ \Carbon\Carbon::parse($data['irjCheckinDate'])->format('F j, Y') }}!
                            </p>
                        </div>
                        <div class="details">
                            <h4 class="card-text reservation-details-title playfair-display-black">Reservation Details</h4>

                            <!-- Guest Information -->
                            <h6 class="card-text reservation-details-title playfair-display-black">Guest Information</h6>
                            <div class="detail">
                                <div class="playfair-display-semibold">Full Name</div>
                                <div>{{ $data['irjFirstName'] }} {{ $data['irjLastName'] }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">Email Address</div>
                                <div>{{ $data['irjEmail'] }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">Contact Number</div>
                                <div>{{ $data['irjContactNo'] }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">Address</div>
                                <div>{{ $data['irjAddress'] }}</div>
                            </div>

                            <!-- Room Reservation Details -->
                            <h6 class="card-text reservation-details-title playfair-display-black">Room Reservation Details
                            </h6>
                            <div class="detail">
                                <div class="playfair-display-semibold">Check-in Date</div>
                                <div>{{ \Carbon\Carbon::parse($data['irjCheckinDate'])->format('F j, Y') }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">Room Type</div>
                                <div>{{ $data['irjRoomType'] }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">No of Days</div>
                                <div>{{ $data['irjNoOfDays'] }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">Number of Guests</div>
                                <div>{{ $data['irjNoOfGuests'] }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">Special Request</div>
                                <div>{{ $data['irjSpecialRequest'] ?? 'None' }}</div>
                            </div>

                            <!-- Payment Details -->
                            <h6 class="card-text reservation-details-title playfair-display-black">Payment Details</h6>
                            <div class="detail">
                                <div class="playfair-display-semibold">Room Price</div>
                                <div>{{ '₱' . number_format($data['irjRoomPrice'], 2) }}</div>
                            </div>
                            <div class="detail">
                                <div class="playfair-display-semibold">Total Price</div>
                                <div>{{ '₱' . number_format($data['irjTotalPrice'], 2) }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center reservation-form-cont">
                <div class="card reservation-details-card">
                    <div class="card-body">
                        <div class="title-cont">
                            <h3 class="card-title reservation-details-title playfair-display-black error">
                                An error occurred when reserving.
                            </h3>
                            <p class="card-text reservation-p playfair-display-regular light-grey">
                                Please reserve again by clicking the button below.
                            </p>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <a class="btn btn-primary btn-red" href="{{ route('reservation-form') }}" role="button">
                                Reserve a Room
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
