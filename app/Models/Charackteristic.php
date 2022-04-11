<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charackteristic extends Model
{
    use HasFactory;
    protected $fillable=['name'];
    
    public function products(){
        return $this->belongsToMany(Product::class,'characteristic_product','product_id','charackteristic_id');
    }

}
