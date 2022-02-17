<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Serviciosm extends Model
{
    use HasFactory;



    public function serviciodetallesms()
    {
        return $this->hasMany(Serviciodetallesm::class)->select('*',
                DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"));
    }
}
