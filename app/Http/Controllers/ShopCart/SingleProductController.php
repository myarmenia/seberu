<?php

namespace App\Http\Controllers\ShopCart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class SingleProductController extends Controller
{
    public function index(Request $request,$id ){


        $categoris= Category::where('parent_id',NULL)->get();
        $product=Product::with('product_photos')->where('id',$id)->first();
//    dd($product->category->characts);

        $color=Color::all();
        $color_char=[];
        foreach($product['product_chars'] as $key){
            if($key->name=='Цвет'){
                array_push($color_char,$key->pivot->value);
            }
        }

       $like_product=Product::with('product_photos')->where([
           ['id','!=',$product->id],
           ['category_id','=',$product->category->id],
           ])->get();
        return  view('shop_cart.single-product',compact('categoris','product','color_char','like_product'));
    }
}
