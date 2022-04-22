<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index(){

        // $cat= Category::where('parent_id',NULL)->get();
        // return view('welcome',["categoris" => $cat]);
        return view('welcome');

    }


    // public function getById(Request $request)
    // {

    //     $parent_id = $request->cat_id;
    //     $subcategories = Category::where('parent_id',$parent_id)->with('child')->get();
    //     return response()->json([
    //         'subcategories' => $subcategories
    //     ]);
    // }
}
