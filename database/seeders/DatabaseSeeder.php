<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Role;
use App\Models\SatuanBarang;
use App\Models\User;

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
            'remember_token' => Str::random(10),
        ]);

        SatuanBarang::create([
            'kode_satuan' => 'LTR',
            'nama_satuan' => 'Liter',
            'isActive' => true,
        ]);

        SatuanBarang::create([
            'kode_satuan' => 'KG',
            'nama_satuan' => 'Kilogram',
            'isActive' => true,
        ]);

        SatuanBarang::create([
            'kode_satuan' => 'PCS',
            'nama_satuan' => 'Pieces',
            'isActive' => true,
        ]);

        SatuanBarang::create([
            'kode_satuan' => 'LBR',
            'nama_satuan' => 'Lembar',
            'isActive' => true,
        ]);
    }
}
