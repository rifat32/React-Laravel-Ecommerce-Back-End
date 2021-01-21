<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BasicApiController extends Controller
{
    public function AdminInfo(){
$infos = DB::table('user_infos')
->where(['id'=>1])
->get();

return response(['infos'=>$infos],201);
    }
    public function frontImages(){
        $images = DB::table('front_images')
        ->select('link')
        ->get();
        return response(['images'=>$images],201);
            }
  public function categories(){
                $categories = DB::table('categories')
                ->select('id','category','has_child')
                ->orderBy('category')
                ->get();
                $subCategories = DB::table('sub_categories')
                ->select('id','sub_category','category')
                ->orderBy('sub_category')
                ->get();
                return response(['categories'=>$categories,'subCategories'=>$subCategories],201);
                    }
   public function faqs(){
       $faqs = DB::table('faqs')->get();
       return response()->json(['faqs' => $faqs]);
   }
}
