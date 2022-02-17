<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Imagenproducto;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MarcaController extends Controller
{
    public function index(Request $request)
    {
        
        $marcas_all = Marca::wherePage($request->page)->orWhere('page', 'todo')->get();

        $marcas = [];

        foreach ($marcas_all as $key => $value) {
            $marca = array(
                'id' => $value->id,
                'slug' => $value->slug,
                'page' => $value->page,
                'titulo_es' => $value->titulo_es,
                'titulo_en' => $value->titulo_en,
                'imagen' => Storage::url($value->imagen),
            );

            array_push($marcas, $marca);
        }

        return response()->json($marcas,200);
    }


    public function productos(Request $request, $slug)
    {
        $marca = Marca::whereSlug($slug)->first();

        $productos = Producto::where('marca_id', $marca->id)->get();

        $arrayProductos = [];

        foreach ($productos as $key => $value) {

            $imagenes = Imagenproducto::select(DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();

            $producto = array(
                'id' => $value->id,
                'estrellas' => $value->estrellas,
                'nuevo' => $value->nuevo,
                'page' => $value->page,
                'slug' => $value->slug,
                'categoria_es' => $value->categoria->titulo_es,
                'categoria_en' => $value->categoria->titulo_en,
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

        return response()->json($data,200);
    }
}
