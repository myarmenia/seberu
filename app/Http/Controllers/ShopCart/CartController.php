<?php

namespace App\Http\Controllers\ShopCart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');


    }
    public function index(){
        $user_id=Auth::user()->id;
        $cart=Cart::with('products')->where('user_id',$user_id)->get();



      return view('shop_cart.index',compact('cart'));
    }

    public function store(Request $request){

        // dd($request->color_array!="null");
        $product=Product::find($request->prod_id);
        if($request->color_array!=null){

            foreach($request->color_array as $item){

                $insert_cart=Cart::create([
                    "user_id" => Auth::id(),
                    "prod_id" => $product->id,
                   "quantity" => 1,
     "product_quantity_price" => $product->price,
              "product_color" => $item
                ]);


            }
            if($insert_cart){
                echo "inserted";
            }

        }else{
            dd("aaa");
            $insert_cart=Cart::create([
                "user_id" => Auth::id(),
                "prod_id" => $product->id,
               "quantity" => 1,
 "product_quantity_price" => $product->price,
            ]);
            if($insert_cart){
                echo "inserted";
            }

        }


    //             $insert_cart=Cart::create([
    //                 "user_id" => Auth::id(),
    //                 "prod_id" => $product->id,
    //                "quantity" => 1,
    //  "product_quantity_price" => $product->price
    //             ]);

    //             if($insert_cart){
    //                 echo "inserted";
    //             }

    }
}
