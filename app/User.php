<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'user_name', 'email', 'password','employee_id','user_type','process_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function employeesTL(){
        return $this->hasMany('Employee','tl_id');
    }
    public function employeesQA(){
        return $this->hasMany('Employee','qa_id');
    }
    public function process(){
        return $this->belongsTo(Process::class);
    }
    public function basicResponse(){
        return $this->hasMany(BasicResponse::class);
    }
}
