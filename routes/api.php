<?php

use App\Http\Controllers\api\Auth\ForgotPasswordAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\BasicApiController;
use App\Http\Controllers\api\CartController;
use App\Http\Controllers\api\CheckOutController;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\Auth\ResetPasswordAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/register",[AuthController::class,'register']);
Route::post("/login",[AuthController::class,'login']);
Route::post("/google-login",[AuthController::class,'googleLogin']);
// ###################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Basic @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// ###################################################################
Route::get('/infos',[BasicApiController::class,'AdminInfo']);
Route::get('/front-images',[BasicApiController::class,'frontImages']);
Route::get('/categories',[BasicApiController::class,'categories']);
Route::get('/faqs',[BasicApiController::class,'faqs']);

// ###################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Product @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// ###################################################################
Route::get('/products/{category}',[ProductController::class,'showProducts']);
Route::post('/product/unAuth',[ProductController::class,'singleProductunAuth']);
Route::get('order-now-unauth/{id}', [CheckOutController::class,'orderNowUnauth']);
Route::post('order-now-unauth-post',[CheckOutController::class,'orderNowUnauthPost']);
// ###################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Password reset @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// ###################################################################
Route::get('password/reset/{token}' ,[ResetPasswordAPIController::class,'showResetForm'])->name('password.reset') ;
Route::post('password/reset',[ResetPasswordAPIController::class,'reset']);
Route::post('password/email',[ForgotPasswordAPIController::class,'sendResetLinkEmail'])->name('password.email');


// ###################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Protected @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// ###################################################################
Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('/user', function (Request $request){
    return $request->user();
});
Route::post('/product',[ProductController::class,'singleProduct']);
Route::post('/cart/create', [CartController::class,'create']);
Route::get('my-carts', [CartController::class,'myCarts']);
Route::post('delete-cart-item', [CartController::class,'deleteCartItem']);
Route::post('update-cart-items', [CartController::class,'updateCartItems']);
Route::get('all-carts', [CheckOutController::class,'allCarts']);
Route::post('place-orders',[CheckOutController::class,'placeOrder']);
Route::get('active-orders', [CheckOutController::class,'activeOrders']);
Route::get('order-now-auth/{id}', [CheckOutController::class,'orderNowAuth']);
Route::post('order-now-auth-post',[CheckOutController::class,'orderNowAuthPost']);

    });
