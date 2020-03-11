<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];
    public function process(){
        return $this->belongsTo(Process::class);
    }
    public function basicResponse(){
        return $this->hasMany(BasicResponse::class);
    }

}
