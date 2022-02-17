<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Accesorio;
use App\Models\Especificacion;
use App\Models\Imagenproducto;
use App\Models\Producto;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        
        $productos_all = Producto::wherePagina($request->pagina)
                            ->orWhere('pagina', 'todo')
                            ->latest('id')->get();

        $productos = [];

        foreach ($productos_all as $key => $value) {

            $imagenes = Imagenproducto::select(DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();

            $producto = array(
                'id' => $value->id,
                'estrellas' => $value->estrellas,
                'pagina' => $value->pagina,
                'nuevo' => $value->nuevo,
                'slug' => $value->slug,
                'categoria_es' => $value->categoria->nombre_es,
                'categoria_en' => $value->categoria->nombre_en,
                'subcategoria_es' => $value->subcategoria->nombre_es,
                'subcategoria_en' => $value->subcategoria->nombre_en,
                'titulo_es' => $value->titulo_es,
                'titulo_en' => $value->titulo_en,
                'subtitulo_es' => $value->subtitulo_es,
                'subtitulo_en' => $value->subtitulo_en,
                'imagen' => Storage::url($value->imagen),
                'imagenes' => $imagenes,
                'archivos' => $value->archivos,
            );

            array_push($productos, $producto);
        }


        $data = collect($productos)->paginate(20);


        //return $data;

        return response()->json($data,200);
    }



    public function masVendidosNuevosLLegados(Request $request)
    {
        
        $productos_all = Producto::wherePagina($request->pagina)
                            
                            ->where($request->tipo, 'si')
                            ->orWhere('pagina', 'todo')
                            ->latest('id')->take(10)->get();

        $productos = [];

        foreach ($productos_all as $key => $value) {

            $imagenes = Imagenproducto::select(DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();

            $producto = array(
                'id' => $value->id,
                'estrellas' => $value->estrellas,
                'pagina' => $value->pagina,
                'nuevo' => $value->nuevo,
                'mas_vendido' => $value->mas_vendido,
                'por_llegar' => $value->por_llegar,
                'slug' => $value->slug,
                'categoria_es' => $value->categoria->nombre_es,
                'categoria_en' => $value->categoria->nombre_en,
                'subcategoria_es' => $value->subcategoria->nombre_es,
                'subcategoria_en' => $value->subcategoria->nombre_en,
                'titulo_es' => $value->titulo_es,
                'titulo_en' => $value->titulo_en,
                'subtitulo_es' => $value->subtitulo_es,
                'subtitulo_en' => $value->subtitulo_en,
                'imagen' => Storage::url($value->imagen),
                'imagenes' => $imagenes
            );

            array_push($productos, $producto);
        }


        //$data = collect($productos)->paginate(20);


        //return $data;

        return response()->json($productos,200);
    }


    // public function productos(Request $request, $slug)
    // {
    //     $servicio = Servicio::whereSlug($slug)->first();

    //     $productos = Producto::where('servicio_id', $servicio->id)->get();

    //     $arrayProductos = [];

    //     foreach ($productos as $key => $value) {

    //         $imagenes = Imagenproducto::select(DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();

    //         $producto = array(
    //             'id' => $value->id,
    //             'estrellas' => $value->estrellas,
    //             'nuevo' => $value->nuevo,
    //             'page' => $value->page,
    //             'slug' => $value->slug,
    //             'servicio_es' => $value->servicio->titulo_es,
    //             'servicio_en' => $value->servicio->titulo_en,
    //             'titulo_es' => $value->titulo_es,
    //             'titulo_en' => $value->titulo_en,
    //             'subtitulo_es' => $value->subtitulo_es,
    //             'subtitulo_en' => $value->subtitulo_en,
    //             'imagen' => Storage::url($value->imagen),
    //             'imagenes' => $imagenes
    //         );

    //         array_push($arrayProductos, $producto);
    //     }


    //     //$data = $this->paginate($arrayProductos);

    //     $data = collect($arrayProductos)->paginate(20);

    //     return response()->json($data,200);
    // }




    public function producto(Request $request, $slug)
    {
        

        $value = Producto::whereSlug($slug)->first();

       

        $imagenes = Imagenproducto::select(DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();
        $especificaciones = Especificacion::get();
        $accesorios = Accesorio::select('*',DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))
                                ->where('producto_id', $value->id)->get();

        $relacionados = Producto::select('*',DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))
                                ->where('categoria_id', $value->categoria_id)
                                ->where('pagina', 'sanmarco')
                                ->where('id', '<>', $value->id)
                                ->latest('id')
                                ->take(5)->get();

        $producto = array(
            'id' => $value->id,
            'marca' => $value->marca->imagen? Storage::url($value->marca->imagen) : '',
            'estrellas' => $value->estrellas,
            'nuevo' => $value->nuevo,
            'page' => $value->page,
            'slug' => $value->slug,
            'categoria_es' => $value->categoria->nombre_es,
            'categoria_en' => $value->categoria->nombre_en,
            'subcategoria_es' => $value->subcategoria->nombre_es,
            'subcategoria_en' => $value->subcategoria->nombre_en,
            'pdf_es' => $value->pdf_es ? Storage::url($value->pdf_es) : null,
            'pdf_en' => $value->pdf_es ? Storage::url($value->pdf_en) : null,
            'titulo_es' => $value->titulo_es,
            'titulo_en' => $value->titulo_en,
            'video_es' => $value->video_es,
            'video_en' => $value->video_en,
            'resumen_es' => $value->resumen_es,
            'resumen_en' => $value->resumen_en,
            'subtitulo_es' => $value->subtitulo_es,
            'subtitulo_en' => $value->subtitulo_en,
            'descripcion_es' => $value->descripcion_es,
            'descripcion_en' => $value->descripcion_en,
            'imagen' => Storage::url($value->imagen),
            'imagenes' => $imagenes,
            'especificaciones' => $especificaciones,
            'relacionados' => $relacionados,
            'archivos' => $value->archivos,
            'videos' => $value->videos,
            'accesorios' => $accesorios
        );

        

       

        return response()->json($producto,200);
    }


    public function buscar_productos(Request $request)
    {
        

        $productos = Producto::where('titulo_es', 'like', '%'.$request->criterio.'%')
                                ->orWhere('titulo_en', 'like', '%'.$request->criterio.'%')
                                ->where('categoria_id', $request->categoria)
                                ->where('pagina', 'sanmarco')
                                ->get();

        $arrayProductos = [];

        foreach ($productos as $key => $value) {

            $imagenes = Imagenproducto::select(DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();

            $producto = array(
                'id' => $value->id,
                'estrellas' => $value->estrellas,
                'nuevo' => $value->nuevo,
                'pagina' => $value->pagina,
                'slug' => $value->slug,
                'categoria_es' => $value->categoria->nombre_es,
                'categoria_en' => $value->categoria->nombre_en,
                'subcategoria_es' => $value->subcategoria->nombre_es,
                'subcategoria_en' => $value->subcategoria->nombre_en,
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

        $data = collect($arrayProductos)->paginate(1);

        return response()->json($data,200);
    }



    
}
