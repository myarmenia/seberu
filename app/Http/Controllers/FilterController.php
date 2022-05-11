<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryCharact;
use App\Models\Product;
use App\Models\ProductCharact;
use App\Models\ProductPhoto;
use DB;



class FilterController extends Controller
{
    public function index_shopcart(Request $request ,$id){
        $categoris_show= Category::find($id);
        $categoris= Category::where('parent_id',NULL)->find($id);
        $Product = Product::where('category_id',$id)->with('product_chars','product_photos')->get();
        $product_filter = Product::select('name','category_id')->where('category_id',$id)->distinct('name')->get();

        $Product1 = ProductCharact::select('value' ,'product_id')->where('chars_id' , 1)->distinct('value')->get();
        $Product2 = ProductCharact::select('value','product_id')->where('chars_id' , 2)->distinct('value')->get();
        $Product3 = ProductCharact::select('value','product_id')->where('chars_id' , 3)->distinct('value')->get();
         if(count($Product) > 0){
            return view('shop_cart.shop_cart_index',compact(
                'categoris',
                'Product',
                'categoris_show',
                'product_filter',
                'Product1',
                'Product2',
                'Product3',));
         }else{
            dd('voch');
         }
     }


     public function productshop(Request $request)
    {
        $query = Product::orderBy('created_at','desc')->with('product_photos','product_chars');
      if($request->keyword){
          $query = $query->where('title','like','%'.$keyword.'%');
        }
      if($request->min_price && $request->max_price){
          $query = $query->where('sale_price','>=',$request->min_price);
          $query = $query->where('sale_price','<=',$request->max_price);
        }
        $products = $query->get();
        return view('shop_cart.ajax', compact('products'));

    }

    public function search_mobile_name(Request $request){
        $query = ProductCharact::orderBy('value','desc');
        $query12 = Product::orderBy('name','desc')->with('product_photos','product_chars');

        if($request->keyword){
            $query_item = $query->where('value','like','%'.$request->keyword.'%');
            $query_item_sec = $query12->where('name','like','%'.$request->keyword.'%');
        }

        $prod = $query_item->get();
        $prod1 = $query_item_sec->get();
        // dd($prod1);
        return view('shop_cart.ajax_brand_name', compact('prod','prod1'));


    }
    public function search_mobilenumber(Request $request){
        $query = ProductCharact::orderBy('value','desc');
        $query12 = Product::orderBy('id','desc')->with('product_photos','product_chars');

        if($request->keyword){
            $query_item = $query->where('product_id','like','%'.$request->keyword.'%');
           dd($query_item);
            $query_item_sec = $query12->where('id','like','%'.$request->keyword.'%');
        }
        $prod = $query_item->get();
        $prod1 = $query_item_sec->get();
        // dd($prod1);
        return view('shop_cart.ajax_brand_number', compact('prod','prod1'));
    }

    public function search_mobile_brand(Request $request){

        // dd($request->all());
        $query = ProductCharact::orderBy('value','desc');
        $query12 = Product::orderBy('id','desc')->with('product_photos','product_chars');

        if($request->brande){
            $query_item = $query->where('product_id','like','%'.$request->brande.'%');
            $query_item_sec12 = $query12->where('id','like','%'.$request->brande.'%');
        }
        

        $prod = $query_item->get();
        $prod1 = $query_item_sec12->get();
        return view('shop_cart.ajax_brand_brand', compact('prod','prod1'));

    }

}
