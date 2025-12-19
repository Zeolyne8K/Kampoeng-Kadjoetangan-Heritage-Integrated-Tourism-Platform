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
        Schema::table('kuliners', function (Blueprint $table) {
            //
            $table->text('deskripsi_kuliner')->nullable()->after('jenis_kuliner');
            $table->text('fakta_unik_kuliner')->nullable()->after('sejarah_kuliner');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kuliners', function (Blueprint $table) {
            //
            $table->dropColumn('deskripsi_kuliner');
            $table->dropColumn('fakta_unik_kuliner');
        });
    }
};
