<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToReservationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->decimal('irjRoomPrice', 10, 2)->after('irjRoomType');
            $table->decimal('irjTotalPrice', 10, 2)->after('irjNoOfGuests');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('irjRoomPrice');
            $table->dropColumn('irjTotalPrice');
        });
    }
}
