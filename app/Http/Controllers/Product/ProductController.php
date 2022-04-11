<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductPhoto;
use App\Services\CategoryService;
use App\Services\CharactService;
use Illuminate\Http\Request;
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

        $categories_characters = $this->categoryServ->getCharacters($request->category_id);

        $categories_subcategory = $this->categoryServ->getChilds($request->category_id);
        $category_array=[$categories_characters, $categories_subcategory];

        echo json_encode($category_array,true);
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
        // dd($request->characters);

        // $validated = $request->validate([
            $validated = ([
                 "category" => 'required',
              "subcategory" => 'required',
              "productname" => 'required|max:100',
                 "quantity" => 'required',
                  "comment" => 'required',
            "product_price" => 'required|integer',
                 "img_path" => 'required',
               "img_path.*" => 'mimes:jpg,png,jpeg,gif,svg'

        ]);


        // $validated = $request->validated();
            if($request->has('Размер')){
                $validated["Размер"]='required';
            }

           if($request->has('Модел')){
                $validated["Модел"]='required';
            }
            if($request->has('Цвет')){
                $validated["Цвет"]='required';
            }

           if($request->has('Бренды')){
                $validated["Бренды"]='required';
            }

            if($request->has('Материал')){
                $validated["Материал"]='required';
            }
        // return $request->validate($validated);


        $create_product=Product::create([
            "category_id" => $request->subcategory,
                   "name" => $request->productname,
               "quantity" => $request->quantity,
                  "price" => $request->product_price,
             "sale_price" => $request->selling_price,
            "description" => $request->comment
        ]);

        foreach($request->img_path as $file){

            Storage::put('admin/images/product', $file);
            $create_product_photo = ProductPhoto::create([
                "product_id" => $create_product->id,
                  "img_path" => $file,
                    "status" => 0
            ]);
        }


        // $array= [
        //     2 =>"tiny",

        //     3 => "green",

        //     4 => "Zara"
        // ];
        // $array=[1,2,3];
        $array= [1 => ['value' => true], 2 => ['value' => true], 3 => ['value' => true] ];
        // dd($create_product->tags);

        $create_product->tags()->sync($array);

        echo "Продукт добавлен";

        // return redirect()->back();

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
