<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charact extends Model
{
    use HasFactory;

    protected $table = 'characteristics';
    protected $fillable=["name"];

    public function categories(){
        return $this->belongsToMany(Category::class,'category_chars','characteristic_id','category_id');
    }

    // public function products(){
    //     return $this->belongsToMany(Product::class,'characteristic_product','product_id','charackteristic_id');
    // }
}
