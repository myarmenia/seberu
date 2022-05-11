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
// dd($cart);
        return view('shop_cart.index',compact('cart'));

    }

    public function store(Request $request){
        // dd($request->prod_id);

        $product=Product::find($request->prod_id);
        if($request->color_array!=null){

            foreach($request->color_array as $item){

                $insert_cart=Cart::create([
                    "user_id" => Auth::id(),
                    "prod_id" => $product->id,
                   "quantity" => 1,
     "product_quantity_price" => $product->price,
              "product_color" => $item,
                "total_price" => $product->price
                ]);


            }
            if($insert_cart){
                echo "inserted";
            }

        }else{
            // dd($request->color_array);

            $insert_cart=Cart::create([
                "user_id" => Auth::id(),
                "prod_id" => $product->id,
                "quantity" => 1,
 "product_quantity_price" => $product->price,
 "total_price"=>' ',
            "total_price" => $product->price
            ]);
            if($insert_cart){
                echo "inserted";
            }

        }
    }

    public function increaseProductCount(Request $request){

        $cart=Cart::where('id',$request->cart_id)->first();


        $cart_update=$cart->update([
                'quantity'=> $request->action_btn,
             'product_quantity_price'=> $request->product_amount
        ]);
        if( $cart_update){
            echo "updated";
        }
    }
    public function delete(Request $request){
        // dd($request->product_id);
        $remove_product_from_cart=Cart::find($request->product_id);
        $remove_product_from_cart->delete();
        echo "Товар успешно удален из корзины";
    }
    public function side(){
        return view('user.sidebar_menu');
    }

}
