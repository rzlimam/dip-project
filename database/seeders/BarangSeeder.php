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
    Barang::factory(5)
      // ->for(BentukBarang::factory())
      // ->for(SatuanBarang::factory())
      ->create();
  }
}
