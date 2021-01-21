<?php

namespace App\Http\Controllers\Admin\Logic\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
   public function activeOrders() {
$orders = DB::table('orders')->where(['orderStatus'=>'active'])->select('id','created_at')->orderByDesc('id')->paginate(15);
return view('admin.order.active-orders',compact('orders'));
   }
   public function viewCartOrder($id){
    $cartOrders = DB::table('carts')
    ->where(['orderId' => $id])
    ->join('products', 'carts.productId', '=', 'products.id')
    ->select('carts.productQuantity','products.id as productId','products.image_1','products.name','products.currentPrice','carts.id as cartId')
    ->orderByDesc('cartId')
    ->get();
    //  return $cartOrders;
    $order = DB::table('orders')->where(['id'=>$id])->get();
    $total = 0;
    foreach($cartOrders as $cartOrder){
$total += $cartOrder->productQuantity * $cartOrder->currentPrice;
    }

return view('admin.order.view-cart-order',compact('cartOrders','order','total'));
   }
   public function completeOrder($id){
DB::table('orders')->where(['id'=>$id])->update(['orderStatus' => 'completed']);
DB::table('carts')->where(['orderId'=>$id])->update(['orderStatus' => 'completed']);
return back()->with('completed','Order Has Been Completed Successfully.');
   }
   public function cancelOrder($id){
    DB::table('orders')->where(['id'=>$id])->update(['orderStatus' => 'cancelled']);
    DB::table('carts')->where(['orderId'=>$id])->update(['orderStatus' => 'cancelled']);
    return back()->with('cancelled','Order Has Been Cancelled Successfully.');
       }
       public function completedOrders() {
        $orders = DB::table('orders')->where(['orderStatus'=>'completed'])->select('id','created_at')->orderByDesc('id')->paginate(15);
        return view('admin.order.completed-orders',compact('orders'));
           }
}
