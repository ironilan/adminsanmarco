<?php

namespace App\Imports;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Libro;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

//class LibroImport implements ToModel, WithHeadingRow
class LibroImport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    //public function model(array $row)
    public function collection(Collection $rows)
    {
        //dd($rows);
        foreach ($rows as $row) 
        {

            



            $libro = Libro::create([
                'titulo'        => $row['titulo'],
                'subtitulo'     => $row['subtitulo'],
                'slug'          =>  Str::slug($row['titulo'],'-'),
                'resumen'       => $row['resumen'],
                'estrellas'     => $row['estrellas'],
                'stock'         => $row['stock'],
                'codigo'        => $row['codigo'],
                'isbn'          => $row['codigo'],
                'nro_edicion'   => $row['nro_edicion'],
                'peso'          => $row['peso'],
                'medidas'       => $row['medidas'],
                'presentacion'  => $row['presentacion'],
                'ano_pub'       => $row['ano_pub'],
                'num_paginas'       => $row['num_paginas'],
                'fecha_ingreso' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_ingreso'])),
                'imagen'        => $row['imagen'],
                'precio'        => $row['precio'],
                'descuento'     => $row['descuento'],
                'descripcion'   => $row['descripcion'],
                'editorial_id'  => $row['editorial'],
                'estado_id'     => $row['estado'],
            ]);

            if (!is_null($row['categorias'])) {
                $categorias = explode(',', $row['categorias']);
            
                for ($i=0; $i < count($categorias); $i++) { 
                    $libro->categorias()->attach($categorias[$i]);
                }
            }


            //verificamos si existe el autor            
            if (!is_null($row['autores'])) {
                $autores = explode(',', $row['autores']);


                for ($i=0; $i < count($autores); $i++) { 
                    $existeautor = Autor::find($autores[$i]);

                    if ($existeautor) {
                        $libro->autores()->attach($autores[$i]);
                    }
                    
                }
            }else{
                if (!is_null($row['autor1'])) {
                    $autor = new Autor;
                    $autor->nombre = $row['autor1'];
                    $autor->slug = Str::slug($row['autor1'], '-');
                    $autor->save();

                    $libro->autores()->attach($autor->id);
                }

                if (!is_null($row['autor2'])) {
                    $autor = new Autor;
                    $autor->nombre = $row['autor2'];
                    $autor->slug = Str::slug($row['autor2'], '-');
                    $autor->save();

                    $libro->autores()->attach($autor->id);
                }

                if (!is_null($row['autor3'])) {
                    $autor = new Autor;
                    $autor->nombre = $row['autor3'];
                    $autor->slug = Str::slug($row['autor3'], '-');
                    $autor->save();

                    $libro->autores()->attach($autor->id);
                }
            }

            



        }


        

        




         //return $libro;


    }
}
