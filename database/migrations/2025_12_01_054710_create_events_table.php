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
        // Belum Selesai
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('nama_event', 100);
            // Rencana ganti ENUM
            $table->string('jenis_event', 100)->default('Acara Umum')->nullable();
            $table->string('gambar_event', 255)->nullable();
            $table->string('lokasi_event', 255)->default('Kampoeng Kadjoetangan Heritage')->nullable();
            $table->text('deskripsi_event')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
