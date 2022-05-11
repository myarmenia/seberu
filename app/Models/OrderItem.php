<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'prod_id',
        'order_id',
        'quantity',
        'product_quantity_price'
    ];
    public function products(){
        return $this->belongsToMany(Products::class);
    }
    // public function getLike($prod_id)
    // {

    //     $like = Like::where(['user_id'=>Auth::id(),'likeable_id'=>$prod_id])->first();
    //     return (!is_null($like)) ? true : false;
    // }


}
