<?php

namespace App\Http\Controllers;

use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //  get all categories
    public function publishedCategories(){
        return Category::where('status',1)->get();
    }

    // category blog
    public function categoryBlog($id){
        return Blog::where('category_id',$id)->where('status',1)->get();
    }

    // Latest Blog
    public function latestBlog(){
        return Blog::where('status',1)->skip(1)->take(6)->get();
    }

    // Blog details
    public function blogDetails($id){
        return Blog::find($id);
    }

    public function hello(){
        return "Hello world";
    }


}
