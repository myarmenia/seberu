<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','sale_price','category_id'];


    public function characts(){
      return $this->belongsToMany(ProductCharact::class,'product_chars','product_id','characteristic_id')->withPivot('value as value');
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }
}
