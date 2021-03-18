<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaravelController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Ordercontroller;

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
//Front-end Controller
Route::get('/', [LaravelController::class, 'index']);
Route::get('/category-women/{id}', [LaravelController::class, 'categorywomen']);
Route::get('/category-men', [LaravelController::class, 'categorymen']);
Route::get('/contact-us', [LaravelController::class, 'contact']);


//Back-end Controller
Route::get('/userform', [BackendController::class, 'user']);
Route::get('/unpublish/{id}', [BackendController::class, 'unpublishcategory']);
Route::get('/publish/{id}', [BackendController::class, 'publishcategory']);
Route::get('/edit-category/{huda}', [BackendController::class, 'editcategoryinfo']);
Route::get('/delete-category/{huda}', [BackendController::class, 'deletecategoryinfo']);
Route::get('/usertable', [BackendController::class, 'usertable']);
Route::post('/update-category', [BackendController::class, 'updatecategoryinfo']);
Route::post('new-category', [BackendController::class, 'newcategoryinfo']);

/////
Route::get('/brand-category', [BrandController::class, 'brandcategory']);
Route::post('new-brand', [BrandController::class, 'newbrand']);

Route::post('product-info',[ProductController::class, 'newproductInfo']);
Route::get('/addproduct', [ProductController::class, 'addproductInfo']);
Route::get('/producttable', [ProductController::class, 'producttableInfo']);
Route::get('/product-details/{id}/{name}',[ProductController::class,'productdetailsInfo'])->middleware('laravel');
Route::get('/edit-product/{id}',[ProductController::class,'editproductInfo']);
Route::post('/update-product',[ProductController::class,'updateproductInfo']);

//Shopping Cart---
Route::post('/addto-cart',[CartController::class,'addtocartInfo']);
Route::get('/show-cart',[CartController::class,'showcartInfo']); 
Route::get('/delete-cart/{id}',[CartController::class,'deletecartInfo']);
Route::post('/update-cart',[CartController::class,'updatecartInfo']);

 //Checkout
Route::get('/check-out',[CheckoutController::class,'checkoutInfo']);
Route::post('/customer-sign-up',[CheckoutController::class,'customersignupInfo']);
Route::post('/customer-login',[CheckoutController::class,'customerloginInfo']);
Route::get('/checkout/shipping',[CheckoutController::class,'CheckoutShippingInfo']);
Route::post('/new-shipping',[CheckoutController::class,'newshippingInfo']);
Route::get('/checkout/payment',[CheckoutController::class,'checkoutpaymentInfo']);
Route::post('/confirm-order',[CheckoutController::class,'confirmorderInfo']);
Route::get('/complete/order',[CheckoutController::class,'completeorderInfo']);
Route::post('/customer-logout',[CheckoutController::class,'customerlogoutInfo']);
Route::get('/new-customer-login',[CheckoutController::class,'newcustomerloginInfo']);

//Order 
Route::get('/order-management',[Ordercontroller::class,'ordermanagementInfo']);
Route::get('/view-order-details/{id}',[Ordercontroller::class,'vieworderdetailsInfo']);
Route::get('/view-order-invoice/{id}',[Ordercontroller::class,'vieworderinvoiceInfo']);
Route::get('/download-order-invoice/{id}',[Ordercontroller::class,'downloadinvoiceInfo']);


//group middleware
Route::middleware('laravel')->group(function () {
 Route::get('/show-cart',[CartController::class,'showcartInfo']); 
 Route::get('/checkout/shipping',[CheckoutController::class,'CheckoutShippingInfo']);
 Route::get('/checkout/payment',[CheckoutController::class,'checkoutpaymentInfo']);
    
});







//Laravel Breeze auth
//Route::get('/', function () {
    //return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
