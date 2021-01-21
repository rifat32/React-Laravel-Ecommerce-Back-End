<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminInfo extends Controller
{

    public function adminInfoView(){
     $infos =  DB::table('user_infos')
        ->where(['id' => 1])
        ->get();
        return view('admin.admin-info',compact('infos'));
    }
    public function adminInfoStore(Request $request){

        $infos =  DB::table('user_infos')
           ->where(['id' => 1])
           ->get();
           if(count($infos)){
            DB::table('user_infos')
            ->where(['id' => 1])
            ->update([
                     'email'=>$request->email,
                     'phone'=>$request->phone,
                     'address'=>$request->address,
                     'facebook'=>$request->fb,
                     'twitter'=>$request->tw,
                     'instagram'=>$request->ins,
                     'linkedin'=>$request->ln,
            ]);
            return back()->with('updated','Admin information has been updated.');
           }
           else{
            DB::table('user_infos')
            ->where(['id' => 1])
            ->insert([
                      'email'=>$request->email,
                      'phone'=>$request->phone,
                      'address'=>$request->address,
                      'facebook'=>$request->fb,
                      'twitter'=>$request->tw,
                      'instagram'=>$request->ins,
                      'linkedin'=>$request->ln,
            ]);
            return back()->with('inserted','Admin information has been inserted.');
           }
       }

}
