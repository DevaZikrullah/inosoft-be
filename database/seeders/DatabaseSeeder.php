<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Kendaraan::factory()->create([
            'tahun_keluaran' => '2020',
            'warna' => 'hitam',
            'harga' => 2000,
            'tipe_kendaraan' =>'is_mobil',
            'mesin' => "v12",
            'kapasitas_penumpang' => 4,
            'tipe' => 'hatchback',
            'stok' => 5
        ]);

        Kendaraan::factory()->create([
            'tahun_keluaran' => '2020',
            'warna' => 'hitam',
            'harga' => 2000,
            'tipe_kendaraan' =>'is_motor',
            'mesin' => "B",
            'tipe_suspensi' => "Telescopic Up Side Down",
            'tipe_transmisi' => 'manual',
            'stok' => 5
        ]);

        Kendaraan::factory()->create([
            'tahun_keluaran' => '2020',
            'warna' => 'hitam',
            'harga' => 2000,
            'tipe_kendaraan' =>'is_mobil',
            'mesin' => "v8",
            'kapasitas_penumpang' => 4,
            'tipe' => 'APV',
            'stok' => 5
        ]);

        Kendaraan::factory()->create([
            'tahun_keluaran' => '2020',
            'warna' => 'hitam',
            'harga' => 2000,
            'tipe_kendaraan' =>'is_motor',
            'mesin' => "B",
            'tipe_suspensi' => "Telescopic Up Side Down",
            'tipe_transmisi' => 'kopling',
            'stok' => 5
        ]);
    }
}
