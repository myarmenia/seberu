<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Admin\AdminEditUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ShopCart\CartController;
use App\Http\Controllers\User\Order\OrderController;
use App\Http\Controllers\Category\Product\ProductController;
use App\Http\Controllers\Category\CharactController;
use App\Http\Controllers\Product\ProductController as ProductProductController;
use App\Http\Controllers\WelcomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[WelcomeController::class,'index'])->name('welcome');

Route::get('get_categories', [CategoryController::class, 'getById'])->name('getCats');

Auth::routes(['verify' => true]);

Route::group(['prefix' => 'profile','middleware' => ['verified','auth','guest']], function(){
    Route::get('/',[ProfileController::class,'index'])->name('profile');
  });

  Route::group(['prefix' => 'cart','middleware' => ['guest']], function(){
      Route::get('/',[CartController::class,'index'])->name('shop_cart');
  });

  Route::group(['prefix' => 'order','middleware' => ['guest']], function(){
      Route::get('/',[OrderController::class,'index'])->name('orders');
  });

  Route::group(['prefix' => 'product'], function(){
      Route::get('/',[ProductController::class,'index'])->name('product');
  });


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'ruler', 'middleware' => ['admin']], function(){
        Route::get('/',[AdminController::class,'index'])->name('adminProfile');
        Route::get('/settings',[AdminController::class,'settngs'])->name('adminSettings');
        Route::put('/settings/update/{id}',[AdminController::class,'update'])->name('adminUpdateData');

        Route::group(['prefix' => 'categories'], function(){
            Route::get('/',[CategoryController::class,'index'])->name('categories')->middleware('permission:see_categories');
            Route::post('/create/{id?}',[CategoryController::class,'create'])->name('createCategories')->middleware('permission:create_category');
            Route::delete('/delete',[CategoryController::class,'delete'])->name('deleteCategories')->middleware('permission:delete_category');
            Route::put('/update',[CategoryController::class,'update'])->name('updateCategories')->middleware('permission:edit_category');
            Route::patch('/spam',[CategoryController::class,'spam'])->name('spamCategories')->middleware('permission:edit_category');
            Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('editCategories')->middleware('permission:edit_category');
            Route::put('category-characts',[CategoryController::class,'categoryCharacts'])->name('updateCategoriesCharact')->middleware('permission:edit_category');
          });

        Route::group(['prefix' => 'all_users'], function(){
              Route::get('/',[AdminEditUserController::class,'getAllUsers'])->name('adminGetUsers')->middleware('permission:see_users');
              Route::get('/single-page/{id}',[AdminEditUserController::class,'userSinglePage'])->name('adminUserSinglePage')->middleware('permission:edit_user');
              Route::patch('/spam',[AdminEditUserController::class,'spamUser'])->name('adminSpamUser')->middleware('permission:edit_user');
              Route::patch('/add_role',[AdminEditUserController::class,'userAddRole'])->name('adminAddRoleUser')->middleware('permission:edit_user');
              Route::put('/edit_data',[AdminEditUserController::class,'userEditData'])->name('adminEditUserData')->middleware('permission:edit_user');
          });
        Route::group(['prefix' => 'roles', 'middleware' => ['permission:roles_and_perms']], function(){
                Route::get('/',[RoleController::class,'index'])->name('adminAddRole');
                Route::post('/create',[RoleController::class,'create'])->name('adminCreateRole');
                Route::get('/single-page/{id}',[RoleController::class,'singlePage'])->name('adminRoleSinglePage');
                Route::patch('/add-perm',[RoleController::class,'addOrDelPermission'])->name('adminRolesAddPerm');
                Route::delete('/delete',[RoleController::class,'delete'])->name('adminDeleteRole');
          });
        Route::group(['prefix' => 'permissions', 'middleware' => ['permission:roles_and_perms']], function(){
                  Route::get('/',[PermissionController::class,'index'])->name('adminAddPerm');
                  Route::post('/create',[PermissionController::class,'create'])->name('adminCreatePerm');
                  Route::patch('/update',[PermissionController::class,'update'])->name('adminUpdatePerm');
                  Route::delete('/delete',[PermissionController::class,'delete'])->name('adminDeletePerm');
          });

        Route::group(['prefix' => 'characteristics', 'middleware' => ['permission:roles_and_perms']], function(){
            Route::get('/',[CharactController::class,'index'])->name('characts');
            Route::post('/',[CharactController::class,'create'])->name('adminCreateCharact');

        });
        Route::group(['prefix' => 'add_product','middleware' => ['permission:roles_and_perms']],function(){
            Route::get('/',[ProductProductController::class,'index'])->name('retunAddProductForm');
            Route::post('/adminGetSubcategory',[ProductProductController::class,'getSubcategory'])->name('adminGetSubcategory');
            Route::post('/adminAddProduct',[ProductProductController::class,'store'])->name('adminAddProduct');
        });
  });
