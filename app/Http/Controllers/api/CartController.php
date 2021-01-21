<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function create(Request $request) {
DB::table('carts')->insert([
    'productId' => $request->productId,
    'productQuantity' => $request->productQuantity,
    'userId' => $request->user()->id,
    'orderStatus' => 'inCart',
    "created_at" =>  \Carbon\Carbon::now(),
    "updated_at" => \Carbon\Carbon::now(),
]);
        return response('added to cart');
    }

    public function myCarts(Request $request){
        $carts = DB::table('carts')
        ->where(['userId' => $request->user()->id,'orderStatus'=>'inCart'])
        ->join('products', 'carts.productId', '=', 'products.id')
        ->select('carts.productQuantity','products.id','products.image_1','products.name','products.currentPrice','carts.id as cartId')
        ->orderByDesc('cartId')
        ->get();
return response($carts);
    }
    public function deleteCartItem(Request $request){
        DB::table('carts')->where(['id'=>$request->id,'userId'=>$request->user()->id])->delete();
return response('item has been deleted from cart');
    }
    public function updateCartItems(Request $request){
        foreach ($request->items as $cart) {
         DB::table('carts')->where(['id'=>$cart[0],'userId'=>$request->user()->id])
         ->update(['productQuantity'=>$cart[4]]);
          }


        return response('cart has been updated');
    }

}
