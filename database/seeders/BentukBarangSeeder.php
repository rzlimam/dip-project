<?php

namespace Database\Seeders;

use App\Models\BentukBarang;
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
    BentukBarang::factory()
      ->count(5)
      ->create();
  }
}
