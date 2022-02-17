<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha_post' => 'date'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
