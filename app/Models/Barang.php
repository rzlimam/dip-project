<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\SatuanBarang;
use App\Models\BentukBarang;

class Barang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['kode', 'name', 'satuanbarang_id', 'bentukbarang_id', 'isActive'];

    public function satuanbarang()
    {
        return $this->belongsTo(SatuanBarang::class);
    }

    public function bentukbarang()
    {
        return $this->belongsTo(BentukBarang::class);
    }
}
