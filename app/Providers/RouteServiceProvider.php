<?php

namespace App\Providers;

use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $this->mapWebRoutes($router);
        $this->mapApiRoutes($router);
        $this->mapWebhookRoutes($router);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    protected function mapWebRoutes(Router $router)
    {
        $router->group([
            'namespace' => $this->namespace, 'middleware' => 'web',
        ], function ($router) {
            require app_path('Http/routes.php');
        });
    }

    protected function mapWebhookRoutes(Router $router)
    {
        $router->group([
            'namespace' => 'App\Http\Controllers\Webhooks',
            'prefix' => 'webhooks'
            ] , function($router){
                require app_path('Http/webhooks.php');
            });
    }
    protected function mapApiRoutes(Router $router)
    {
        $router->group([
            'namespace' => 'App\Http\Controllers\Api',
            'middleware' => ['api', 'auth'],
            'prefix' => 'api'
            ] , function($router){
                require app_path('Http/api.php');
            });
    }
}
