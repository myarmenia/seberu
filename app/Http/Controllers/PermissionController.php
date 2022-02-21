<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{

    private $permServ;

    public function __construct(){
      $this->permServ = new PermissionService;
    }

    public function index(){
      $perms = $this->permServ->index();
      return view('admin.roles_and_permissions.permissions',['perms' =>$perms]);
    }

    public function create(Request $request){

      $validate = $request->validate([
        'name' => 'required|unique:permissions'
      ]);
      $this->permServ->create($validate);
      return redirect()->back()->with('message','Created');

    }

    public function update(Request $request){

      $validator = Validator::make($request->all(), [
        'name' => 'required|unique:permissions',
        'id' => 'required'
      ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

      $this->permServ->update($request);
      return response()->json([
        'status' => 'sucsess'
      ]);
      //return redirect()->back()->with('message','Updated');

    }

    public function delete(Request $request){
      $this->permServ->delete($request['id']);
      return redirect()->back()->with('message','Deleted Success');
    }
}
