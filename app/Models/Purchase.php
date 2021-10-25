<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function third_party()
    {
        return $this->belongsTo(ThirdParty::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
