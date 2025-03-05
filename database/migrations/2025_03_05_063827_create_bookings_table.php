<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
           $table->id();
           $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
           $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // Relasi ke tabel rooms
           $table->date('check_in_date');
           $table->date('check_out_date');
           $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
