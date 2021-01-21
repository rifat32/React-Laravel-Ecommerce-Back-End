<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontImageController extends Controller
{
    public function frontImageView(){
        $links =   DB::table('front_images')
           ->select('id','link')
           ->get();
            return view('admin.front-image',compact('links'));
        }
        public function frontImageStore(Request $request){
       DB::table('front_images')
       ->insert(['link'=>$request->link]);
       return back()->with('inserted','Image Has Been Inserted Successfully.');
        }
        public function frontImageDestroy($id){
       DB::table('front_images')
       ->where(['id'=>$id])
       ->delete();
       return back()->with('deleted','Image Has Been Deleted Successfully.');
        }
}
