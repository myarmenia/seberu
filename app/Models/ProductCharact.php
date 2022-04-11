<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCharact extends Model
{
    use HasFactory;

    protected $table = 'product_chars';

    protected $fillable = ['name'];



    public function charactVal(){
        return $this->hasOne(Charact::class,'id','chars_id');
    }
}
