<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Http\Requests\NovaRequest;

class Bannerinterna extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Bannerinterna::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'titulo_es';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'titulo_es',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make(__('ID'), 'id')->sortable(),
            Heading::make('Datos del servicio Español'),
            Text::make('Titulo', 'titulo_es'),

            Heading::make('Datos del servicio Inglés'),
            Text::make('Titulo', 'titulo_en')->hideFromIndex(),
            
            Heading::make('Datos en común'),  
            Select::make('¿En qué página aparecerá?','page')->options([
                'sanmarco' => 'San marco',
                'eccopac' => 'Eccopac'
            ]), 
            Select::make('¿En qué sección aparecerá?','seccion')->options([
                'marcas' => 'Marcas',
                'nosotros' => 'Nosotros',
                'productos' => 'Producto',
                'contacto' => 'Contacto'
            ]),    
            Image::make('Imagen 1098x238px', 'imagen')->disk('public')->disableDownload(),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }



    // public static function authorizedToCreate(Request $request)
    // {
    //     return false;
    // }

    // public function authorizedToDelete(Request $request)
    // {
    //     return false;
    // }
}
