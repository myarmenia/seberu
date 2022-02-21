<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

      protected $fillable = ['name'];

      public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
      }

      public function hasPerm($name){
        return $this->permissions->where('name',$name);
      }
}