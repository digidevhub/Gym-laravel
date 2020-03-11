<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $guarded=[];
    public function tl(){
        return $this->belongsTo('App\User','tl_id','id');
    }
    public function qa(){
        return $this->belongsTo('App\User','qa_id','id');
    }

    public function process(){
        return $this->belongsTo(Process::class);
    }

    public function basicResponse(){
        return $this->hasMany(BasicResponse::class);
    }
}
