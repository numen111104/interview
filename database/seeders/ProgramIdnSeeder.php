<?php

namespace Database\Seeders;

use App\Models\ProgramIdn;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProgramIdnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProgramIdn::insert([
            [
                'cabang_idn' => 1, // IDN Jonggol Ikhwan
                'nama_program' => 'SMP',
            ],
            [
                'cabang_idn' => 1, // IDN Jonggol Ikhwan
                'nama_program' => 'SMK TKJ',
            ],
            [
                'cabang_idn' => 1, // IDN Jonggol Ikhwan
                'nama_program' => 'SMK RPL',
            ],
            [
                'cabang_idn' => 1, // IDN Jonggol Ikhwan
                'nama_program' => 'SMK DKV',
            ],
            [
                'cabang_idn' => 2, // IDN Jonggol Akhwat
                'nama_program' => 'SMP',
            ],
            // IDN Jonggol Akhwat tidak memiliki SMK TKJ
            [
                'cabang_idn' => 2, // IDN Jonggol Akhwat
                'nama_program' => 'SMK RPL',
            ],
            [
                'cabang_idn' => 2, // IDN Jonggol Akhwat
                'nama_program' => 'SMK DKV',
            ],
            [
                'cabang_idn' => 3, // IDN Sentul
                'nama_program' => 'SMP',
            ],
            [
                'cabang_idn' => 3, // IDN Sentul
                'nama_program' => 'SMK TKJ',
            ],
            [
                'cabang_idn' => 3, // IDN Sentul
                'nama_program' => 'SMK RPL',
            ],
            [
                'cabang_idn' => 3, // IDN Sentul
                'nama_program' => 'SMK DKV',
            ],
        ]);
    }
}
