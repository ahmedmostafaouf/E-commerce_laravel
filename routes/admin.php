<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductsController;
use  Illuminate\Auth\SessionGuard;

//define('PAGINATION_COUNT','9');
//Route::get('/{page}', 'App\Http\Controllers\AdminController@index');

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

//Route::view('/product','admin.product.create');
Route::get('logout' ,function (){
  auth('admin')->logout();
    return redirect()->route('getAdminLogin');
} )->name('admin.logout');

Route::group(['middleware'=>'guest:admin'],function (){
    Route::get('/login','App\Http\Controllers\AdminController@login')->name('getAdminLogin');
    Route::post('log','App\Http\Controllers\AdminController@logged')->name('adminLogin');

});
Route::get('/','App\Http\Controllers\AdminController@getDashboard')->name('admin.dashboard')->middleware('auth:admin');


############Category-CRUD#################
Route::group(['prefix'=>'category','middleware'=>'auth:admin'],function () {
    Route::get('/create',[CategoryController::class,'create'])->name('category-create');
    Route::post('/create',[CategoryController::class,'store'])->name('category-save');
    Route::get('/show',[CategoryController::class,'index'])->name('category-show');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('category-edit');
    Route::post('/updated/{id}',[CategoryController::class,'update'])->name('category-update');
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('category-delete');

});

############Sud-Category-CRUD#################
Route::group(['prefix'=>'subcategory','middleware'=>'auth:admin'],function () {
    Route::get('/subCats',[SubCategoryController::class,'getAllSubCat'])->name('all.sub.category');
    Route::post('/subCats',[SubCategoryController::class,'storeSubCat'])->name('subCat.store');

    Route::get('/create/{id}',[SubCategoryController::class,'create'])->name('sub-category-create');
    Route::post('/created/{id}',[SubCategoryController::class,'store'])->name('sub-category-save');
    Route::get('/show/{id}',[SubCategoryController::class,'index'])->name('sub-category-show');
    Route::get('/edit/{id}',[SubCategoryController::class,'edit'])->name('sub-category-edit');
    Route::post('/update/{id}',[SubCategoryController::class,'update'])->name('sub-category-update');
    Route::get('/delete/{id}',[SubCategoryController::class,'destroy'])->name('sub-category-delete');

});


############products-CRUD#################
Route::group(['prefix'=>'products','middleware'=>'auth:admin'],function () {
    Route::get('/products',[ProductsController::class,'getAllProduct'])->name('all.product');
    Route::post('/products',[ProductsController::class,'storeProduct'])->name('product.store');
    Route::get('/create/{id}',[ProductsController::class,'create'])->name('product-create');
    Route::post('/created/{id}',[ProductsController::class,'store'])->name('product-save');
    Route::get('/show/{id}',[ProductsController::class,'index'])->name('product-show');
    Route::get('/edit/{id}',[ProductsController::class,'edit'])->name('product-edit');
    Route::post('/updated/{id}',[ProductsController::class,'update'])->name('product-update');
    Route::get('/delete/{id}',[ProductsController::class,'destroy'])->name('product-delete');

});
Route::group(['prefix'=>'setting','middleware'=>'auth:admin'],function () {
    Route::get('/create',[SettingController::class,'create'])->name('setting.create');
    Route::post('add/',[SettingController::class,'edit'])->name('setting.save');
});

Route::group(['prefix'=>'users','middleware'=>'auth:admin'],function () {
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/active/users',[UserController::class,'activeUser'])->name('users.active');
    Route::get('/delete/{id}',[UserController::class,'destroy'])->name('users.delete');
    Route::get('/change/{id}',[UserController::class,'changeStatus'])->name('users.status');
});
Route::group(['prefix'=>'orders','middleware'=>'auth:admin'],function () {
    Route::get('/',[OrderController::class,'index'])->name('order.index');
    Route::get('/view/order/{id}',[OrderController::class,'view'])->name('order.view');
    Route::get('/view/order/payment/accept/{id}',[OrderController::class,'payment_accept'])->name('order.payment.accept');
    Route::get('/view/order/payment/cancel/{id}',[OrderController::class,'payment_cancel'])->name('order.payment.cancel');

    Route::get('/view/order/payments/accept',[OrderController::class,'accept_payment'])->name('order.accept');
    Route::get('/view/order/delivery/process/{id}',[OrderController::class,'delivery_process'])->name('order.delivery.process');

    Route::get('/view/order/payments/process',[OrderController::class,'process_payment'])->name('order.process');
    Route::get('/view/order/delivery/success/{id}',[OrderController::class,'delivery_success'])->name('order.delivery.success');

    Route::get('/view/order/payments/success',[OrderController::class,'success_payment'])->name('order.success');
    Route::get('/view/order/payments/cancel',[OrderController::class,'cancel_payment'])->name('order.cancel');
});


///////////////////////// Reports ////////////////////////////////////////////

Route::group(['prefix'=>'reports','middleware'=>'auth:admin'],function () {
    Route::get('/order/today',[ReportController::class,'order_today'])->name('order.today');
    Route::get('/delivery/today',[ReportController::class,'delivery_today'])->name('delivery.today');
    Route::get('/this/month',[ReportController::class,'this_month'])->name('this.month');
    Route::get('/order/search',[ReportController::class,'order_search'])->name('order.search');
    Route::post('/order/search/byYear',[ReportController::class,'search_by_year'])->name('search.year');
    Route::post('/order/search/byMonth',[ReportController::class,'search_by_month'])->name('search.month');
    Route::post('/order/search/byDay',[ReportController::class,'search_by_day'])->name('search.day');
});

///////////////////////////////////Coupon & newsletter////////////////////////////////
