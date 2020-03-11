<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentQuestion extends Model
{
   protected $guarded=[];

   public function question(){
       return $this->hasMany(Question::class);
   }
    public function process(){
        return $this->belongsTo(Process::class);
    }
}
