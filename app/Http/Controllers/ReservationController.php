<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function showForm()
    {
        return view('reservation.reservationForm');
    }

    public function submitForm(Request $request)
    {
        // Validate form inputs
        $validatedData = $request->validate([
            'irjFirstName' => 'required|string|max:255',
            'irjLastName' => 'required|string|max:255',
            'irjEmail' => 'required|email|max:255',
            'irjContactNo' => 'required|digits:11',
            'irjAddress' => 'required|string|max:255',
            'irjCheckinDate' => 'required|date|after_or_equal:today',
            'irjRoomType' => 'required|in:Standard,Deluxe,Suite',
            'irjNoOfDays' => 'required|numeric|min:1|max:365',
            'irjNoOfGuests' => 'required|numeric|min:1|max:1000',
            'irjSpecialRequest' => 'nullable|string|max:255'
        ], [
            // Custom error messages
            'irjCheckinDate.after_or_equal' => 'The :attribute must be today or a future date.',
            'irjContactNo.digits' => 'The contact number must be a number of 11 digits.',
            'irjNoOfDays.max' => 'The :attribute must not exceed 365 days.',
            'irjNoOfGuests.max' => 'The :attribute must not exceed 1000 guests.'
        ], [
            // Custom attribute names
            'irjFirstName' => 'first name',
            'irjLastName' => 'last name',
            'irjEmail' => 'email',
            'irjContactNo' => 'contact number',
            'irjAddress' => 'address',
            'irjCheckinDate' => 'check-in date',
            'irjRoomType' => 'room type',
            'irjNoOfDays' => 'number of days',
            'irjNoOfGuests' => 'number of guests',
            'irjSpecialRequest' => 'special request'
        ]);

        // Find if there is existing same irjFirstName, irjLastName, irjCheckinDate
        $found_reservation = Reservation::where('irjFirstName', $validatedData['irjFirstName'])
            ->where('irjLastName', $validatedData['irjLastName'])
            ->where('irjCheckinDate', $validatedData['irjCheckinDate'])
            ->latest() // Orders the results by created_at descending
            ->first();

        // Check if the reservation exists
        if ($found_reservation) {
            return redirect()->back()->withInput()->withErrors(['irjCheckinDate' => 'You have already reserved on this date.']);
        }
        // Calculate room price
        $roomPrices = [
            'Standard' => 1500,
            'Deluxe' => 3000,
            'Suite' => 4500
        ];

        $roomType = $request->input('irjRoomType');
        $roomPrice = $roomPrices[$roomType];
        $totalPrice = $roomPrice * $request->input('irjNoOfDays');

        // Create a new reservation with room price and total price
        $validatedData['irjRoomPrice'] = $roomPrice;
        $validatedData['irjTotalPrice'] = $totalPrice;
        $reservation = Reservation::create($validatedData);

        return view('reservation.reservationDetails', [
            'data' => $reservation,
            'roomPrice' => $reservation['irjRoomPrice'],
            'totalPrice' => $reservation['irjTotalPrice']
        ]);
    }

    public function showCheckReservationForm() {
        return view('reservation.checkReservationForm');
    }

    public function submitCheckReservationForm(Request $request)
    {
        // Validate form inputs
        $validatedData= $request->validate([
            'irjFirstName' => 'required|string|max:255',
            'irjLastName' => 'required|string|max:255',
            'irjCheckinDate' => 'required|date',
        ], [], [
            // Custom attribute names
            'irjFirstName' => 'first name',
            'irjLastName' => 'last name',
            'irjCheckinDate' => 'check-in date'
        ]);

        // Find the reservation that matches the validated data
        $reservation = Reservation::where('irjFirstName', $validatedData['irjFirstName'])
            ->where('irjLastName', $validatedData['irjLastName'])
            ->where('irjCheckinDate', $validatedData['irjCheckinDate'])
            ->latest() // Orders the results by created_at descending
            ->first();

        // Check if the reservation exists
        if (!$reservation) {
            return redirect()->back()->withInput()->withErrors(['reservation' => 'Reservation not found.']);
        }

        // Calculate room price
        $roomPrices = [
            'Standard' => 1500,
            'Deluxe' => 3000,
            'Suite' => 4500
        ];

        $roomType = $reservation['irjRoomType'];
        $roomPrice = $roomPrices[$roomType];
        $totalPrice = $roomPrice * $reservation['irjNoOfDays'];

        // Pass data to the view
        return view('reservation.checkReservationForm', ['data' => $reservation]);
    }
}
