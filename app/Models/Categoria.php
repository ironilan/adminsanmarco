<?php

namespace App\Models;

use App\Models\Subcategoria;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categoria extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function subcategorias()
    {
        return $this->hasMany(Subcategoria::class)->select('*', DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"));
    }
}
