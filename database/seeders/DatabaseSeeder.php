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
