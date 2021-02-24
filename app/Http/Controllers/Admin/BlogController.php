<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function addBlog(){
        return view('admin.blog.add-blog',[
            'categories'    =>   Category::where('status',1)->get(),
        ]);
    }

    public function manageBlog(){
        return view('admin.blog.manage-blog',[
            'blogs'    =>   DB::table('blogs')
                                    ->join('categories','blogs.category_id','=','categories.id')
                                    ->select('blogs.*','categories.category_name')
                                    ->get(),
        ]);
    }

    // view blog

    public function viewBlog($id){
        return view('admin.blog.view-blog',[
            'categories'    =>   Category::where('status',1)->get(),
            'blog'  =>  Blog::find($id),
        ]);
    }


    public function newBlog(Request $request){
        Blog::newBlogInfo($request);
        return redirect('/blog/add-blog')->with('message','Blog added successfull!');
    }

    // Edit blog

    public function editBlog($id){
        return view('admin.blog.edit-blog',[
            'categories'    =>  Category::where('status',1)->get(),
            'blog'  =>  Blog::find($id),
        ]);
    }

    public function updateBlog(Request $request){

        Blog::updateBlogInfo($request);
        return redirect('/blog/manage-blog')->with('message','Blog update successfully!');

    }

    public function deleteBlog(Request $request){
        $blog = Blog::find($request->id);
        unlink('admin/blog-image/'.$blog->blog_image);
        $blog->delete();
        return redirect('/blog/manage-blog')->with('message','Blog delete successfully!');
    }

}
