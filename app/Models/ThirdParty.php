<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\KategoriThirdParty;

class ThirdParty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategorithirdparty() {
        return $this->belongsTo(KategoriThirdParty::class, 'kategori_tp_id');
    }
}
