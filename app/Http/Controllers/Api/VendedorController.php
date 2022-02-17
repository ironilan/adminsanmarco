<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vendedor;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    public function index(Request $request)
    {
        
        $vendedores = Vendedor::wherePagina($request->pagina)->orWhere('pagina', 'todo')->get();

      

        return response()->json($vendedores,200);
    }
}
