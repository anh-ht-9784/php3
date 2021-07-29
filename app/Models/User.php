<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'gender',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function invoices(){
        return $this->hasMany(Invoice::class, 'user_id' , 'id');
    }
    public function setPasswordAttribute($value){
        // tên function bắt buộc phai đặt đung
        $hased =bcrypt($value) ;
       return $value = $this->attributes['password'] = $hased ;
          
    }
    // public function getPasswordAttribute($value){
    //     // tên function bắt buộc phai đặt đung
    //      $hased =bcrypt($value) ;
    //       $this->attributes['password'] = $hased ;
          
    // }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
