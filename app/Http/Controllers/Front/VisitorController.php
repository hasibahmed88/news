<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Front\Visitor;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisitorController extends Controller
{
    // Visitor Login
    public function visitorLogin(){
        return view('front.visitor.visitor-login',[
            'categories'    =>      Category::where('status',1)->get(),
            'blogs'         =>      DB::table('blogs')
                                    ->join('categories','blogs.category_id','=','categories.id')
                                    ->select('blogs.*','categories.category_name')
                                    ->take(4)
                                    ->where('blogs.status',1)
                                    // ->inRandomOrder()
                                    ->get(),

        ]);
    }

    // Visitor register

    public function visitorRegister(){
        return view('front.visitor.visitor-register',[
            'categories'    =>      Category::where('status',1)->get(),
            'blogs'         =>      DB::table('blogs')
                                    ->join('categories','blogs.category_id','=','categories.id')
                                    ->select('blogs.*','categories.category_name')
                                    ->take(4)
                                    ->where('blogs.status',1)
                                    // ->inRandomOrder()
                                    ->get(),
        ]);
    }

    // Check email

    public function checkEmail($email){
        $visitor = Visitor::where('email',$email)->first();
        if($visitor){
            return json_encode('Email address already used!') ;
        }
        else{
            return json_encode('Email address available');
        }
    }
    public function loginCheckEmail($email){
        $visitor = Visitor::where('email',$email)->first();
        if($visitor){
            return json_encode('Email address valid!');
        }
        else{
            return json_encode('Email address invalid');
        }
    }


    // New visitor

    public function newVisitor(Request $request){
        Visitor::newVisitorInfo($request);
        return redirect('/');
    }

    public function newVisitorLogin(Request $request){
        $visitor = Visitor::where('email',$request->email)->first();

        if ($visitor) {
            if (password_verify($request->password, $visitor->password)) {
                Session()->put('visitorId',$visitor->id);
                Session()->put('visitorName',$visitor->first_name.' '.$visitor->last_name);
                return redirect('/');
            } else {
                return redirect('/visitor-login')->with('message','Invalid password!');
            }
        }
        else{
            return redirect('/visitor-login')->with('message','Invalid email address!');
        }
    }

    // Visitor logout

    public function visitorLogout(){
        Session()->forget('visitorId');
        Session()->forget('visitorName');
        return redirect('/');
    }

}
