<?php

namespace App\Nova;

use App\Models\Linea;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\File;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Heading;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Media24si\NovaYoutubeField\Youtube;

class Producto extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Producto::class;

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
        $opciones = Linea::pluck('titulo_es', 'id');

        return [
            ID::make(__('ID'), 'id')->sortable(),
            //BelongsTo::make('Subategoria', 'subcategoria', 'App\Nova\Subcategoria'),
            
            Heading::make('Datos del servicio Español'),
            Text::make('Titulo', 'titulo_es'),
            Slug::make('Url amigable', 'slug')->from('titulo_es')->separator('-')->hideFromIndex(),
            Textarea::make('Resumen', 'resumen_es'),
            Trix::make('Descripción', 'descripcion_es'),
           // Youtube::make('Video', 'video_es')->hideFromIndex(),
            

            Heading::make('Datos del servicio Ingles'),
            Text::make('Titulo', 'titulo_en')->hideFromIndex(),
            Textarea::make('Resumen', 'resumen_en'),
            Trix::make('Descripción', 'descripcion_en'),
            
           // Youtube::make('Video', 'video_en')->hideFromIndex(),

            Heading::make('Datos en común'),  
            Text::make('Código', 'codigo')->hideFromIndex(), 
            Select::make('¿En qué página parecerá?','pagina')->options([
                'sanmarco' => 'San marco',
                'eccopac' => 'Eccopac',
                'todo' => 'Ambas páginas',
            ]),    
            BelongsTo::make('Marca', 'marca', 'App\Nova\Marca')->hideFromIndex(),  
            BelongsTo::make('Subategoria', 'subcategoria', 'App\Nova\Subcategoria'),  
            BelongsTo::make('Categoria', 'categoria', 'App\Nova\Categoria'),   
            //BelongsTo::make('Servicio', 'servicio', 'App\Nova\Servicio'), 
            Boolean::make('Nuevo')
                ->trueValue('si')
                ->falseValue('no')->hideFromIndex(),
            Boolean::make('Por llegar', 'por_llegar')
                ->trueValue('si')
                ->falseValue('no')->hideFromIndex(),
            Boolean::make('Más vendido', 'mas_vendido')
                ->trueValue('si')
                ->falseValue('no')->hideFromIndex(),
            Image::make('Imagen 488x313px', 'imagen')->disk('public')->disableDownload()->hideFromIndex(),
            Number::make('Estrellas')->min(1)->max(5)->default(1)->hideFromIndex(),

            Heading::make('Sólo si es eccopac (línea)'), 
            Select::make('Línea','linea_id')->options($opciones),



            HasMany::make('Archivos'),
            HasMany::make('Videos'),
            HasMany::make('Imagenproductos'),
            HasMany::make('Especificacions'),
            HasMany::make('Accesorios'),
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
