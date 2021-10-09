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

  public function kategori()
  {
    return $this->belongsTo(KategoriThirdParty::class, 'kategori_tp_id');
  }

  public function phones()
  {
    return $this->hasMany(PhoneThirdParty::class, 'third_party_id');
  }

  public function emails()
  {
    return $this->hasMany(EmailThirdParty::class, 'third_party_id');
  }

  public function alamats()
  {
    return $this->hasMany(AlamatThirdParty::class, 'third_party_id');
  }

  // this is a recommended way to declare event handlers
  public static function boot()
  {
    parent::boot();

    static::deleting(function ($thirdparty) { // before delete() method call this
      $thirdparty->phones()->delete();
      $thirdparty->emails()->delete();
      $thirdparty->alamats()->delete();
      // do the rest of the cleanup...
    });
  }
}
