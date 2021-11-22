<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
  use HasFactory;

  // protected $guarded = ['id'];
  protected $hidden = ['id'];

  public function barang()
  {
    return $this->belongsTo(Barang::class, 'barang_id');
  }

  public function purchase()
  {
    return $this->belongsTo(Sale::class);
  }
}
