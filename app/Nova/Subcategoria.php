<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Subcategoria extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Subcategoria::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'nombre_es';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'nombre_es',
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
            BelongsTo::make('Categoria', 'categoria', 'App\Nova\Categoria'), 
            Heading::make('Datos del servicio Español'),
            Text::make('Nombre', 'nombre_es'),
            Textarea::make('Resumen', 'resumen_es'),
            Slug::make('Slug')->from('nombre_es')->separator('-'),

            Heading::make('Datos del servicio Ingles'),
            Text::make('Nombre', 'nombre_en')->hideFromIndex(),
            Textarea::make('Resumen', 'resumen_es'),

            Heading::make('Datos en común'), 
            Select::make('¿En qué página parecerá?','pagina')->options([
                'sanmarco' => 'San marco',
                'eccopac' => 'Eccopac',
                'todo' => 'Ambas páginas',
            ]), 
            
            Image::make('Imagen 290x218px', 'imagen')->disk('public')->disableDownload()->hideFromIndex(),

            HasMany::make('Productos'),
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
}
