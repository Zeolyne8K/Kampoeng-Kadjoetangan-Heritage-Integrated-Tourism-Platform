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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->string('nama_ticket', 100);
            $table->string('label_ticket', 255)->nullable()->default('Tiket masuk Kampoeng Kadjoetangan Heritage');
            $table->enum('jenis_ticket', ['Lokal', 'Mancanegara'])->default('Lokal');
            $table->integer('harga_ticket', false, true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
