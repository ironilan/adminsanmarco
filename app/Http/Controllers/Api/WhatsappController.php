<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Whatsapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WhatsappController extends Controller
{
    public function whatsapp(Request $request)
    {
        
        $marcas = Whatsapp::wherePage($request->page)->select("*", DB::raw("CONCAT('".config('app.url')."/storage/', imagen) as imagen"))->get();

        
        return response()->json($marcas,200);
    }
}
