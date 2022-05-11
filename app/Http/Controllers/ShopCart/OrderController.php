<?php

namespace App\Http\Controllers\ShopCart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function generateToken(Request $request){
        $user_id=Auth::id();
        $generate_token=Str::random(10);
        foreach($request->prod_array as $item){
            $cart=Cart::find($item);
            $cart->update([
                "token"=>$generate_token
            ]);

        }
        $order=Order::create([
               'user_id' => $user_id,
            'cart_token' => $generate_token,
                 'price' => $request->total_amount,
        ]);
        $carts=Cart::where('token',$generate_token)->get();
        foreach($carts as $item){

            $order_item = OrderItem::create([
                'prod_id'=>$item->prod_id,
                'order_id'=>$order->id,
                'quantity'=>$item->quantity,
                'product_quantity_price'=>$item->product_quantity_price
            ]);
        }
        if($order_item){

            foreach($carts as $item){
                $item->delete();
            }
             echo "Заказ принят";
        }
        // $cart=Cart::where('user_id',Auth::id())->get();
        // if(count($cart)<1){
        //     echo "В настоящее время корзина пуста";
        // }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
