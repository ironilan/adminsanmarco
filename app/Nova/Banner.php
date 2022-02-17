<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Banner extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Banner::class;

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
            Text::make('Subtitulo', 'subtitulo_es')->hideFromIndex(),

            Heading::make('Datos del servicio Inglés'),
            Text::make('Titulo', 'titulo_en')->hideFromIndex(),
            Text::make('Subtitulo', 'subtitulo_en')->hideFromIndex(),
            
            Heading::make('Datos en común'),  
            Select::make('¿En qué página aparecerá?','page')->options([
                'sanmarco' => 'San marco',
                'eccopac' => 'Eccopac'
            ]),    
            Image::make('Imagen (SM 1920x500px) (EC 1920x740px) ', 'imagen')->disk('public')->disableDownload(),
            
            
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
