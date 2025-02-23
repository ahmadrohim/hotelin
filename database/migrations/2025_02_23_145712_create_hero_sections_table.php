<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul utama di hero section
            $table->text('subtitle')->nullable(); // Subtitle opsional
            $table->string('button_text')->nullable(); // Tulisan tombol CTA (Call to Action)
            $table->string('button_link')->nullable(); // Link tombol CTA
            $table->string('image')->nullable(); // Gambar background
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
        Schema::dropIfExists('hero_sections');
    }
}
