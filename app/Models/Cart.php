<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'prod_id',
        'quantity',
        'product_quantity_price',
        'product_color'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function products(){
        return $this->belongsTo(Product::class,'prod_id');
    }
}
