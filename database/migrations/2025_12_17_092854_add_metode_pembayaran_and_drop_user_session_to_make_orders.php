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
        Schema::table('make_orders', function (Blueprint $table) {
            //
            $table->enum('metode_pembayaran', ['Gopay', 'QRIS'])->default('Gopay')->after('jenis_tiket');

            $table->dropColumn('user_session');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('make_orders', function (Blueprint $table) {
            //
            $table->dropColumn('metode_pembayaran');

            $table->string('user_session', 255)->nullable()->after('id');
        });
    }
};
