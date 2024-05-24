<?php

namespace Database\Seeders;

use App\Models\Cabang;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cabang::create([
            'nama_cabang' => 'IDN Jonggol Ikhwan',
            'kuota_tkj' => 2,
            'kuota_rpl' => 2,
            'kuota_dkv' => 2,
            'kuota_smp' => 2
        ]);
        Cabang::create([
            'nama_cabang' => 'IDN Jonggol Akhwat',
            'kuota_tkj' => null,
            'kuota_rpl' => 5,
            'kuota_dkv' => 5,
            'kuota_smp' => 3
        ]);
        Cabang::create([
            'nama_cabang' => 'IDN Sentul',
            'kuota_tkj' => 3,
            'kuota_rpl' => 3,
            'kuota_dkv' => 3,
            'kuota_smp' => 3
        ]);
    }
}
