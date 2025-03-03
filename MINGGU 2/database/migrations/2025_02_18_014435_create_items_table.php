<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Membuat kolom ID sebagai primary key dengan tipe data auto-increment.
            $table->string('name'); // Membuat kolom 'name' dengan tipe data string.
            $table->text('description'); // Membuat kolom 'description' dengan tipe data text untuk menyimpan deskripsi panjang.
            $table->timestamps(); // Menambahkan kolom 'created_at' dan 'updated_at' untuk mencatat waktu pembuatan dan pembaruan data.
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
