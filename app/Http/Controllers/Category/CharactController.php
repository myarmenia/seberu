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

    public function create(){
        dd(11);
    }
}
