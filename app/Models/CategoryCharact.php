<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryCharact extends Model
{
    use HasFactory;

    public $table = 'category_chars';

    public function charact(){
        return $this->hasOne(Charact::class,'id','characteristic_id', 'value');
    }
}
