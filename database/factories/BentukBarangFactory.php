<?php

namespace Database\Factories;

use App\Models\BentukBarang;
use Illuminate\Database\Eloquent\Factories\Factory;

class BentukBarangFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = BentukBarang::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'id' => $this->faker->unique()->randomNumber(),
      'kode' => $this->faker->lexify('???'),
      'nama' => $this->faker->word(),
    ];
  }
}
