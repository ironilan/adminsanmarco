<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        
        $categorias_all = Categoria::wherePage($request->page)
                            //->orWhere('page', 'todo')
                            ->where('tipo', 'producto')
                            ->get();

        $categorias = [];

        foreach ($categorias_all as $key => $value) {
            $banner = array(
                'id' => $value->id,
                'page' => $value->page,
                'slug' => $value->slug,
                'nombre_es' => $value->nombre_es,
                'nombre_en' => $value->nombre_en,
                'resumen_es' => $value->resumen_es,
                'resumen_en' => $value->resumen_en,
                'imagen' => Storage::url($value->imagen),
                'subcategorias' => $value->subcategorias
            );

            array_push($categorias, $banner);
        }

        return response()->json($categorias,200);
    }


    public function listaSubcategorias(Request $request, $slug)
    {
        $categoria = Categoria::whereSlug($slug)->first();

        $subcategorias = [
            'categoria_es' => $categoria->nombre_es,
            'categoria_en' => $categoria->nombre_en,
            'subcategorias' => $categoria->subcategorias
        ];

        

        
        return response()->json($subcategorias ,200);
        
    }


    /**
     * Eccopac
     */

    // public function categoriasProductos(Request $request, $id)
    // {
    //     $productos = Producto::wherePagina('eccopac')->where('categoria_id', $id)->orWhere('pagina', 'todo')->paginate(1);
    //     return response()->json($productos, 200);
    // }
}
