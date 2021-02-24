<?php

namespace App\Providers;

use App\Models\Admin\Category;
use App\Models\Admin\LogoImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View()->composer('front.*',function($view){
            $view->categories    =  Category::where('status',1)->get();
            $view->blogs         =  DB::table('blogs')
                                    ->join('categories','blogs.category_id','=','categories.id')
                                    ->select('blogs.*','categories.category_name')
                                    ->where('blogs.status',1)
                                    ->orderBy('id','desc')
                                    ->paginate(4);
            $view->logo_image   =   LogoImage::where('status',1)->first();
        });
    }
}
