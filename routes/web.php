<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('homepage');
})->name('home');

Route::get('/reservation', [ReservationController::class, 'showForm'])->name('reservation-form');

Route::post('/reservation', [ReservationController::class, 'submitForm'])->name('reservation-submit');

Route::get('/check-reservation', [ReservationController::class, 'showCheckReservationForm'])->name('check-reservation-form');

Route::post('/check-reservation', [ReservationController::class, 'submitCheckReservationForm'])->name('check-reservation-submit');

// Route::get('/reservation-details',function () {
//     return view('reservation.reservationDetails');
// })->name('reservation-details');

Route::fallback(function () {
    $error = "Page Not Found";
    return response()->view('error.errorPage', ['error' => $error], 404);
});

Route::get('/test-db-connection', function () {
    try {
        // Try to fetch data from a table (replace 'your_table' with an existing table name)
        $results = DB::table('reservations')->first();
        return response()->json($results);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
