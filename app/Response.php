<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public function basicResponse(){
        return $this->belongsTo(BasicResponse::class);
    }
}
