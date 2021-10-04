<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ThirdParty;

class PhoneThirdParty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function thirdparty(){
        return $this->belongTo(ThirdParty::class);
    }
}
