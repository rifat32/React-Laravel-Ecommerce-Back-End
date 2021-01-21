<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckOutController extends Controller
{
    public function allCarts(Request $request){
        $carts = DB::table('carts')
        ->where(['userId' => $request->user()->id,'orderStatus'=>'inCart'])
        ->join('products', 'carts.productId', '=', 'products.id')
        ->select('carts.productQuantity','products.name','products.currentPrice','carts.id as cartId')
        ->orderBy('cartId')
        ->get();
return response(['carts'=>$carts]);
    }
    public function placeOrder(Request $request){
    $orderId =    DB::table('orders')->insertGetId([
'userName' => $request->user()->name,
'userEmail' => $request->user()->email,
'userPhone' => $request->phone,
'userAddress' => $request->address,
'userMessage' => $request->message,
'orderStatus' => 'active',
"created_at" =>  \Carbon\Carbon::now(),
"updated_at" => \Carbon\Carbon::now(),
        ]);
        DB::table('carts')
        ->where(['userId' => $request->user()->id,'orderStatus'=>'inCart'])
        ->update([
            'orderStatus' => 'active',
            'orderId' => $orderId,
            "updated_at" => \Carbon\Carbon::now(),
        ]);
return response(['message'=>'order placed']);
    }
   public function activeOrders(Request $request) {
    $carts = DB::table('carts')
    ->where(['userId' => $request->user()->id,'orderStatus'=>'active'])
    ->join('products', 'carts.productId', '=', 'products.id')
    ->select('carts.productQuantity','products.id','products.image_1','products.name','products.currentPrice','carts.orderId','carts.id as cartId')
    ->orderByDesc('cartId')
    ->get();
    return response($carts);
    }
    public function orderNowAuth($id){
      $product =  DB::table('products')->where(['id'=>$id])->select('currentPrice','name')->get();
        return response(['product'=>$product]);
    }
    public function orderNowAuthPost(Request $request){
        $orderId =    DB::table('orders')->insertGetId([
            'userName' => $request->user()->name,
            'userEmail' => $request->user()->email,
            'userPhone' => $request->phone,
            'userAddress' => $request->address,
            'userMessage' => $request->message,
            'orderStatus' => 'active',
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
                    ]);
                    DB::table('carts')->insert([
                        'productId' => $request->productId,
                        'productQuantity' => $request->productQuantity,
                        'userId' => $request->user()->id,
                        'orderStatus' => 'active',
                        'orderId' => $orderId,
                        "created_at" =>  \Carbon\Carbon::now(),
                        "updated_at" => \Carbon\Carbon::now(),
                    ]);

            return response(['message'=>'order placed']);
    }
    public function orderNowUnauth($id){
        $product =  DB::table('products')->where(['id'=>$id])->select('currentPrice','name')->get();
          return response(['product'=>$product]);
      }
      public function orderNowUnauthPost(Request $request){
          $orderId =    DB::table('orders')->insertGetId([
              'userName' => $request->name,
              'userEmail' => $request->email,
              'userPhone' => $request->phone,
              'userAddress' => $request->address,
              'userMessage' => $request->message,
              'orderStatus' => 'active',
              "created_at" =>  \Carbon\Carbon::now(),
              "updated_at" => \Carbon\Carbon::now(),
                      ]);
                      DB::table('carts')->insert([
                          'productId' => $request->productId,
                          'productQuantity' => $request->productQuantity,
                          'orderStatus' => 'active',
                          'orderId' => $orderId,
                          "created_at" =>  \Carbon\Carbon::now(),
                          "updated_at" => \Carbon\Carbon::now(),
                      ]);

              return response(['message'=>'order placed']);
      }

}
