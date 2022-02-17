<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Servicio;
use App\Models\Serviciosm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ServicioController extends Controller
{
    public function index(Request $request)
    {
       
        $servicios_all = Servicio::wherePage($request->page)->orWhere('page', 'todo')->get();

        $servicios = [];

        foreach ($servicios_all as $key => $value) {
            $servicio = array(
                'id' => $value->id,
                'page' => $value->page,
                'titulo_es' => $value->titulo_es,
                'titulo_en' => $value->titulo_en,
                'slug' => $value->slug,
                'imagen' => Storage::url($value->imagen),
            );

            array_push($servicios, $servicio);
        }

        return response()->json($servicios,200);
    }


    public function servicio(Request $request, $slug)
    {
       
        $servicio = Servicio::whereSlug($slug)->select('*', DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->first();

        

        return response()->json($servicio,200);
    }





    //servicios solo de sanmarco
    public function servicios_sm()
    {
        $servicio = Serviciosm::find(1);

        $servicio = array(
            'id' => $servicio->id,
            'titulo_es' => $servicio->titulo_es,
            'descripcion_es' => $servicio->descripcion_es,
            'imagen1' => Storage::url($servicio->imagen1),
            'imagen2' => Storage::url($servicio->imagen2),
            'imagen_fondo' => Storage::url($servicio->imagen_fondo),
            'icon1' => Storage::url($servicio->icon1),
            'titulo_icon1_es' => $servicio->titulo_icon1_es,
            'resumen_icon1_es' => $servicio->resumen_icon1_es,
            'icon2' => Storage::url($servicio->icon2),
            'titulo_icon2_es' => $servicio->titulo_icon2_es,
            'resumen_icon2_es' => $servicio->resumen_icon2_es,
            'icon3' => Storage::url($servicio->icon3),
            'titulo_icon3_es' => $servicio->titulo_icon3_es,
            'resumen_icon3_es' => $servicio->resumen_icon3_es,
            'servicios' => $servicio->serviciodetallesms
        );

        return response()->json($servicio ,200);
    }
}
