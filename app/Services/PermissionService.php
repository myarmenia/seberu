<?php
namespace App\Services;
use App\Models\Permission;

class PermissionService
{

  public function index(){
    return Permission::get();
  }

  public function create($data){
    Permission::create($data);
  }

  public function update($data){
    $perm = Permission::find($data['id']);
    $perm['name'] = $data['name'];
    $perm->save();
  }

  public function delete(Int $id){
    Permission::find($id)->delete();
  }


}
?>
