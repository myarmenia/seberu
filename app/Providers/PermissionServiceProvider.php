<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

class PermissionServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      Blade::directive('permis', function ($perm){
        return "<?php if(auth()->check() && Auth::user()->hasPerm($perm)): ?>";
      });

      Blade::directive('endpermis', function ($perm){
        return "<?php endif; ?>";
      });
    }
}
