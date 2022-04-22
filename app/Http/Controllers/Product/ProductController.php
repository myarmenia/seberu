<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Charact;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Services\CategoryService;
use App\Services\CharactService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public $categoryServ;
    public function __construct(){
        $this->categoryServ = new CategoryService;
      }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $categories = Category::where('parent_id',null)->get();
        return view('admin.product.index',compact('categories'));
    }

    public function getSubcategory(Request $request){

        // $ss=Category::with('child')->with('children')->where('id',$request->category_id)->get();


        $categories_characters = $this->categoryServ->getCharacters($request->category_id);

        $categories_subcategory = $this->categoryServ->getChilds($request->category_id);
// dd($categories_subcategory);
        $color=Color::all();

        // $category_array=[$categories_characters, $categories_subcategory,$color];

        $category_array=[$categories_subcategory];
        echo json_encode($category_array,true);
    }
    public function getSubcategoryChild(Request $request){

        // $category_id=Category::where('id',$request->category_id)->with('child')->first();
        $categories_subcategory = $this->categoryServ->getChilds($request->category_id);
        $color=Color::all();
        $categories_characters = $this->categoryServ->getCharacters($request->category_id);
        // dd($categories_characters->characts);
        $category_array=[$categories_subcategory,$categories_characters,$color];
        echo json_encode($category_array,true);
        // echo $category_id;
    }

    public function allProduct(){

        $all_product=Product::with('characts')->with('product_chars')->get();

        return view('admin.product.all_products',compact('all_product'));
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


            $validated =([
                 "category" => 'required',
              "subcategory" => 'required',
              "selectchild" => 'required',
              "productname" => 'required|max:100',
                 "quantity" => 'required',
                  "comment" => 'required',
            "product_price" => 'required|integer',
                 "img_path" => 'required',
               "img_path.*" => 'mimes:jpg,png,jpeg,gif,svg',
               "characters.*.value" => 'required|nullable',
            ]);
            $messages=([
                "characters.*.value.required" => 'The field is required',
            ]);

            if($request->has('color')){
                $validated["color"]='required';
            }
            // if($request->has('selectchild')){
            //     $validated["selectchild"]='The field is required';
            // }


            // dd($validated);

        $request->validate($validated, $messages);

        $create_product=Product::create([
            // "category_id" => $request->subcategory,
            "category_id" => $request->selectchild,
                   "name" => $request->productname,
               "quantity" => $request->quantity,
                  "price" => $request->product_price,
             "sale_price" => $request->selling_price,
            "description" => $request->comment,

        ]);

        $mkdir=Storage::makeDirectory('public/admin/images/product/'.$create_product->id);
        foreach($request->img_path as $file){

            $path_img = Storage::put('public/admin/images/product/'.$create_product->id, $file);
            $create_product_photo = ProductPhoto::create([
                "product_id" => $create_product->id,
                  "img_path" => $path_img,
                    "status" => 0
            ]);
        }
        if($request->has('character_colors')){

            foreach($request->character_colors as $key=>$item){

                foreach($item as $k=>$value){
                     if(is_array($value)){
                        $create_product->product_chars()->attach([$key=>$value]);
                     }
                }
            }
        }
            foreach($request->characters as $key=>$item){
                 $create_product->product_chars()->attach([$key=>$item]);
            }


        echo "Продукт добавлен";



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
        $product=Product::with('product_chars')->find($id);
        $category=Category::where('id',$product->category_id)->first();

        $category_characts = Category::where('id',$id)->with('parents')->get();

        $color=Color::all();
        $color_char=[];
        foreach($product['product_chars'] as $key){
            if($key->name=='Цвет'){
                 array_push($color_char,$key->pivot->value);
             }
        }

        return view('admin.product.edit_product',compact('product','category','color','color_char'));
        // return view('admin.product.edit_product',compact('product','category','category_characts','color','color_char'));
    }
    public function deletePhoto(Request $request){

        $product_photo=ProductPhoto::find($request->key);

        Storage::delete($product_photo->img_path);

        $product_id=$product_photo->product_id;

          $product_photo->delete();
          $product_isset=ProductPhoto::where('product_id', $product_id)->first();

          if(!$product_isset){

            $response=Storage::deleteDirectory($product_id);

          }else{
            //   dd('ka');
          }


        echo "deleted";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)

    {
        // dd($request->subcategory);

        $validated =([
            "category" => 'required',
         "subcategory" => 'required',
         "productname" => 'required|max:100',
            "quantity" => 'required',
             "comment" => 'required',
       "product_price" => 'required|integer',
        //     "img_path" => 'required',
        //   "img_path.*" => 'mimes:jpg,png,jpeg,gif,svg',
          "characters.*.value" => 'required|nullable',
       ]);
       $messages=([
           "characters.*.value.required" => 'The field is required',
       ]);

       if($request->has('color')){
           $validated["color"]='required';
       }



    $product_photo = ProductPhoto::where('product_id',$id)->get();

        if(count( $product_photo)==0){
            $validated['img_path']='required';
            // $validated['img_path']='required|mimes:jpg,png,jpeg,gif,svg,JPG,PNG,JPEG,GIF,SVG';
        }



    $request->validate($validated, $messages);



    $request->validate($validated, $messages);
    $update_product=Product::where('id',$id)->update([
        "category_id" => $request->subcategory,
               "name" => $request->productname,
           "quantity" => $request->quantity,
              "price" => $request->product_price,
         "sale_price" => $request->selling_price,
        "description" => $request->comment
    ]);


        if($request->has('img_path')){

            foreach($request->img_path as $file){

                if(!file_exists(Storage::path('public/admin/images/product/'.$id))) {

                    $path_img = Storage::put('public/admin/images/product/'.$id, $file);
                    $create_product_photo = ProductPhoto::create([
                        "product_id" => $id,
                        "img_path" => $path_img,
                            "status" => 0
                    ]);
                }else{
                    $path_img = Storage::put('public/admin/images/product/'.$id, $file);
                    $create_product_photo = ProductPhoto::create([
                        "product_id" => $id,
                        "img_path" => $path_img,
                            "status" => 0
                    ]);


                }
            }
        }

        $product=Product::find($id);
        $product->product_chars()->detach();
       if($request->has('character_colors')){
            foreach($request->character_colors as $key=>$item){
                foreach($item as $k=>$value){
                     if(is_array($value)){
                        $product->product_chars()->attach([$key=>$value]);
                     }
                }
            }
        }
        // dd($product->characters);
            foreach($request->characters as $key=>$item){
                $product->product_chars()->attach([$key=>$item]);
            }

         echo "Продукт обновлен";


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        $delete_product = Product::find($request->id);



        //  $response=Storage::deleteDirectory($request->id);

        $delete_product->delete();
        echo 'Deleted';

    }
}
