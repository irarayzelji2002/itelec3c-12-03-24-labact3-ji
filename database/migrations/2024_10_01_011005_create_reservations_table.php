<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('irjFirstName', 255);
            $table->string('irjLastName', 255);
            $table->string('irjEmail', 255);
            $table->string('irjContactNo', 11);
            $table->string('irjAddress', 255);
            $table->date('irjCheckinDate');
            $table->enum('irjRoomType', ['Standard', 'Deluxe', 'Suite']);
            $table->unsignedInteger('irjNoOfDays');
            $table->unsignedInteger('irjNoOfGuests');
            $table->string('irjSpecialRequest', 255)->nullable();
            $table->decimal('irjRoomPrice', 10, 2)->after('irjRoomType');
            $table->decimal('irjTotalPrice', 10, 2)->after('irjNoOfGuests');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
