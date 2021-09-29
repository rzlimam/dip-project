<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\SatuanBarang;
use Illuminate\Database\Seeder;

class SatuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SatuanBarang::create([
            'kode' => 'LTR',
            'nama' => 'Liter',
        ]);

        SatuanBarang::create([
            'kode' => 'KG',
            'nama' => 'Kilogram',
        ]);

        SatuanBarang::create([
            'kode' => 'PCS',
            'nama' => 'Pieces',
        ]);

        SatuanBarang::create([
            'kode' => 'LBR',
            'nama' => 'Lembar',
        ]);
    }
}
