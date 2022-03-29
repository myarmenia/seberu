<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use App\Services\SlugifyService;
use App\Services\CategoryService;

class CategoryController extends Controller
{

  public $categoryServ;

  public function __construct(){
    $this->categoryServ = new CategoryService;
  }
  public function index(Request $request){
    $validated = $request->validate([
        'id' => 'integer|nullable',
    ]);

    $id = $validated['id'] ?? null;
    $categories = $this->categoryServ->getAll($id);
    $parents = $this->categoryServ->getParents($id);
    return view('admin.categories.index',['categories' => $categories,'parents' => $parents]);
  }

  public function create(Request $request,$id = null){
    if($id && !Category::find($id)){
      return redirect()->back()->with('error','Category not found');
    }
    $request->merge(['parent_id' => $id]);
    $validated = $request->validate([
        'name' => 'required|max:100',
        'parent_id' => 'integer|nullable',
    ]);

    $this->categoryServ->create($validated);

    return redirect()->back()->with('message','Category Created');
  }

  public function delete(Request $request){
      $valdated = $request->validate(['id' => 'required|integer']);
      $this->categoryServ->delete($valdated['id']);
      return redirect()->route('categories')->with('mesage','Deleted');
  }

  public function update(Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:100',
      'id' => 'required|integer'
    ]);

    if($validator->fails()){
        return response()->json($validator->errors(), 400);
    }
      $this->categoryServ->update($request['id'],$request->all());

    return response()->json([
        'status' => 'sucsess'
      ]);
  }

  public function spam(Request $request){
    $validated = $request->validate([
        'id' => 'integer|required',
    ]);

    $this->categoryServ->spam($validated['id']);

    return redirect()->back()->with('mesage','Spam');

  }

  public function getById(Request $request){

    $datas = $this->categoryServ->getAll($request->cat_id);
    return response()->json([
        'datas' => $datas
    ]);


  }

}
