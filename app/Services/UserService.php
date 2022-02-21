<?php
namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{

  public function getAllUsers(){

    return User::whereDoesntHave('roles',function($q){
      $q->where('name','admin');
    })->where('id','!=',Auth::user()->id)->get();

  }

  public function getAllUsersByRole(String $role = 'user'){
    return User::whereHas('roles',function($q) use ($role){
      return $q->where('name', $role);
    })->get();
  }

  public function getUserById(Int $id){

  }

  public function spamUser($id){
    $user = User::find($id);
    $user['status'] = !$user['status'];
    $user->save();
  }

  public function integrateOrRemoveRole(Int $user_id,Int $role_id){
      $user = $this->find($user_id);

      if($user->roles->contains($role_id)){
        $user->roles()->detach($role_id);
      }else{
        $user->roles()->attach($role_id);
      }
  }

  public function edit($id,$data){
    $this->find($id)->update($data);
  }

  public function editMe($data){
    $data = array_filter($data,function($value){
       return !empty($value);
     });

     Auth::user()->update($data);
  }

  public function find(Int $id){
      return User::find($id);
  }





}



?>
