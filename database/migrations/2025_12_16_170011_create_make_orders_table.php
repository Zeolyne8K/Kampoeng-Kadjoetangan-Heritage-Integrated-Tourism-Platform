<?php

use Carbon\Carbon;
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
        Schema::create('make_orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_session', 255);
            $table->string('nama_awalan', 100);
            $table->string('email', 255)->nullable();
            $table->integer('jumlah_tiket', false, true);
            $table->integer('total_harga', false, true);
            $table->date('tanggal_berlaku')->nullable();
            $table->date('tanggal_kadaluarsa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('make_orders');
    }
};
