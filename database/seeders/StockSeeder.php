<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'barang_id' => 1,
            'qty' => 100
        ]);

        Stock::create([
            'barang_id' => 2,
            'qty' => 100
        ]);

        Stock::create([
            'barang_id' => 3,
            'qty' => 100
        ]);
    }
}
