<?php

namespace App\Http\Controllers\Category\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
      $data = Category::first();
      dd($data);
    }
}
