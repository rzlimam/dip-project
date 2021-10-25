<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Role;
use App\Models\SatuanBarang;
use App\Models\User;
use App\Models\KategoriThirdParty;
use App\Models\Purchase;
use App\Models\ThirdParty;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'user'
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10)
        ]);

        KategoriThirdParty::create([
            'name' => 'Supplier'
        ]);

        KategoriThirdParty::create([
            'name' => 'Customer'
        ]);

        ThirdParty::create([
            'name' => 'PT. ABC',
            'kategori_tp_id' => 1
        ]);

        ThirdParty::create([
            'name' => 'PT. BCD',
            'kategori_tp_id' => 2
        ]);

        $this->call(SatuanBarangSeeder::class);
        $this->call(BentukBarangSeeder::class);
        $this->call(BarangSeeder::class);

        Purchase::create([
            'third_party_id' => 1,
            'date' => now(),
            'faktur' => '123',
            'total_price' => 1000000,
            'created_by' => 1
        ]);
    }
}
