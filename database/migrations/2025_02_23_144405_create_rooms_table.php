<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
                $table->id();
                $table->string('name_image');
                $table->string('code_room')->unique();
                $table->decimal('price', 10, 2);
                $table->integer('max_guest');
                $table->text('description')->nullable(); // Deskripsi kamar
                $table->string('bed_type')->nullable(); // Tipe tempat tidur (e.g., Queen, King, Twin)
                $table->string('image')->nullable();
                $table->softDeletes();
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
        Schema::dropIfExists('rooms');
    }
}
