<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttractionHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attractionshotel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('attraction_categories');
            $table->string('name');
            $table->string('code_attraction')->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('map_link')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attractionshotel');
    }
}
