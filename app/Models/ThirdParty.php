<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\KategoriThirdParty;
use App\Models\PhoneThirdParty;
use App\Models\EmailThirdParty;
use App\Models\AlamatThirdParty;

class ThirdParty extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategorithirdparty() {
        return $this->belongsTo(KategoriThirdParty::class, 'kategori_tp_id');
    }

    public function phonethirdparty(){
        return $this->hasMany(PhoneThirdParty::class);
    }
    public function emailthirdparty(){
        return $this->hasMany(EmailThirdParty::class);
    }
    public function alamatthirdparty(){
        return $this->hasMany(AlamatThirdParty::class);
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        static::deleting(function($thirdparty) { // before delete() method call this
             $thirdparty->phonethirdparty()->delete();
             $thirdparty->emailthirdparty()->delete();
             $thirdparty->alamatthirdparty()->delete();
             // do the rest of the cleanup...
        });
    }
}
