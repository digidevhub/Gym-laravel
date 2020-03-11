<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $guarded=[];
    public function parent_question(){
        return $this->hasMany(ParentQuestion::class);
    }
    public function employee(){
        return $this->hasMany(Employee::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
    public function category(){
        return $this->hasMany(Category::class);
    }
}
