<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incluye extends Model
{
    use HasFactory;

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
