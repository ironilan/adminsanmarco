<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Image;

class Nosotro extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Nosotro::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
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
            Trix::make('Descripción', 'descripcion_es')->hideFromIndex(),

            Image::make('Icono 1 (48x48px)', 'icon1')->disk('public')->disableDownload(), 
            Text::make('Titulo ícono 1', 'titulo_icon1_es')->hideFromIndex(),
            Textarea::make('Resumen ícono 1', 'resumen_icon1_es')->hideFromIndex(),

            Image::make('Icono 2 (48x48px)', 'icon2')->disk('public')->disableDownload()->hideFromIndex(), 
            Text::make('Titulo ícono 2', 'titulo_icon2_es')->hideFromIndex(),
            Textarea::make('Resumen ícono 2', 'resumen_icon2_es')->hideFromIndex(),

            Image::make('Icono 3 (48x48px)', 'icon3')->disk('public')->disableDownload()->hideFromIndex(), 
            Text::make('Titulo ícono 3', 'titulo_icon3_es')->hideFromIndex(),
            Textarea::make('Resumen ícono 3', 'resumen_icon3_es')->hideFromIndex(),

            Text::make('por que elegirnos', 'titulo_pqe_es')->hideFromIndex(),
            Textarea::make('Resumen por que elegirnos', 'resumen_pqe_es')->hideFromIndex(),
            Image::make('Imagen por que elegirnos (414x260px)', 'imagen_pqe_es')->disk('public')->disableDownload()->hideFromIndex(), 

            Text::make('Titulo mision', 'titulo_mision_es')->hideFromIndex(),
            Textarea::make('Resumen mision', 'resumen_mision_es')->hideFromIndex(),
            Image::make('Imagen mision (414x260px)', 'imagen_mision_es')->disk('public')->disableDownload()->hideFromIndex(), 

            Text::make('Titulo vision', 'titulo_vision_es')->hideFromIndex(),
            Textarea::make('Resumen vision', 'resumen_vision_es')->hideFromIndex(),
            Image::make('Imagen vision (414x260px)', 'imagen_vision_es')->disk('public')->disableDownload()->hideFromIndex(), 



            Heading::make('Datos del servicio Ingles'),
            Text::make('Titulo', 'titulo_en')->hideFromIndex()->hideFromIndex(),
            Trix::make('Descripción', 'descripcion_en')->hideFromIndex(),

             
            Text::make('Titulo ícono 1', 'titulo_icon1_en')->hideFromIndex(),
            Textarea::make('Resumen ícono 1', 'resumen_icon1_en')->hideFromIndex(),

            
            Text::make('Titulo ícono 2', 'titulo_icon2_en')->hideFromIndex(),
            Textarea::make('Resumen ícono 2', 'resumen_icon2_en')->hideFromIndex(),

            
            Text::make('Titulo ícono 3', 'titulo_icon3_en')->hideFromIndex(),
            Textarea::make('Resumen ícono 3', 'resumen_icon3_en')->hideFromIndex(),

            Text::make('por que elegirnos', 'titulo_pqe_en')->hideFromIndex(),
            Textarea::make('Resumen por que elegirnos', 'resumen_pqe_en')->hideFromIndex(),
            

            Text::make('Titulo mision', 'titulo_mision_en')->hideFromIndex(),
            Textarea::make('Resumen mision', 'resumen_mision_en')->hideFromIndex(),
            

            Text::make('Titulo vision', 'titulo_vision_en')->hideFromIndex(),
            Textarea::make('Resumen vision', 'resumen_vision_en')->hideFromIndex(),
            



            Heading::make('Datos en común'), 
            Image::make('Imagen 1289x655px', 'imagen1')->disk('public')->disableDownload()->hideFromIndex(), 
            Image::make('Imagen fondo 1920x464px', 'imagen_fondo')->disk('public')->disableDownload()->hideFromIndex(),

            Select::make('¿En qué página parecerá?','page')->options([
                'sanmarco' => 'San marco',
                'eccopac' => 'Eccopac'
            ]),
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

    public static function authorizedToCreate(Request $request)
    {
        return false;
    }

    public function authorizedToDelete(Request $request)
    {
        return false;
    }
}
