<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'category_description',
        'status',
    ];

    // New category info

    public static function newCategoryInfo($request){
        // DB::table('categories')->insert([
        //     'category_name'         =>  $request->category_name,
        //     'category_description'  =>  $request->category_description,
        //     'status'                =>  $request->status,
        // ]);
        $category = new Category();
        $category->category_name            =   $request->category_name;
        $category->category_description     =   $request->category_description;
        $category->status                   =   $request->status;
        $category->save();
    }

}
