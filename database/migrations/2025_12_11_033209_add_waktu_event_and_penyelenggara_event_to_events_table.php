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
        Schema::table('events', function (Blueprint $table) {
            //
            $table->date('waktu_event')->nullable()->after('jenis_event');
            $table->string('penyelenggara_event', 100)->default('Panitia Kampoeng Kadjoetangan Heritage')->after('waktu_event');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            //
            $table->dropColumn('waktu_event');
            $table->dropColumn('penyelenggara_event');
        });
    }
};
