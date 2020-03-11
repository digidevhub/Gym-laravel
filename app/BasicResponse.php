<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BasicResponse extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function response(){
        return $this->hasMany(Response::class);
    }
}
