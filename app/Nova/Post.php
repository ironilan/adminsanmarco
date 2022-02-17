<?php

namespace App\Nova;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\Hidden;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Post::class;

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
            Slug::make('Url amigable', 'slug')->from('titulo_es')->separator('-')->hideFromIndex(),
            Trix::make('Descripción', 'descripcion_es'),
            Textarea::make('Resumen', 'resumen_es')->hideFromIndex(),

            Heading::make('Datos del servicio Ingles'),
            Text::make('Titulo', 'titulo_en')->hideFromIndex(),
            Trix::make('Descripción', 'descripcion_en')->hideFromIndex(),
            Textarea::make('Resumen', 'resumen_en')->hideFromIndex(),

            Heading::make('Datos en común'),
            Date::make('Fecha','fecha_post')->hideFromIndex(),   

            BelongsTo::make('Categoria', 'categoria', 'App\Nova\Categoria'),     
            Image::make('Imagen 919x604px', 'imagen')->disk('public')->disableDownload(),
            
            Select::make('¿En qué página parecerá?','pagina')->options([
                'sanmarco' => 'San marco',
                'eccopac' => 'Eccopac'
            ])->default('eccopac'),
            Text::make('Autor', 'autor')->hideFromIndex(),
            
            Image::make('Foto 50x50px', 'avatar')->disk('public')->disableDownload(),
            //BelongsTo::make('User'),
            
            // HasMany::make('Imagenproductos'),
            // HasMany::make('Especificacions'),
            // HasMany::make('Accesorios'),
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
