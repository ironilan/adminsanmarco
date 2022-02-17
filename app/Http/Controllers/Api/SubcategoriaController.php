<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Imagenproducto;
use App\Models\Producto;
use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SubcategoriaController extends Controller
{
    public function listaProductos(Request $request, $slug)
    {
        $subcategoria = Subcategoria::whereSlug($slug)->first();



        $productos = Producto::where('subcategoria_id', $subcategoria->id)->get();

        $arrayProductos = [];

        foreach ($productos as $key => $value) {

            $imagenes = Imagenproducto::select(DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();

            $producto = array(
                'id' => $value->id,
                'estrellas' => $value->estrellas,
                'nuevo' => $value->nuevo,
                'pagina' => $value->pagina,
                'slug' => $value->slug,
                'subcategoria_es' => $value->subcategoria->titulo_es,
                'subcategoria_en' => $value->subcategoria->titulo_en,
                'titulo_es' => $value->titulo_es,
                'titulo_en' => $value->titulo_en,
                'subtitulo_es' => $value->subtitulo_es,
                'subtitulo_en' => $value->subtitulo_en,
                'imagen' => Storage::url($value->imagen),
                'imagenes' => $imagenes
            );

            array_push($arrayProductos, $producto);
        }


        //$data = $this->paginate($arrayProductos);

        $data = collect($arrayProductos)->paginate(20);

         

        
        return response()->json($data ,200);
        
    }
}
