<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Front\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function manageComment(){
        return view('admin.comment.manage-comment',[
            'comments'      =>  DB::table('comments')
                                ->join('blogs','comments.blog_id','=','blogs.id')
                                ->join('visitors','comments.visitor_id','=','visitors.id')
                                ->select('comments.*','blogs.blog_title','visitors.first_name','visitors.last_name')
                                ->get(),
        ]);
    }

    public function unpublishComment($id){
        $comment = Comment::find($id);
        $comment->status = 0;
        $comment->save();

        return redirect('/comment/manage-comment')->with('message','Comment unpublish successfull!');
    }

    public function publishComment($id){
        $comment = Comment::find($id);
        $comment->status = 1;
        $comment->save();

        return redirect('/comment/manage-comment')->with('message','Comment publish successfull!');
    }

    public function deleteComment(Request $request){
        $comment = Comment::find($request->id);
        $comment->delete();
        return redirect('/comment/manage-comment')->with('message','Comment delete successfull!');
    }

}
