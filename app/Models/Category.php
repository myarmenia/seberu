<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
      ];


      public function child() {
         return $this->hasMany(self::class, 'parent_id');
     }


     public function children() {
         return $this->hasMany(self::class, 'parent_id')->with('children');
     }


     public function parent() {
         return $this->belongsTo(self::class, 'parent_id');
     }


     public function parents() {
         return $this->belongsTo(self::class, 'parent_id')->with('parents');
     }

     public function products() {
         return $this->hasMany(Product::class)->with('characts');
     }


     public function characts()
     {
       return $this->belongsToMany(Charact::class,'category_chars','category_id','characteristic_id')->withTimestamps();
     }



}
