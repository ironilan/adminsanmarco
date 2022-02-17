<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Subcategoria extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function productos()
    {
        return $this->hasMany(Producto::class)->select('*', DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"));
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
