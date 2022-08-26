<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\LogoManagerControll;
use App\Http\Controllers\Frontend\NewslaterControll;
use App\Http\Controllers\Admin\Category\BrandController;
use App\Http\Controllers\Admin\Category\CouponController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->group(function(){

    Route::get('/', [AdminController::class,'index']);
    Route::get('/login', [AdminController::class,'index'])->name('admin_login_form');
    Route::get('/register', [AdminController::class,'adminregister'])->name('admin.register');
    Route::post('/registerstore', [AdminController::class,'registerstore'])->name('admin.registerstore');
    Route::post('/login-owner', [AdminController::class,'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class,'Adminlogout'])->name('admin.logout')->middleware('admin');
    Route::get('/dashboard', [AdminController::class,'dashboard'])->name('admin_dashboard')->middleware('admin');

    /// categories
    Route::get('categories', [CategoryController::class,'category'])->name('categories');
    Route::post('store-category', [CategoryController::class,'storecategory'])->name('store.category');
    Route::get('edit-category/{id}', [CategoryController::class,'Editcategory'])->name('edit.category');
    Route::get('delete-category/{id}', [CategoryController::class,'Deletecategory'])->name('delete.category');
    Route::post('update-category/{id}', [CategoryController::class,'Updatecategory'])->name('update.category');


    /// Brand
    Route::get('brands', [BrandController::class,'brand'])->name('brands');
    Route::post('store-brand', [BrandController::class,'storebrand'])->name('store.brand');
    Route::get('delete/brand/{id}', [BrandController::class,'DeleteBrand'])->name('delete.brand');
    Route::get('edit-brand/{id}', [BrandController::class,'EditBrand'])->name('edit.brand');
    Route::post('update-brand/{id}', [BrandController::class,'UpdateBrand'])->name('update.brand');

    // Sub Categories

    Route::get('sub-categories', [SubCategoryController::class,'subcategories'])->name('sub.categories');
    Route::post('store-subcategory', [SubCategoryController::class,'storesubcat'])->name('store.subcategory');
    Route::get('edit-subcategory/{id}', [SubCategoryController::class,'EditSubcat'])->name('edit.subcategory');
    Route::get('delete-subcategory/{id}', [SubCategoryController::class,'DeleteSubcat'])->name('delete.subcategory');
    Route::post('update-subcategory/{id}', [SubCategoryController::class,'UpdateSubcat'])->name('update.subcategory');


    // Coupons All

    Route::get('sub-coupon', [CouponController::class,'Coupon'])->name('sub.coupon');
    Route::post('store-coupon', [CouponController::class,'StoreCoupon'])->name('store.coupon');
    Route::get('edit-coupon/{id}', [CouponController::class,'EditCoupon'])->name('edit.coupon');
    Route::get('delete-coupon/{id}', [CouponController::class,'DeleteCoupon'])->name('delete.coupon');
    Route::post('update-coupon/{id}', [CouponController::class,'UpdateCoupon'])->name('update.coupon');

     // Logo All

     Route::get('logo', [LogoManagerControll::class,'adminlogo'])->name('admin.logo');
     Route::post('store-logo', [LogoManagerControll::class,'Storelogo'])->name('store.logo');
     Route::get('edit-logo/{id}', [LogoManagerControll::class,'EditLogo'])->name('edit.logo');
     Route::post('update-logo/{id}', [LogoManagerControll::class,'Updatelogo'])->name('update.logo');

    // Newslater
    Route::get('admin-newslater', [CouponController::class,'Newslater'])->name('admin.newslater');
    Route::get('delete-newslater/{id}', [CouponController::class,'Deletenewslater'])->name('delete.newslater');



    // For Show Sub category with ajax
    Route::get('get/subcategory/{category_id}', 'Admin\ProductController@GetSubcat');




});



/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('pages.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('store-newslater', [NewslaterControll::class,'StoreNewslater'])->name('store.newslater');
