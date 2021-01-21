<?php

namespace App\Http\Controllers\Admin\Logic\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function createAndViewCategory(){
    $categories =  DB::table('categories')->orderByDesc('id')->get();
        return view('admin.category.category-add-view',compact('categories'));
    }
    public function storeCategory(Request $request){

   if (DB::table('categories')->where(['category'=>$request->category])->exists()) {
    return back()->with('exist','Category has already been  taken');
}

DB::table('categories')->insert(['category'=>$request->category,'has_child'=>$request->childCat]);
return back()->with('inserted','Category has been inserted');
    }
    public function deleteCategory($id){
DB::table('categories')->where(['id'=>$id])->delete();
return back()->with('deleted','Category has been deleted successfully.');
    }
    public function editCategory($id){
$category = DB::table('categories')->where(['id'=>$id])->get();
return view('admin.category.category-edit',compact('category'));
    }
    public function updateCategory(Request $request){
        DB::table('categories')
        ->where(['id'=>$request->id])
        ->update(['category'=>$request->category,'has_child'=>$request->childCat]);
        return back()->with('updated','Category has been updated');
            }

}
