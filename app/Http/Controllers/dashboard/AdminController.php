<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Imports\LibroImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function cargar()
    {
        return view('dashboard.cargar');
    }


    public function import_categorias(Request $request)
    {
        $file = $request->file('file');

        Excel::import(new LibroImport, $file);


        return back()->with('message', 'se ha importado con exito');
    }
}
