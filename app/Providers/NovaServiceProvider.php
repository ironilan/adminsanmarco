<?php

namespace App\Providers;

use App\Models\Benefit;
use App\Models\Course;
use App\Nova\Metrics\UsersPerDay;
use DigitalCreative\CollapsibleResourceManager\CollapsibleResourceManager;
use DigitalCreative\CollapsibleResourceManager\Resources\InternalLink;
use DigitalCreative\CollapsibleResourceManager\Resources\TopLevelResource;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'ilanvaldez34@gmail.com'
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        

        return [
            
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new CollapsibleResourceManager([
                'navigation' => [
                    TopLevelResource::make([
                        'label' => 'Usuarios',
                        'expanded' => true,
                        'resources' => [
                            \App\Nova\User::class                            
                        ]                        
                    ]),
                    TopLevelResource::make([
                        'label' => 'Configuración',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\Config::class,                         
                            \App\Nova\Whatsapp::class,                         
                        ]                       
                    ]),
                    TopLevelResource::make([
                        'label' => 'Banners',
                        'expanded' => false,
                        'resources' => [                             
                             InternalLink::make([
                                'label' => 'Banners',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/banners',
                                'params' => [ 'resourceId' => 1 ]
                            ]),   
                            InternalLink::make([
                                'label' => 'Banners internos',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/bannerinternas',
                                'params' => [ 'resourceId' => 1 ]
                            ]),                                 
                        ]                       
                    ]),
                    TopLevelResource::make([
                        'label' => 'Estáticos',
                        'expanded' => false,
                        'resources' => [                             
                             InternalLink::make([
                                'label' => 'Inicio',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/inicios',
                                'params' => [ 'resourceId' => 1 ]
                            ]),
                            InternalLink::make([
                                'label' => 'Nosotros',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/nosotros',
                                'params' => [ 'resourceId' => 1 ]
                            ])                              
                        ]                       
                    ]),
                    TopLevelResource::make([
                        'label' => 'Dinámicos',
                        'expanded' => false,
                        'resources' => [                             
                             InternalLink::make([
                                'label' => 'Destinos',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/servicios',
                                'params' => [ 'resourceId' => 1 ]
                            ])                                
                        ]                       
                    ]),
                ]
            ])
        ];
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
