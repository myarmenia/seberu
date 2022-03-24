<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Services\AdminService;
use App\Http\Requests\UserUpdateDataRequest;
use App\Services\UserService;


class AdminController extends Controller
{
    public function index(){
      return view('admin.index');
    }

    public function settngs(){
      return view('admin.profile.settings');
    }

    public function update(UserUpdateDataRequest $request,$id){
        $validated = $request->validated();
        $userServ = new UserService;
        $userServ->editMe($validated);


        
        return redirect()->back()->with('message','Updated');
    }



}
