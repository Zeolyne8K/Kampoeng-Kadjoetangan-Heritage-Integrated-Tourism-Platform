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
        Schema::create('awards', function (Blueprint $table) {
            $table->id('award_id');
            $table->string('nama_award', 255);
            $table->string('jenis_award', 100)->default('Penghargaan Khusus')->nullable();
            $table->string('gambar_award', 255)->nullable();
            $table->date('tanggal_penerimaan_award')->nullable();
            $table->text('deskripsi_award')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};
