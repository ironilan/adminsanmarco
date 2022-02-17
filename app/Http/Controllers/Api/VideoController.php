<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {
        
        $video = Video::wherePagina($request->pagina)->where('producto_id', $request->producto)->get();

      

        return response()->json($video,200);
    }
}
