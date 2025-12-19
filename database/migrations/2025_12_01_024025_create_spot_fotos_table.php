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
        Schema::create('spot_fotos', function (Blueprint $table) {
            $table->id('spot_foto_id');
            $table->string('nama_spot_foto', 100);
            $table->enum('jenis_spot_foto', ['Jalanan', 'Rumah'])->nullable();
            $table->string('gambar_spot_foto', 255)->nullable();
            $table->text('deskripsi_spot_foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spot_fotos');
    }
};
