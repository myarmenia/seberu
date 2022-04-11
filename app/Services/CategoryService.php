<?php
namespace App\Services;
use App\Models\Category;

class CategoryService
{

  public function getAll($id = null){
    return Category::where('parent_id',$id)->with('child')->get();
  }
//   getting subcategories
  public function getChilds($id = null){
    return Category::where('id',$id)->with('child')->first();
  }
//getting categories  characters(model,size)
  public function getCharacters($id = null){
    return Category::where('id',$id)->with('characts')->first();
  }
//   public function getColor($id = null){
//     return Category::where('id',$id)->with('characts')->first();
//   }



  public function getParents($id = null){
    return Category::with('parents')->find($id) ?? null;

  }

  public function create($data){
    Category::create($data);
  }

  public function delete(Int $id){
    $this->find($id)->delete();
  }

  public function update(Int $id,$data){
    $this->find($id)->update($data);
  }

  public function spam(Int $id){

    $cat = $this->find($id);
    $cat['spam'] = !$cat['spam'];
    //$cat->children()->update(['spam'=>$cat['spam']]);
    $cat->save();
  }

  public function find(Int $id){
    return Category::find($id);
  }







}
?>
