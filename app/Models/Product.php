<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','quantity','sale_price','category_id','description'];


//    public function characts(){
//      return $this->belongsToMany(CategoryCharact::class,'product_chars','product_id','category_chars_id')->withPivot('value as value');
//    }


    // public function characts(){
    //     return $this->hasMany(ProductCharact::class,'product_id')->join('characteristics','product_chars.chars_id','=','characteristics.id');
    // }

    public function product_photos(){
        return $this->hasMany(ProductPhoto::class);
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }

    public  function tags(){
         return $this->belongsToMany(Tag::class);
    }

}
