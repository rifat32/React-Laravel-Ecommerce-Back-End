<?php

namespace App\Http\Controllers\Admin\Logic\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
   public function addProduct(){
       $categories = DB::table('categories')->where(['has_child'=>'0'])->get();
       $sub_categories = DB::table('sub_categories')->get();
       if(!count($categories) && !count($sub_categories)){
        $err =  'You need to add Category or Sub Category before adding  Product';
        return view('admin.error',compact('err'));
       }
       return view('admin.product.add-product',compact('categories','sub_categories'));
   }
   public function storeProduct(Request $request){
       $custom_id = $request->custom_id;
       $name = $request->name;
       $descriptionIntroduction = $request->descriptionIntroduction;
       $descriptionFeatures = $request->descriptionFeatures;
       $currentPrice = $request->currentPrice;
       $previousPrice = $request->previousPrice;
       $image_1 = $request->image_1;
       $image_2 = $request->image_2;
       $image_3 = $request->image_3;
       $category = $request->category;
       $sub_category = $request->sub_category;
       $finalCategory = null;
       $tag = $request->tag;
       $stock = $request->stock;
       $sizes = $request->sizes;
       $colors = $request->colors;
    if($category === '-1' && $sub_category === '-1'){
        return back()->with('noCate','Select One between category and sub category.')->withInput();
    }
    if($category !== '-1' && $sub_category !== '-1'){
        return back()->with('noCate','Select One between category and sub category.')->withInput();
    }
    if($category !== '-1' && $sub_category === '-1'){
        $finalCategory = $category;
    }
    else if($category === '-1' && $sub_category !== '-1'){
        $finalCategory = $sub_category;
    }
DB::table('products')->insert([
'custom_id'=> $custom_id,
'name' => $name,
'descriptionIntroduction'=>$descriptionIntroduction,
'descriptionFeatures'=>$descriptionFeatures,
'currentPrice'=>$currentPrice,
'previousPrice'=>$previousPrice,
'image_1'=>$image_1,
'image_2'=>$image_2,
'image_3'=>$image_3,
'category'=>$finalCategory,
'tags'=>$tag,
'stock'=>$stock,
'sizes'=>$sizes,
'colors'=>$colors
]);

return back()->with('inserted','Product has been inserted successfully');
   }
   public function viewProducts(){
       $products = DB::table('products')->orderByDesc('id')->paginate(10);
    return view('admin.product.view-product',compact('products'));
}
public function deleteProduct($id){
    DB::table('products')->where(['id'=>$id])->delete();
    return back()->with('deleted','Product has ben deleted');
}
public function editProduct($id){
    $categories = DB::table('categories')->where(['has_child'=>'0'])->orderBy('category')->get();
    $sub_categories = DB::table('sub_categories')->orderBy('sub_category')->get();
  $product =   DB::table('products')->where(['id'=>$id])->get();

    return view('admin.product.edit-product',compact('product','categories','sub_categories'));
}
public function updateProduct(Request $request){
    $custom_id = $request->custom_id;
    $name = $request->name;
    $descriptionIntroduction = $request->descriptionIntroduction;
    $descriptionFeatures = $request->descriptionFeatures;
    $currentPrice = $request->currentPrice;
    $previousPrice = $request->previousPrice;
    $image_1 = $request->image_1;
    $image_2 = $request->image_2;
    $image_3 = $request->image_3;
    $category = $request->category;
    $sub_category = $request->sub_category;
    $finalCategory = null;
    $tag = $request->tag;
    $stock = $request->stock;
    $sizes = $request->sizes;
    $colors = $request->colors;
 if($category === '-1' && $sub_category === '-1'){
     return back()->with('noCate','Select One between category and sub category.')->withInput();
 }
 if($category !== '-1' && $sub_category !== '-1'){
     return back()->with('noCate','Select One between category and sub category.')->withInput();
 }
 if($category !== '-1' && $sub_category === '-1'){
     $finalCategory = $category;
 }
 else if($category === '-1' && $sub_category !== '-1'){
     $finalCategory = $sub_category;
 }
DB::table('products')->where([
    'id' =>$request->id
])->update([
'custom_id'=> $custom_id,
'name' => $name,
'descriptionIntroduction'=>$descriptionIntroduction,
'descriptionFeatures'=>$descriptionFeatures,
'currentPrice'=>$currentPrice,
'previousPrice'=>$previousPrice,
'image_1'=>$image_1,
'image_2'=>$image_2,
'image_3'=>$image_3,
'category'=>$finalCategory,
'tags'=>$tag,
'stock'=>$stock,
'sizes'=>$sizes,
'colors'=>$colors
]);

return back()->with('updated','Product has been updated successfully');
}
}
