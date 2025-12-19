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
        Schema::create('kuliners', function (Blueprint $table) {
            $table->id('kuliner_id');
            // Required
            $table->string('nama_kuliner');
            $table->enum('jenis_kuliner', ['Makanan', 'Minuman', 'Jajanan'])->nullable();
            $table->text('sejarah_kuliner')->nullable();
            $table->string('gambar_kuliner', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuliners');
    }
};
