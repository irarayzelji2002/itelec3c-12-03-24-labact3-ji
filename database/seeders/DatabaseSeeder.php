<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Reservation;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

       Reservation::create([
            'irjFirstName' => 'Admin',
            'irjLastName' => 'Website',
            'irjEmail' => 'admin@hotel.com',
            'irjContactNo' => '09985748368',
            'irjAddress' => 'Sample Address',
            'irjCheckinDate' => '2024-11-05', //now()->format('Y-m-d'),
            'irjRoomType' => 'Standard',
            'irjNoOfDays' => 3,
            'irjNoOfGuests' => 2,
            'irjSpecialRequest' => '',
            'irjRoomPrice' => 1500.00,
            'irjTotalPrice' => 4500.00,
        ]);

    }
}
