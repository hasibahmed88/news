<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\LogoImage;
use Illuminate\Http\Request;
use Faker\Provider\Image;

class ImageController extends Controller
{
    public function manageLogo(){
        return view('admin.logo.manage-logo',[
            'images'    =>  LogoImage::all(),
        ]);
    }

    public function addLogo(Request $request){
        $logo = new LogoImage();
        $image = $request->file('logo');
        $image_name =  uniqid().$image->getClientOriginalName();
        $image_location = 'admin/logo-image/';
        $image->move($image_location,$image_name);

        $logo->logo     =   $image_name;
        $logo->status   =   $request->status;
        $logo->save();

        return redirect('logo/manage-logo')->with('message','Image upload successfull!');
    }

    // Publish & Unpublish

    public function unpublishLogo($id){
        $logo = LogoImage::find($id);
        $logo->status = 0;
        $logo->save();

        return redirect('logo/manage-logo')->with('message','Logo unpublish successfully!');
    }
    public function publishLogo($id){
        $logo = LogoImage::find($id);
        $logo->status = 1;
        $logo->save();

        return redirect('logo/manage-logo')->with('message','Logo publish successfully!');
    }

    // Delete Logo

    public function deleteLogo(Request $request){
        $logo = LogoImage::find($request->id);
        unlink('admin/logo-image/'.$logo->logo);
        $logo->delete();
        return redirect('logo/manage-logo')->with('message','Logo delete successfully!');
    }

}
