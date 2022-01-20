<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Inicio extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Inicio::class;

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
            Heading::make('Sección 1'),
            Text::make('Texto 1', 'texto_1'),
            Textarea::make('Texto 2', 'texto_2')->hideFromIndex(),

            Text::make('Caracteristica 1', 'texto_car_1')->hideFromIndex(),
            Image::make('Ícono 1', 'icon_car_1')->disk('public')->disableDownload()->hideFromIndex(),
            Image::make('Imagen 1', 'imagen_car_1')->disk('public')->disableDownload()->hideFromIndex(),

            Text::make('Caracteristica 2', 'texto_car_2')->hideFromIndex(),
            Image::make('Ícono 2', 'icon_car_2')->disk('public')->disableDownload()->hideFromIndex(),
            Image::make('Imagen 2', 'imagen_car_2')->disk('public')->disableDownload()->hideFromIndex(),

            Text::make('Caracteristica 3', 'texto_car_3')->hideFromIndex(),
            Image::make('Ícono 3', 'icon_car_3')->disk('public')->disableDownload()->hideFromIndex(),
            Image::make('Imagen 3', 'imagen_car_3')->disk('public')->disableDownload()->hideFromIndex(),

            Text::make('Caracteristica 4', 'texto_car_4')->hideFromIndex(),
            Image::make('Ícono 4', 'icon_car_4')->disk('public')->disableDownload()->hideFromIndex(),
            Image::make('Imagen 4', 'imagen_car_4')->disk('public')->disableDownload()->hideFromIndex(),

            
            Heading::make('Sección 2: destino popular')->hideFromIndex(),
            Text::make('Título', 'titulo_destino_popular')->hideFromIndex(),
            Text::make('Subtítulo', 'subtitulo_destino_popular')->hideFromIndex(),
            Textarea::make('Resumen', 'resumen_destino_popular')->hideFromIndex(),
            Text::make('Link', 'link')->hideFromIndex(),
            Image::make('Imagen', 'imagen_destino_popular')->disk('public')->disableDownload()->hideFromIndex(),

           
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
