<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Front\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function visitorComment(Request $request){
        $comment = new Comment();
        $comment->blog_id   =   $request->blog_id;
        $comment->visitor_id   =   $request->visitor_id;
        $comment->comment   =   $request->comment;
        $comment->save();

        return redirect('/news/news-details/'.$request->blog_id)->with('message','Comment successfull! Comment will be publish as soon as possible!');
    }
}
