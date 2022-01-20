<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Boolean;
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
use Vyuldashev\NovaMoneyField\Money;

class Servicio extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Models\Servicio::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'titulo';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'titulo',
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
            //BelongsTo::make('Subategoria', 'subcategoria', 'App\Nova\Subcategoria'),
            Heading::make('Datos del destino'),
            Text::make('Titulo'),
            Slug::make('Url amigable', 'slug')->from('titulo')->separator('-'),
            Select::make('Tipo')->options([
                'nacional' => 'Nacional',
                'internacional' => 'Internacional'
            ]),
            Number::make('Estrellas')->hideFromIndex(),
            Money::make('Precio', 'PEN', 'precio'),
            Trix::make('Descripción', 'descripcion'),
            Text::make('Días', 'dias')->hideFromIndex(),
            Text::make('Lugar')->hideFromIndex(),
            Textarea::make('Ubicación', 'ubicacion')->hideFromIndex(),

            Heading::make('Imagenes'),
            Image::make('Banner')->disk('public')->disableDownload()->hideFromIndex(),
            Image::make('Imagen')->disk('public')->disableDownload()->hideFromIndex(),

            Heading::make('Opciones'),
            Boolean::make('¿Home?', 'home')
                ->trueValue('si')
                ->falseValue('no')->hideFromIndex(),
            Boolean::make('¿Popular?', 'popular')
                ->trueValue('si')
                ->falseValue('no')->hideFromIndex(),

            HasMany::make('Archivos'),
            HasMany::make('Plans'),
            HasMany::make('Galerias'),
            HasMany::make('Incluyes'),
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
