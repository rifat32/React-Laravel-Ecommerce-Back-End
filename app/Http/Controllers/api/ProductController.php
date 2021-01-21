<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public function showProducts($category){
        if (strpos($category, 'search-') !== false) {
            $query =  substr($category,7) ;
            $products = DB::table('products')->where('tags', 'like',  '%' . $query .'%')->select('id','image_1','category','name','currentPrice','previousPrice')->orderByDesc('custom_id')->paginate(9);
            return response($products,201) ;


        }
      else  if($category === 'all'){
            $products = DB::table('products')->select('id','image_1','category','name','currentPrice','previousPrice')->orderByDesc('custom_id')->paginate(9);
            return response($products,201) ;
        }
        else{
            $products = DB::table('products')->where(['category'=>$category])->select('id','image_1','category','name','currentPrice','previousPrice')->orderByDesc('custom_id')->paginate(9);
            return response($products,201) ;
        }


    }
    public function singleProduct(Request $request){
      $product = DB::table('products')->where(['id'=>$request->id])->get();
        if($request->user()->id){
            if(DB::table('carts')->where(['userId' => $request->user()->id,'productId'=>$request->id,'orderStatus'=>'inCart'])->exists()){
                return response(['inCart'=>true,'product'=>$product]);
            }
            else{
                return response(['inCart'=>false,'product'=>$product]);
            }
        }

return response(['product'=>$product],201) ;
    }
    public function singleProductunAuth(Request $request){
        $product = DB::table('products')->where(['id'=>$request->id])->get();
return response(['product'=>$product],201) ;
    }
}
