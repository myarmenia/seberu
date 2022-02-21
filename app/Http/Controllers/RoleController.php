<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Services\RoleService;
use App\Services\PermissionService;
use Illuminate\Support\Facades\Validator;

class RoleController extends Controller
{

  private $roleServ;

  public function __construct(){
    $this->roleServ = new RoleService;
  }

  public function index(){
    $roles = $this->roleServ->getAll();
    return view('admin.roles_and_permissions.roles',['roles' => $roles]);
  }

  public function create(Request $request){
    $validate = $request->validate([
      'name' => 'required|unique:roles'
    ]);
    $this->roleServ->create($validate);
    return redirect()->back()->with('message','Created');
  }

  public function singlePage($id){
    $permServ = new PermissionService();
    $perms = $permServ->index();
    $role = Role::with('permissions')->find($id);

    return view('admin.roles_and_permissions.role_single',['role' => $role,'perms' =>$perms]);
  }

  public function addOrDelPermission(Request $request){
      $validator = Validator::make($request->all(), [
        'perm_id' => 'required|integer',
        'id' => 'required|integer'
      ]);

      if($validator->fails()){
          return response()->json($validator->errors(), 400);
      }

      $this->roleServ->integrateOrRemovePerm($request['id'],$request['perm_id']);

      return response()->json([
        'status' => 'sucsess'
      ]);

  }

  public function delete(Request $request){
    $validate = $request->validate([
      'id' => 'required|integer'
    ]);
    $this->roleServ->delete($validate['id']);
    return redirect()->route('adminAddRole');

  }

}
