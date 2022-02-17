<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Nosotro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NosotrosController extends Controller
{
    public function nosotros(Request $request)
    {
        
        $nosotros= Nosotro::select('*',
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen1) as imagen1"),
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen2) as imagen2"),
            DB::raw("CONCAT('".config('app.url')."/storage/', icon1) as icon1"),
            DB::raw("CONCAT('".config('app.url')."/storage/', icon2) as icon2"),
            DB::raw("CONCAT('".config('app.url')."/storage/', icon3) as icon3"),
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen_pqe_es) as imagen_pqe_es"),
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen_fondo) as imagen_fondo"),
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen_mision_es) as imagen_mision_es"),
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen_vision_es  ) as imagen_vision_es "),
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen_mision_es) as imagen_mision_es"),
            DB::raw("CONCAT('".config('app.url')."/storage/', imagen_mision_es) as imagen_mision_es")
        )->wherePage($request->page)->first();

        

        

        return response()->json($nosotros,200);
    }
}
