<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\FilterController;
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
use App\Http\Controllers\Frontuser\indexController;
use App\Http\Controllers\ShopCart\SingleProductController;
use App\Http\Controllers\FileController;
use App\Models\Cart;

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

Route::group(['prefix' => 'profile','middleware' => ['verified','auth']], function(){
    Route::get('/',[ProfileController::class,'index'])->name('profile');
    Route::get('edit_show',[ProfileController::class,'edit_show'])->name('edit_show');
    Route::post('store/{id}',[ProfileController::class,'store'])->name('store');
    Route::get('update_pass',[ProfileController::class,'update'])->name('update_pass');
    Route::get('myorganization',[ProfileController::class,'my_organization_show'])->name('myorganization');
    Route::post('update/{id}',[ProfileController::class,'my_organization_update'])->name('update');
    Route::get('update_pass',[ProfileController::class,'send_mail'])->name('update_pass');
    Route::get('shop_cart/{id}',[FilterController::class,'index_shopcart'])->name('shop');
  });
//   filter
Route::get('searchprice', [FilterController::class, 'productshop']);
Route::get('search_mobile_name', [FilterController::class, 'search_mobile_name']);
Route::get('search_mobile_number', [FilterController::class, 'search_mobilenumber']);
Route::get('search_mobile_brand', [FilterController::class, 'search_mobile_brand']);




    // Route::get('/cart',[CartController::class,'index'])->name('shop_cart');


  Route::get('/single_product/{id}', [SingleProductController::class, 'index'])->name('single_product');
  Route::post('/add-to-cart',[CartController::class,'store'])->name('add_to_cart');
  Route::get('/cart',[CartController::class,'index'])->name('shop_cart');

//   Route::group(['prefix' => 'cart','middleware' => ['guest']], function(){
//       Route::get('/',[CartController::class,'index'])->name('shop_cart');


//   });

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
            Route::post('/adminGetSubcategoryChild',[ProductProductController::class,'getSubcategoryChild'])->name('adminGetSubcategoryChild');
            Route::post('/adminAddProduct',[ProductProductController::class,'store'])->name('adminAddProduct');
        });
        Route::group(['prefix'=>'all_product','middleware'=>['permission:roles_and_perms']],function(){
            Route::get('/',[ProductProductController::class,'allProduct'])->name('adminAllProduct');
            Route::get('/edit/{id}',[ProductProductController::class,'edit'])->name('adminEditProduct');
            Route::post('/deletephoto',[ProductProductController::class,'deletePhoto'])->name('adminEditDeletePhoto');
            Route::post('/update-product/{id}',[ProductProductController::class,'update'])->name('adminUpdateProduct');

            Route::delete('/delete',[ProductProductController::class,'destroy'])->name('adminDeleteProduct');
        });


  });
  Route::get('get_file',[FileController::class,'getFile'])->name('getFile');


