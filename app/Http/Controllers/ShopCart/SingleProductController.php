<?php

namespace App\Http\Controllers\ShopCart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class SingleProductController extends Controller
{
    public function index(){

        $categoris= Category::where('parent_id',NULL)->get();
        return  view('shop_cart.single-product',compact('categoris'));
    }
}
