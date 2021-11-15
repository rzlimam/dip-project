<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\BentukBarang;
use App\Models\SatuanBarang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    // Barang::factory(5)
      // ->for(BentukBarang::factory())
      // ->for(SatuanBarang::factory())
      // ->create();
    Barang::create([
      'kode' => 'ALK',
      'name' => 'Alkohol',
      'satuanbarang_id' => 1,
      'bentukbarang_id' => 1,
      'is_active' => 1
    ]);

    Barang::create([
      'kode' => 'MTL',
      'name' => 'Methanol',
      'satuanbarang_id' => 1,
      'bentukbarang_id' => 1,
      'is_active' => 1
    ]);

    Barang::create([
      'kode' => 'PLAT',
      'name' => 'Plat',
      'satuanbarang_id' => 3,
      'bentukbarang_id' => 2,
      'is_active' => 1
    ]);
  }
}
