<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded=[];

    public function parentQuestion(){
        return $this->belongsTo(ParentQuestion::class);
    }
}
