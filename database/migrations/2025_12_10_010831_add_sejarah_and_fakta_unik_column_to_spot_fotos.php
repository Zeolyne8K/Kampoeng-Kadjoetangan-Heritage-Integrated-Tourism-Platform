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
        Schema::table('spot_fotos', function (Blueprint $table) {
            //
            $table->text('sejarah_spot_foto')->nullable()->after('deskripsi_spot_foto');
            $table->text('fakta_unik_spot_foto')->nullable()->after('sejarah_spot_foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spot_fotos', function (Blueprint $table) {
            //
            $table->dropColumn('sejarah_spot_foto');
            $table->dropColumn('fakta_unik_spot_foto');
        });
    }
};
