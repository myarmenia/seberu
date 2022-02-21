<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getAllUsers(){
      $users = User::whereHas('roles',function($q){
        return $q->where('name', 'user');
      })->get();
      return view('admin.all_users.index',['users' => $users]);
    }
}
