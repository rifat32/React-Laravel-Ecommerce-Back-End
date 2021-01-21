<?php

namespace App\Http\Controllers\Admin\Logic\SubCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubCategoryController extends Controller
{
    public function createAndViewSubCategory(){
        $categories =  DB::table('categories')->where([
            'has_child' => '1'
        ])->orderByDesc('category')->get();

        if(count($categories)){
            $subCategories =  DB::table('sub_categories')->orderByDesc('id')->get();

            return view('admin.sub-category.sub-category-add-view',compact('categories','subCategories'));
        }
        else{
$err =  'You need to add Category before adding sub category';
return view('admin.error',compact('err'));
        }

        }
        public function storeSubCategory(Request $request){
            DB::table('sub_categories')
            ->insert([
                'sub_category'=>$request->subCategory,
                'category'=>$request->category,
            ]);
return back()->with('subCategoryAdded','Sub category has been added successfully.');
        }
        public function deleteSubCategory($id){
            DB::table('sub_categories')->where(['id'=>$id])->delete();
            return back()->with('deleted','Sub Category has been deleted successfully.');
                }
                public function editSubCategory($id){
                    $categories = DB::table('categories')->get();
                    $subCategory =   DB::table('sub_categories')->where(['id'=>$id])->get();
                    return view('admin.sub-category.sub-category-edit',compact('categories','subCategory'));
                        }
                        public function updateSubCategory(Request $request){

                            DB::table('sub_categories')
                            ->where(['id'=>$request->id])
                            ->update(
                                [
                                    'sub_category'=>$request->subCategory,
                                    'category'=> $request->category
                                ]
                                );
                            return back()->with('updated','Sub Category has been updated');
                                }
}
