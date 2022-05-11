<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'surname',
        'patronymic',
        'organization_name',
        'inn',
        'cpp',
        'legal_address',
        'post_address',
        'bank_name',
        'bank_city',
        'bic',
        'fio',
        'correspondent_account',
        'phone',
        'image',
        'company_image'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
      $this->attributes['password'] = bcrypt($value);
    }

    public function roles(){
      return $this->belongsToMany(
        Role::class,'user_roles','user_id','role_id'
      );
    }

    public function isAdmin(){
      return count($this->roles->where('name','root_admin'));
    }

    public function isUser(){
      return count($this->roles->where('name','user'));
    }

    public function hasPerm($per){

      return $this->whereHas('roles.permissions',function($query) use ($per){
        return  $query->where('name',$per);
      })->find($this->id);

    }
     public function carts(){
        return $this->hasMany(Cart::class);
    }

}
