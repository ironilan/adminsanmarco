<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Bannerinterna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        
        $banners_all = Banner::wherePage($request->page)->orWhere('page', 'todo')->get();

        $banners = [];

        foreach ($banners_all as $key => $value) {
            $banner = array(
                'id' => $value->id,
                'page' => $value->page,
                'titulo_es' => $value->titulo_es,
                'titulo_en' => $value->titulo_en,
                'subtitulo_es' => $value->subtitulo_es,
                'subtitulo_en' => $value->subtitulo_en,
                'imagen' => Storage::url($value->imagen),
            );

            array_push($banners, $banner);
        }

        return response()->json($banners,200);
    }


    public function bannerinterna(Request $request)
    {
        
        $banner = Bannerinterna::wherePage($request->page)->where('seccion', $request->seccion)->first();

       

  
        $banner = array(
            'id' => $banner->id,
            'page' => $banner->page,
            'seccion' => $banner->seccion,
            'titulo_es' => $banner->titulo_es,
            'titulo_en' => $banner->titulo_en,
            'imagen' => Storage::url($banner->imagen),
        );

       

        return response()->json($banner,200);
    }
}
