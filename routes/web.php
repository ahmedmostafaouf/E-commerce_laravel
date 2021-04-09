<?php

use App\Http\Controllers\Front\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


//define('PAGINATION_COUNT','9');
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


Route::get('logout' ,function (){
    Auth::logout();
    return redirect()->route('get.front.login');
} )->name('user-logout');

Route::get('/',[MainController::class,'getHome'])->name('get.home');

Route::group(['namespace'=>'App\Http\Controllers\Front'],function (){
    Route::get('login','LoginController@getUserLogin_register')->name('get.front.login');
    Route::post('logins','LoginController@Login')->name('front.login');
    Route::post('register','LoginController@register')->name('front.register');
    Route::get('services','MainController@getServices')->name('get.services');
    Route::get('contact-us','MainController@getContact')->name('get.contact');

    Route::get('categories','MainController@getCat')->name('get.cat');

    Route::get('categories/{id}','MainController@getCatWithID')->name('get.cat.id');

    Route::get('detailsPage/{id}','MainController@getDetailsPage')->name('details.page');

    Route::post('addCart/{id}','MainController@AddCart')->name('Add.carts');

    Route::get('editcart/{id}','MainController@editCart')->name('edit.cart');

    Route::post('updateCart/{id}','MainController@UpdateCart')->name('update.cart');

    Route::get('cart','MainController@geCartPage')->name('cart.show');
});

//Route::view('/product','admin.product.create');

//Route::get('/{page}', 'App\Http\Controllers\AdminController@index');

Route::group(['namespace'=>'App\Http\Controllers\Front','middleware'=>'auth:web'],function (){




    //Route::get('delete/{id}','MainController@deleteOrder')->name('delete.order');
   // Route::get('edit/{id}','MainController@editOrder')->name('edit.order');
    //Route::post('update/{id}','MainController@UpdateOrder')->name('update.order');
    Route::get('myAccount','MainController@getAccount')->name('get.account');
    Route::get('changPass','MainController@getChangePass')->name('get.change.pass');
    Route::post('updatePass','MainController@EditPassword')->name('update.password');
    Route::get('toggle-favourite/{product_id}' , 'MainController@toggleFavourite')->name('toggle-favourite');
    Route::get('wishlist','MainController@geWishlistPage')->name('wishlist.show');
    Route::get('deleteWishlist/{id}','MainController@deleteWishlist')->name('delete.wishlist');
    Route::get('countWishlist','MainController@countWishlist')->name('count.wishlist');
    Route::get('change-address','MainController@getChangeAddress')->name('change.address');
    Route::post('updateAddress','MainController@UpdateAddress')->name('update.address');
    //////////////////////////////////////////user_order/////////////////////////////////////////////
    Route::get('show_orders','MainController@getOrdersUser')->name('show.orders');
    Route::get('orders/{id}','MainController@getOrdersDetails')->name('show.details');
    Route::get('checkout','MainController@getCheckout')->name('get.checkout');
    Route::post('addcheckout','MainController@addCheckout')->name('add.checkout');
    Route::get('order/review','MainController@getOrderReview')->name('get.review');

    Route::post('place/order','MainController@place_order')->name('place.order');
    Route::post('place/order/master','MainController@place_order_master')->name('place.order.master');

    Route::get('thanks','MainController@thanks')->name('get.thanks');

    Route::post('order/tricking','MainController@order_tricking')->name('order.tricking');







});







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
