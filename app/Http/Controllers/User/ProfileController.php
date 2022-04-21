<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;


class ProfileController extends Controller
{
    public function index(){
      $categoris= Category::where('parent_id',NULL)->get();
      return view('user.index',compact('categoris'));
    }

    public function edit_show(){
        $categoris= Category::where('parent_id',NULL)->get();
        return view('user.edit_show',compact('categoris'));
    }

    public function store(Request $request ,$id){

        $request->validate([
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);


        
        $user = User::find($id);
        $user->update([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'patronymic'=>$request->patronymic,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/storage/main-images'), $filename);
            $user['image']= $filename;
        }
        $user->save();

        return redirect()->back()->with('message', 'Ваше обновление успешно');
    }

    public function update(){
        $categoris= Category::where('parent_id',NULL)->get();
        return view('user.update_password',compact('categoris'));
    }

    public function my_organization_show(){
        $categoris= Category::where('parent_id',NULL)->get();
        return view('user.My_organizations',compact('categoris'));
    }

    public function my_organization_update(Request $request ,$id){

        // $validator = Validator::make($request->all(), [
        //     'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors());
        // }

        $user = User::find($id);
        $user->update($request->except(''));

        if($request->company_image){
            $file= $request->company_image;
            $filename= md5(microtime()).$file->getClientOriginalName();
            $file-> move(public_path('/storage/main-images'), $filename);
            $user['company_image']= $filename;
        }
        $user->save();
        return response()->json([
            'message'=> 'Ваше обновление успешно'
        ]);
    }

}
