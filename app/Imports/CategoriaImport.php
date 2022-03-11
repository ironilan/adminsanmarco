<?php

namespace App\Imports;

use App\Models\Categoria;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LibroImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {

            
            $categoria = Categoria::create([
                'nombre_es'     => $row['nombre_es'],
                'tipo'          => $row['tipo'],
                'page'          => $row['page'],
                'slug'          =>  Str::slug($row['nombre_es'],'-'),
                'resumen_es'    => $row['resumen_es'],                
                'imagen'        => $row['imagen'],
                'nombre_en'     => $row['nombre_en'],
                'resumen_es'    => $row['resumen_es']
            ]);

             
        }

    }
}
