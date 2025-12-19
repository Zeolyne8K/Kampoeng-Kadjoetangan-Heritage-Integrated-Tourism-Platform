<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Gopay;
use App\Models\QRISCodes;
use App\Models\Ticket;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('en_US');

        // Create admin user for testing
        Admin::create([
            'username' => 'admin',
            'email' => 'admin@kajoetangan.com',
            'password' => bcrypt('admin123'),
            'is_active' => true,
            'role' => 'admin',
        ]);

        QRISCodes::create([
            'nmid' => $faker->sentences(1, true),
            'nama_merchant' => 'Admin Kampoeng Kadjoetangan Heritage',
            'qris_image' => 'qris-codes/qr-code-dummmie.webp'
        ]);
    }
}
