<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charact;

class CharactController extends Controller
{
    public function index(){
        $characts = Charact::get();
        return view('admin.characteristics.index',['characts' => $characts]);
    }

    public function create(Request $request){
        $createcharact=Charact::create([
            "name"=>$request->name
        ]);
        if($createcharact){
            return redirect()->back()->with('message','Характериста добавлено');

        }
    }
}
