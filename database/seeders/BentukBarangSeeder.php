<?php

namespace Database\Seeders;

use App\Models\BentukBarang;
use App\Models\Barang;
use Illuminate\Database\Seeder;

class BentukBarangSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // BentukBarang::factory(2)
    //   ->create();
    BentukBarang::create([
      'kode' => 'CAIR',
      'nama' => 'Cair',
      'is_active' => 1
    ]);

    BentukBarang::create([
      'kode' => 'PDT',
      'nama' => 'Padat',
      'is_active' => 1
    ]);
  }
}
