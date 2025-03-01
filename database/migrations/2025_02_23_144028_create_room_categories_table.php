<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // Slug untuk URL-friendly identifier
            $table->string('name'); // Nama kategori kamar
            $table->string('image')->nullable(); // Gambar kategori (opsional)
            $table->text('description')->nullable(); // Deskripsi kategori kamar
            $table->decimal('base_price', 10, 2)->default(0); // Harga dasar kategori kamar
            $table->integer('max_guests')->default(1); // Maksimal jumlah tamu dalam satu kamar
            $table->boolean('status')->default(true); // Status kategori (aktif/nonaktif)
            $table->timestamps(); // Tanggal dibuat dan diperbarui
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_categories');
    }
}
