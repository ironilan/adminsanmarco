<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

     public function getRouteKeyName()
    {
        return 'slug';
    }

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function incluyes()
    {
        return $this->hasMany(Incluye::class);
    }

    public function galerias()
    {
        return $this->hasMany(Galeria::class);
    }
    
    public function archivos()
    {
        return $this->hasMany(Archivo::class);
    }
}
