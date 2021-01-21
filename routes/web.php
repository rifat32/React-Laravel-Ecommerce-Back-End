<?php

use App\Http\Controllers\Admin\AdminInfo;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FrontImageController;
use App\Http\Controllers\Admin\Logic\Category\CategoryController;
use App\Http\Controllers\Admin\Logic\Order\OrdersController;
use App\Http\Controllers\Admin\Logic\Product\ProductController;
use App\Http\Controllers\Admin\Logic\SubCategory\SubCategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

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
Auth::routes();
// ############################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@ First Route @@@@@@@@@@@@@@@@@@@@@@@@@@
// ############################################################################
Route::get('/', function () {
    if(Auth::user()){
        if(Auth::user()->role === 'admin'){
            return view('welcome');
        }
        else{
            return Redirect::to('http://localhost:3000/login');
        }

    }
    else{
        return view('auth.login');
    }

});
// ############################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@ Admin Middleware Routes @@@@@@@@@@@@@@@@@@@@@@@@@@
// ############################################################################
Route::middleware(['Admin'])->group( function(){

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// ############################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@ Initialize  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// ############################################################################


//              @@@@@@@@@@@@@@@ Admin Info  @@@@@@@@@@@@@@@@@@@@@@@
Route::get('/info', [AdminInfo::class,'adminInfoView'])->name('admin.info');
Route::post('/info/store', [AdminInfo::class,'adminInfoStore'])->name('admin.info.post');


//              @@@@@@@@@@@@@@@ Front Image  @@@@@@@@@@@@@@@@@@@@@@@
Route::get('/front-image', [FrontImageController::class,'frontImageView'])->name('admin.front.image');
Route::post('/front-image/store', [FrontImageController::class,'frontImageStore'])->name('admin.front.image.post');
Route::get('/front-image/destroy/{id}', [FrontImageController::class,'frontImageDestroy'])->name('admin.front.image.destroy');
//               @@@@@@@@@@@@@@@   Faq    @@@@@@@@@@@@@@@@@@@@@@@
Route::get('/faq', [FaqController::class,'faqView'])->name('admin.faq');
Route::post('/faq/store', [FaqController::class,'faqStore'])->name('admin.faq.post');
Route::get('/faq/destroy/{id}', [FaqController::class,'faqDestroy'])->name('admin.faq.destroy');
Route::get('/faq/edit/{id}', [FaqController::class,'faqEdit'])->name('admin.faq.edit');
Route::post('/faq/update', [FaqController::class,'faqUpdate'])->name('admin.faq.update');
// ############################################################################
// @@@@@@@@@@@@@@@@@@@@@@@@@@@@ Logic Section  @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
// ############################################################################


//               @@@@@@@@@@@@@@@@ Category  @@@@@@@@@@@@@@@@@@@@@@
Route::get('add-and-view-category', [CategoryController::class,'createAndViewCategory'])->name('category.create.view');
Route::post('store-category', [CategoryController::class,'storeCategory'])->name('category.store');
Route::get('delete-category/{id}', [CategoryController::class,'deleteCategory'])->name('category.delete');
Route::get('edit-category/{id}', [CategoryController::class,'editCategory'])->name('category.edit');
Route::post('update-category', [CategoryController::class,'updateCategory'])->name('category.update');
//               @@@@@@@@@@@@@@@@ Sub Category  @@@@@@@@@@@@@@@@@@@@@@
Route::get('add-and-view-sub-category', [SubCategoryController::class,'createAndViewSubCategory'])->name('subCategory.create.view');
Route::post('store-subCategory', [SubCategoryController::class,'storeSubCategory'])->name('subCategory.store');
Route::get('delete-sub-category/{id}', [SubCategoryController::class,'deleteSubCategory'])->name('subCategory.delete');
Route::get('edit-sub-category/{id}', [SubCategoryController::class,'editSubCategory'])->name('subCategory.edit');
Route::post('update-sub-category', [SubCategoryController::class,'updateSubCategory'])->name('subCategory.update');
//               @@@@@@@@@@@@@@@@ Product @@@@@@@@@@@@@@@@@@@@@@
Route::get('add-product', [ProductController::class,'addProduct'])->name('product.add');
Route::post('add-product-store', [ProductController::class,'storeProduct'])->name('product.store');
Route::get('view-products', [ProductController::class,'viewProducts'])->name('products.view');
Route::get('edit-product/{id}', [ProductController::class,'editProduct'])->name('product.edit');
Route::get('delete-product/{id}', [ProductController::class,'deleteProduct'])->name('product.delete');
Route::post('update-product', [ProductController::class,'updateProduct'])->name('product.update');
//                  @@@@@@@@@@@@@@@@ Orders @@@@@@@@@@@@@@@@@@@@@@
Route::get('active-orders',[OrdersController::class,'activeOrders'])->name('active.orders');
Route::get('view-cart-order/{id}',[OrdersController::class,'viewCartOrder'])->name('view.cart.order');
Route::get('complete-order/{id}',[OrdersController::class,'completeOrder'])->name('order.complete');
Route::get('cancel-order/{id}',[OrdersController::class,'cancelOrder'])->name('order.cancel');
Route::get('completed-orders',[OrdersController::class,'completedOrders'])->name('completed.orders');




    });



