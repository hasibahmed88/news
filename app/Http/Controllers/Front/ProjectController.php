<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Front\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index(){
        return view('front.home.home',[
            'categories'    =>      Category::where('status',1)->get(),
            'blogs'         =>      DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->take(4)
                                        ->where('blogs.status',1)
                                        ->orderBy('id','desc')
                                        ->get(),
            'popular_blogs' =>      DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('blogs.status',1)
                                        ->take(6)
                                        ->orderBy('hit_count','desc')
                                        ->get(),
            'hot_newses'    =>      DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('hot_news',1)
                                        ->take(5)
                                        ->where('blogs.status',1)
                                        ->orderBy('id','desc')
                                        ->get(),
            'trending_newses'=>     DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('trending_news',1)
                                        ->take(10)
                                        ->where('blogs.status',1)
                                        ->orderBy('id','desc')
                                        ->get(),
            'featured_newses'=>      DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('featured',1)
                                        ->take(4)
                                        ->where('blogs.status',1)
                                        ->orderBy('id','desc')
                                        ->get(),
            'best_weeks'=>          DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('best_week',1)
                                        ->take(10)
                                        ->where('blogs.status',1)
                                        ->orderBy('id','desc')
                                        ->get(),
            'recomendeds'=>          DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->take(4)
                                        ->inRandomOrder()
                                        ->where('blogs.status',1)
                                        ->orderBy('id','desc')
                                        ->get(),
        ]);
    }

    // About us

    public function aboutUs(){
        return view('front.home.about');
    }

    // Contact us
    public function contactUs(){
        return view('front.home.contact-us');
    }

    // All News
    public function allNews(){
        return view('front.home.all-news',[
            'recent_single' =>      DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('blogs.status',1)
                                        ->first(),
            'recent_newses' =>      DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->skip(1)
                                        ->orderBy('id','desc')
                                        ->take(4)
                                        ->where('blogs.status',1)
                                        ->get(),
        ]);
    }

    // Category news

    public function categoryNews($id){
        return view('front.home.category-news',[
            'category_name' =>      Category::find($id),
            'blogs'         =>      DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->orderBy('id','desc')
                                        // ->inRandomOrder()
                                        ->where('category_id',$id)
                                        ->where('blogs.status',1)
                                        ->paginate(5),
            'featured_newses'   =>   DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('featured',1)
                                        ->take(8)
                                        ->orderBy('id','desc')
                                        ->where('blogs.status',1)
                                        ->get(),
        ]);
    }

    public function blogDetails($id){
        $blog = Blog::find($id);
        $blog->hit_count += 1;
        $blog->save();
        return view('front.home.news-details',[

            'blog'              =>  DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('blogs.id',$id)
                                        ->orderBy('id','desc')
                                        ->where('blogs.status',1)
                                        ->first(),

            'random_blogs'      =>  DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->take(4)
                                        ->inRandomOrder()
                                        ->where('blogs.status',1)
                                        ->get(),

            'featured_newses'   =>   DB::table('blogs')
                                        ->join('categories','blogs.category_id','=','categories.id')
                                        ->select('blogs.*','categories.category_name')
                                        ->where('featured',1)
                                        ->take(4)
                                        ->where('blogs.status',1)
                                        ->orderBy('id','desc')
                                        ->get(),
            'comments'          =>   DB::table('comments')
                                        ->join('visitors','comments.visitor_id','=','visitors.id')
                                        ->select('comments.*','visitors.first_name','visitors.last_name')
                                        ->where('blog_id',$id)
                                        ->orderBy('id','desc')
                                        ->where('status',1)
                                        ->paginate(5)

        ]);
    }

}
