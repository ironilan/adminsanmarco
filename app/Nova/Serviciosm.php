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
use Laravel\Nova\Fields\HasMany;

class Serviciosm extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Serviciosm::class;

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

            

            Heading::make('Datos en común'), 
            Image::make('Imagen 1289x655px', 'imagen1')->disk('public')->disableDownload()->hideFromIndex(), 
            Image::make('Imagen fondo 1920x464px', 'imagen_fondo')->disk('public')->disableDownload()->hideFromIndex(),

            HasMany::make("Servicios", "serviciodetallesms", "App\Nova\Serviciodetallesm"),
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
