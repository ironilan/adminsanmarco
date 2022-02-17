<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    

    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class);
    }


    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }


    //solo para eccpac es linea
    public function linea()
    {
        return $this->belongsTo(Linea::class);
    }



    public function especificacions()
    {
        return $this->hasMany(Especificacion::class);
    }


    public function archivos()
    {
        return $this->hasMany(Archivo::class)->select('*', 
                DB::raw("CONCAT('".config('app.url')."/storage/', archivo_es) as archivo_es"),
                DB::raw("CONCAT('".config('app.url')."/storage/', archivo_en) as archivo_en"));
    }


    public function accesorios()
    {
        return $this->hasMany(Accesorio::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function imagenproductos()
    {
        return $this->hasMany(Imagenproducto::class);
    }
}
