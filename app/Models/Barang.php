<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Http\Controllers\SatuanBarang;
use App\Http\Controllers\BentukBarang;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function satuanbarang(){
        return $this->hasMany(SatuanBarang::class);
    }

    public function bentukbarang(){
        return $this->hasMany(BentukBarang::class);
    }
}
