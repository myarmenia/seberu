<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class PermissionCanServceProvider extends ServiceProvider
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
      Gate::define('see_categories', function ($user) {
                  if($user->hasPerm('see_categories')){
                    return true;
                  }
                  return false;
              });

      Gate::define('edit_category', function ($user) {
                  if($user->hasPerm('edit_category')){
                    return true;
                  }
                    return false;
              });

      Gate::define('delete_category', function ($user) {
                  if($user->hasPerm('delete_category')){
                    return true;
                  }
                    return false;
                });

      Gate::define('create_category', function ($user) {
                  if($user->hasPerm('create_category')){
                      return true;
                  }
                      return false;
                });

      Gate::define('see_users', function ($user) {
                  if($user->hasPerm('see_users')){
                      return true;
                  }
                      return false;
                });

      Gate::define('edit_user', function ($user) {
                    if($user->hasPerm('edit_user')){
                        return true;
                    }
                        return false;
                  });

      Gate::define('roles_and_perms', function ($user) {
                      if($user->hasPerm('roles_and_perms')){
                            return true;
                    }
                            return false;
                  });
    }
}
