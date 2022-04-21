<?php

namespace App\Http\Controllers\Frontuser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class indexController extends Controller
{
     public function index(){
        $categoris= Category::where('parent_id',NULL)->get();
         return view('user-profile.index',compact('categoris'));
     }
}
