<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RequestService;
use Illuminate\Http\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $requestservice=RequestService::where('isViewed','=','0')->get();
        view()->share('requestservice',$requestservice);
        view()->composer('*', function ($view) {
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       if ($this->app->environment() == 'local') {
        $this->app->register('Hesto\MultiAuth\MultiAuthServiceProvider');
       }
    }
}
