@extends('layout.app')
@section('title', 'Reservation Form')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/reservation.css') }}" />
@endsection
@section('content')
    <section class="reservation" id="reservation">
        <div class="d-flex justify-content-center reservation-form-cont">
            <div class="card reservation-card">
                <div class="card-body">
                    <h2 class="card-title reservation-title playfair-display-black">Hotel Reservation Form</h2>
                    <form class="reservation-form" action="{{ route('reservation-submit') }}" method="POST">
                        @csrf
                        <!-- Guest Information -->
                        <h5 class="card-title reservation-subtitle playfair-display-black">Guest Information</h5>

                        <div class="row">
                            <div class="col-12">
                                <span class="playfair-display-semibold">Full Name</span>
                                <span class="text-danger">*</span>
                            </div>

                            <div class="form-group col-xl-6 col-md-12">
                                <label class="playfair-display-semibold" for="irjFirstName" hidden>
                                    First Name
                                </label>
                                @error('irjFirstName')
                                    <span class="text-danger err-msg-top">{{ $message }}</span>
                                @enderror
                                <input class="form-control @error('irjFirstName') is-invalid @enderror" type="text"
                                    id="irjFirstName" name="irjFirstName" maxlength="255" value="{{ old('irjFirstName') }}"
                                    placeholder="First Name">
                            </div>

                            <div class="form-group col-xl-6 col-md-12">
                                <label class="playfair-display-semibold" for="irjLastName" hidden>
                                    Last Name
                                </label>
                                @error('irjLastName')
                                    <span class="text-danger err-msg-top">{{ $message }}</span>
                                @enderror
                                <input class="form-control @error('irjLastName') is-invalid @enderror" type="text"
                                    id="irjLastName" name="irjLastName" maxlength="255" value="{{ old('irjLastName') }}"
                                    placeholder="Last Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="playfair-display-semibold" for="irjEmail">
                                Email Address
                                <span class="text-danger">*</span>
                                @error('irjEmail')
                                    <span class="text-danger err-msg">{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control @error('irjEmail') is-invalid @enderror" type="text"
                                id="irjEmail" name="irjEmail" maxlength="255" value="{{ old('irjEmail') }}"
                                placeholder="sample@gmail.com">
                            {{-- type="email" --}}
                        </div>

                        <div class="form-group">
                            <label class="playfair-display-semibold" for="irjContactNo">
                                Contact Number
                                <span class="text-danger">*</span>
                                @error('irjContactNo')
                                    <span class="text-danger err-msg">{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control @error('irjContactNo') is-invalid @enderror" type="text"
                                id="irjContactNo" name="irjContactNo" maxlength="11" value="{{ old('irjContactNo') }}"
                                placeholder="09xxxxxxxxx">
                        </div>

                        <div class="form-group">
                            <label class="playfair-display-semibold" for="irjAddress">
                                Address
                                <span class="text-danger">*</span>
                                @error('irjAddress')
                                    <span class="text-danger err-msg">{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control @error('irjAddress') is-invalid @enderror" type="text"
                                id="irjAddress" name="irjAddress" maxlength="255" value="{{ old('irjAddress') }}"
                                placeholder="Block Number, Street, District, City, Province">
                        </div>

                        <!-- Room Reservation Details -->
                        <h5 class="card-title reservation-subtitle playfair-display-black">Room Reservation Details</h5>

                        <div class="form-group">
                            <label class="playfair-display-semibold" for="irjCheckinDate">
                                Check-in Date
                                <span class="text-danger">*</span>
                                @error('irjCheckinDate')
                                    <span class="text-danger err-msg">{{ $message }}</span>
                                @enderror
                            </label>
                            <input class="form-control @error('irjCheckinDate') is-invalid @enderror" type="date"
                                id="irjCheckinDate" name="irjCheckinDate"
                                value="{{ old('irjCheckinDate', date('Y-m-d')) }}">
                        </div>

                        <div class="form-group">
                            <label class="playfair-display-semibold">
                                Room Type
                                <span class="text-danger">*</span>
                                @error('irjRoomType')
                                    <span class="text-danger err-msg">{{ $message }}</span>
                                @enderror
                            </label><br>
                            <div class="d-flex">
                                <div class="form-check form-check-inline flex-fill">
                                    <input class="form-check-input" type="radio" id="standard" name="irjRoomType"
                                        value="Standard"
                                        {{ old('irjRoomType', 'Standard') == 'Standard' ? 'checked' : '' }}>
                                    <label class="form-check-label playfair-display-regular" for="standard">
                                        Standard (₱1,500.00)
                                    </label>
                                </div>
                                <div class="form-check form-check-inline flex-fill">
                                    <input class="form-check-input" type="radio" id="deluxe" name="irjRoomType"
                                        value="Deluxe" {{ old('irjRoomType') == 'Deluxe' ? 'checked' : '' }}>
                                    <label class="form-check-label playfair-display-regular" for="deluxe">
                                        Deluxe (₱3,000.00)
                                    </label>
                                </div>
                                <div class="form-check form-check-inline flex-fill">
                                    <input class="form-check-input" type="radio" id="suite" name="irjRoomType"
                                        value="Suite" {{ old('irjRoomType') == 'Suite' ? 'checked' : '' }}>
                                    <label class="form-check-label playfair-display-regular" for="suite">
                                        Suite (₱4,500.00)
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-xl-6 col-md-12">
                                <label class="playfair-display-semibold" for="irjNoOfDays">
                                    Number of Days
                                    <span class="text-danger">*</span><br />
                                    @error('irjNoOfDays')
                                        <span class="text-danger err-msg-top">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input class="form-control @error('irjNoOfDays') is-invalid @enderror" type="number"
                                    id="irjNoOfDays" name="irjNoOfDays" min="1"
                                    value="{{ old('irjNoOfDays', 1) }}" placeholder="Number of Days">
                                {{-- max="365" --}}
                            </div>

                            <div class="form-group col-xl-6 col-md-12">
                                <label class="playfair-display-semibold" for="irjNoOfGuests">
                                    Number of Guests
                                    <span class="text-danger">*</span><br />
                                    @error('irjNoOfGuests')
                                        <span class="text-danger err-msg-top">{{ $message }}</span>
                                    @enderror
                                </label>
                                <input class="form-control @error('irjNoOfGuests') is-invalid @enderror" type="number"
                                    id="irjNoOfGuests" name="irjNoOfGuests" min="1"
                                    value="{{ old('irjNoOfGuests', 1) }}" placeholder="Number of Guests">
                                {{-- max="1000" --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="playfair-display-semibold" for="irjSpecialRequest">Special Request</label>
                            @error('irjSpecialRequest')
                                <span class="text-danger err-msg">{{ $message }}</span>
                            @enderror
                            <textarea class="form-control @error('irjSpecialRequest') is-invalid @enderror" id="irjSpecialRequest"
                                name="irjSpecialRequest" rows="4" maxlength="255">{{ old('irjSpecialRequest') }}</textarea>
                        </div>

                        <!-- Reserve Button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary btn-red btn-reg">Reserve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
