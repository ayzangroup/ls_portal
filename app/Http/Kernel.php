<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            //\Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
            \App\Http\Middleware\Cors::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'laundry' => \App\Http\Middleware\RedirectIfNotLaundry::class,
        'laundry.guest' => \App\Http\Middleware\RedirectIfLaundry::class,
        'driver' => \App\Http\Middleware\RedirectIfNotDriver::class,
        'driver.guest' => \App\Http\Middleware\RedirectIfDriver::class,
        'corpuser' => \App\Http\Middleware\RedirectIfNotCorpuser::class,
        'corpuser.guest' => \App\Http\Middleware\RedirectIfCorpuser::class,
        'user' => \App\Http\Middleware\RedirectIfNotUser::class,
        'user.guest' => \App\Http\Middleware\RedirectIfUser::class,
        'admin' => \App\Http\Middleware\RedirectIfNotAdmin::class,
        'admin.guest' => \App\Http\Middleware\RedirectIfAdmin::class,
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        //'admin-login' => \App\Http\Middleware\AdminLogin::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'admin.auth' => \App\Http\Middleware\AdminRedirectIfNotAuthenticated::class,
        'admin.guest' => \App\Http\Middleware\AdminRedirectIfAuthenticated::class,
        'cors' => 'App\Http\Middleware\Cors',
        
    ];
}
