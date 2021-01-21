<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function faqView(){
        $faqs =   DB::table('faqs')
        ->get();
            return view('admin.faq.faq',compact('faqs'));
        }
        public function faqStore(Request $request){
            DB::table('faqs')
            ->insert(['title'=>$request->title,'description'=>$request->description]);
            return back()->with('inserted','Faq Has Been Inserted Successfully.');
             }
        public function faqDestroy($id){
                DB::table('faqs')
                ->where(['id'=>$id])
                ->delete();
                return back()->with('deleted','Faq Has Been Deleted Successfully.');
                 }
        public function faqEdit($id){
          $faq =   DB::table('faqs')
            ->where(['id'=>$id])
            ->get();
            return view('admin.faq.faq-edit',compact('faq'));
        }
        public function faqUpdate(Request $request){
       DB::table('faqs')->where(['id' => $request->id])
       ->update(['title' => $request->title,'description' => $request->description]);
       return back()->with('updated','Faq Has Been Updated Successfully.');
        }
}
