<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function manageCategory(){
        return view('admin.category.manage-category',[
            'categories'    =>  Category::all(),
        ]);
    }

    // New Category

    public function newCategory(Request $request){
        Category::newCategoryInfo($request);
        return redirect('/category/add-category')->with('message','Category save successfully!');
    }

    // Edit category

    public function editCategory($id){
        return view('admin.category.edit-category',[
            'category'  =>  Category::find($id),
        ]);
    }

    // Update Category

    public function updateCategory(Request $request){
        $category = Category::find($request->id);
        $category->category_name    =   $request->category_name;
        $category->category_description    =   $request->category_description;
        $category->status    =   $request->status;
        $category->save();

        return redirect('/category/manage-category')->with('message','Category update successfully!');
    }

    public function deleteCategory(Request $request){
        $blog = Blog::where('category_id',$request->id)->first();
        if ($blog) {
            return redirect('/category/manage-category')->with('message','Your cannot delete this category. Because some blogs are availbale in this category!');
        }
        $category = Category::find($request->id);
        $category->delete();

        return redirect('/category/manage-category')->with('message','Category delete successfully!');
    }

    // publish and unpublish

    public function unpublishCategory($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();

        return redirect('/category/manage-category')->with('message','Category unpublish successfully!');
    }
    public function publishCategory($id){
        $category = Category::find($id);
        $category->status = 1;
        $category->save();

        return redirect('/category/manage-category')->with('message','Category publish successfully!');
    }

}
