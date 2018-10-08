<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
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
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapLaundryRoutes();

        $this->mapDriverRoutes();

        $this->mapCorpuserRoutes();

        $this->mapUserRoutes();

        $this->mapAdminRoutes();

        //
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'middleware' => ['web', 'admin', 'auth:admin'],
            'prefix' => 'admin',
            'as' => 'admin.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }

    /**
     * Define the "user" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapUserRoutes()
    {
        Route::group([
            'middleware' => ['web', 'user', 'auth:user'],
            'prefix' => 'user',
            'as' => 'user.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/user.php');
        });
    }

    /**
     * Define the "corpuser" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapCorpuserRoutes()
    {
        Route::group([
            'middleware' => ['web', 'corpuser', 'auth:corpuser'],
            'prefix' => 'corpuser',
            'as' => 'corpuser.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/corpuser.php');
        });
    }

    /**
     * Define the "driver" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapDriverRoutes()
    {
        Route::group([
            'middleware' => ['web', 'driver', 'auth:driver'],
            'prefix' => 'driver',
            'as' => 'driver.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/driver.php');
        });
    }

    /**
     * Define the "laundry" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLaundryRoutes()
    {
        Route::group([
            'middleware' => ['web', 'laundry', 'auth:laundry'],
            'prefix' => 'laundry',
            'as' => 'laundry.',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/laundry.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
