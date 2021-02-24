<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'blog_title',
        'blog_short_description',
        'blog_long_description',
        'blog_image',
        'status',
        'hot_news',
        'trending_news',
        'best_week',
    ];

// New blog info

    public static function newBlogInfo($request){
        $blog = new Blog();

        $image          =   $request->file('blog_image');
        $image_name     =   uniqid().$image->getClientOriginalName();
        $image_path     =   'admin/blog-image';
        $image->move($image_path,$image_name);

        $blog->category_id              =   $request->category_id;
        $blog->blog_title               =   $request->blog_title;
        $blog->blog_short_description   =   $request->blog_short_description;
        $blog->blog_long_description    =   $request->blog_long_description;
        $blog->blog_image               =   $image_name;
        $blog->status                   =   $request->status;
        $blog->hot_news                 =   $request->hot_news;
        $blog->trending_news            =   $request->trending_news;
        $blog->best_week                =   $request->best_week;
        $blog->featured                 =   $request->featured;
        $blog->save();
    }


    public static function updateBlogInfo($request){
        $blog = Blog::find($request->id);
        $image = $request->file('blog_image');
        if ($image) {
            unlink('admin/blog-image/'.$blog->blog_image);
            $image_name = uniqid().$image->getClientOriginalName();
            $image_path = 'admin/blog-image/';
            $image->move($image_path,$image_name);
        }

        $blog->category_id              =   $request->category_id;
        $blog->blog_title               =   $request->blog_title;
        $blog->blog_short_description   =   $request->blog_short_description;
        $blog->blog_long_description    =   $request->blog_long_description;
        if (isset($image)) {
            $blog->blog_image           =   $image_name;
        }
        $blog->status                   =   $request->status;
        $blog->hot_news                 =   $request->hot_news;
        $blog->trending_news            =   $request->trending_news;
        $blog->best_week                =   $request->best_week;
        $blog->featured                 =   $request->featured;
        $blog->save();
    }

}
