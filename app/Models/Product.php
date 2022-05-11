<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','quantity','sale_price','category_id','description'];


    public function characts(){
        return $this->hasMany(ProductCharact::class,'product_id')->join('characteristics','product_chars.chars_id','=','characteristics.id');
    }

    public function product_photos(){
        return $this->hasMany(ProductPhoto::class);
    }

    public function category(){
      return $this->belongsTo(Category::class);
    }
    public  function colors(){
        return $this->hasMany(Colors::class);
   }


    public function product_chars(){
        return $this->belongsToMany(Charact::class,'product_chars','product_id','chars_id')->withPivot('value');
    }
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
// ---------------------------------------
    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    // public function getIsLikedAttribute()
    // {

    //     $like = $this->likes()->whereUserId(Auth::id())->first();

    //     return (!is_null($like)) ? true : false;
    // }
    // -------calling function in single_product blade to show ----------------------------------
    public function getLike($prod_id)
    {

        $like = Like::where(['user_id'=>Auth::id(),'likeable_id'=>$prod_id])->first();
        return (!is_null($like)) ? true : false;
    }



}
