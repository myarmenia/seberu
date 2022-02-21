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


     public function test()
     {
       return $this->hasManyThrough(
          Product::class,
          ProductCharact::class,
         'podcast_id',
         'user_id',
         'id',
         'podcast_id'
       );
     }


}
