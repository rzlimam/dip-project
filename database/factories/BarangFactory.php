<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\BentukBarang;
use App\Models\SatuanBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Barang::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $is_active = [true, false];

    return [
      'kode' => $this->faker->lexify('?????'),
      'name' => $this->faker->sentence(4),
      'satuanbarang_id' => SatuanBarang::all('id')->random(1)->first()->id,
      'bentukbarang_id' => BentukBarang::all('id')->random(1)->first()->id,
      'isActive' => $is_active[rand(0, 1)],
    ];
  }
}
