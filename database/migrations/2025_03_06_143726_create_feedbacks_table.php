<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Jika feedback bisa diberikan oleh user login
            $table->string('name'); // Nama pengirim
            $table->string('email')->nullable(); // Email pengirim
            $table->text('message'); // Isi kritik/saran
            $table->timestamps();
        
            // Foreign key jika kamu relasikan ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}
