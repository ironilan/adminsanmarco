<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request, $pagina)
    {
        //$page = 2;
        $post_all = Post::wherePagina($pagina)->orWhere('pagina', 'todo')->latest('id')->get();

        $posts = [];

        foreach ($post_all as $key => $value) {
            $post = array(
                'id' => $value->id,
                'autor' => $value->autor,
                'avatar' => Storage::url($value->avatar),
                'categoria_es' => $value->categoria->nombre_es,
                'categoria_en' => $value->categoria->nombre_en,
                'slug' => $value->slug,
                'pagina' => $value->pagina,
                'titulo_es' => $value->titulo_es,
                'resumen_es' => $value->resumen_es,
                'descripcion_es' => $value->descripcion_es,
                'fecha_post' => $value->fecha_post,

                'titulo_en' => $value->titulo_en,
                'resumen_en' => $value->resumen_en,
                'descripcion_en' => $value->descripcion_en,
                'fecha_post' => $value->fecha_post,
                'imagen' => Storage::url($value->imagen),
            );

            array_push($posts, $post);
        }


        $data = collect($posts)->paginate(10);

        return response()->json($data,200);
    }


    public function posts_recientes(Request $request)
    {
        
        $post_all = Post::wherePagina($request->pagina)->orWhere('pagina', 'todo')->latest('id')->take(5)->get();

        $posts = [];

        foreach ($post_all as $key => $value) {
            $post = array(
                'id' => $value->id,
                'autor' => $value->autor,
                'avatar' => Storage::url($value->avatar),
                'categoria_es' => $value->categoria->nombre_es,
                'categoria_en' => $value->categoria->nombre_en,
                'slug' => $value->slug,
                'page' => $value->page,
                'titulo_es' => $value->titulo_es,
                'resumen_es' => $value->resumen_es,
                'descripcion_es' => $value->descripcion_es,
                'fecha_post' => $value->fecha_post,

                'titulo_en' => $value->titulo_en,
                'resumen_en' => $value->resumen_en,
                'descripcion_en' => $value->descripcion_en,
                'fecha_post' => $value->fecha_post,
                'imagen' => Storage::url($value->imagen),
            );

            array_push($posts, $post);
        }

        return response()->json($posts,200);
    }


    public function post(Request $request, $slug)
    {
        
        $value = Post::whereSlug($slug)->first();
        $post =[];

        if ($value) {
            $post = array(
                'id' => $value->id,
                'autor' => $value->autor,
                'avatar' => Storage::url($value->avatar),
                'categoria_es' => $value->categoria->nombre_es,
                'categoria_en' => $value->categoria->nombre_en,
                'slug' => $value->slug,
                'pagina' => $value->pagina,
                'titulo_es' => $value->titulo_es,
                'resumen_es' => $value->resumen_es,
                'descripcion_es' => $value->descripcion_es,
                'fecha_post' => $value->fecha_post,

                'titulo_en' => $value->titulo_en,
                'resumen_en' => $value->resumen_en,
                'descripcion_en' => $value->descripcion_en,
                'fecha_post' => $value->fecha_post,
                'imagen' => Storage::url($value->imagen),
            );

            return response()->json($post,200);
        }

        return response()->json($post,200);
        
    }
}
