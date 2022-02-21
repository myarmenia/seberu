<?php
namespace App\Services;
use App\Models\Role;

class RoleService
{

  public function getAll(){
    return Role::whereNotIn('name',['root_admin','admin'])->get();
  }

  public function create($data){
      Role::create($data);
  }

  public function integratePermission(Int $role_id,Int $perm_id){
    $role = $this->find($role_id);
    $role->permission()->attach($perm_id);
  }

  public function removePermission(Int $role_id,Int $perm_id){
    $role = $this->find($role_id);
    $role->permission()->detach($perm_id);
  }

  public function integrateOrRemovePerm(Int $role_id,Int $perm_id){
    $role = $this->find($role_id);
    if($role->permissions->contains($perm_id)){
      $role->permissions()->detach($perm_id);
    }else{
      $role->permissions()->attach($perm_id);
    }

  }

  public function delete(Int $id){
    $this->find($id)->delete();
  }

  private function find(Int $role_id){
    return Role::find($role_id);
  }


}
?>
