<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Services\RoleService;
use Illuminate\Support\Facades\Validator;

class AdminEditUserController extends Controller
{

    private $userServ;

    public function __construct(){
      $this->userServ = new UserService;
    }

    public function getAllUsers(){
      $users = $this->userServ->getAllUsers('user');
      return view('admin.all_users.index',['users' => $users]);
    }

    public function spamUser(Request $request){
      $this->userServ->spamUser($request['id']);
      return redirect()->back()->with('message','Changed');
    }

    public function userSinglePage($id){
      $roleServ = new RoleService;
      $roles = $roleServ->getAll();
      $user = $this->userServ->find($id);
      return view('admin.all_users.user_single',['user' => $user,'roles'=>$roles]);
    }

    public function userAddRole(Request $request){
      $validator = Validator::make($request->all(), [
        'role_id' => 'required|integer',
        'id' => 'required|integer'
      ]);

      if($validator->fails()){
          return response()->json($validator->errors(), 400);
      }

      $this->userServ->integrateOrRemoveRole($request['id'],$request['role_id']);

      return response()->json([
        'status' => 'sucsess'
      ]);
    }

    public function userEditData(Request $request){
      $validator = Validator::make($request->all(), [
          'name' => ['nullable', 'string', 'max:255'],
          'patronymic' => ['nullable', 'string', 'max:255'],
          'surname' => ['nullable', 'string', 'max:255'],
      ]);

      if($validator->fails()){
          return response()->json($validator->errors(), 400);
      }

      $this->userServ->edit($request['id'],$request->all());

      return response()->json([
        'status' => 'sucsess'
      ]);

    }
}
