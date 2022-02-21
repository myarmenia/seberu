<?php

namespace App\Http\Controllers\ShopCart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
      return view('shop_cart.index');
    }
}
