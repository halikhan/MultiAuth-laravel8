<?php

namespace App\Http\Controllers\Admin\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function subcategories()
    {
        $category = DB::table('categories')->get();
        $subcat = DB::table('sub_categories')
            ->join('categories', 'sub_categories.category_id', 'categories.id')
            ->select('sub_categories.*', 'categories.category_name')
            ->get();
        return view('admin.category.subcategory', compact('category', 'subcat'));
    }


    public function storesubcat(Request $request)
    {

        $validateData = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',

        ]);

        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('sub_categories')->insert($data);
        $notification = array(
            'messege' => 'Sub Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }



    public function DeleteSubcat($id)
    {
        DB::table('sub_categories')->where('id', $id)->delete();
        $notification = array(
            'messege' => 'Sub Category Deleted Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }


    public function EditSubcat($id)
    {

        $subcat = DB::table('sub_categories')->where('id', $id)->first();
        $category = DB::table('categories')->get();
        return view('admin.category.edit_subcat', compact('subcat', 'category'));
    }

    public function UpdateSubcat(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['subcategory_name'] = $request->subcategory_name;
        DB::table('sub_categories')->where('id', $id)->update($data);
        $notification = array(
            'messege' => 'Sub Category Updated Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('sub.categories')->with($notification);
    }
}
