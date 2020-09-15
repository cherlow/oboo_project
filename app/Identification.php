<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    
    public function criminal(){
        return $this->belongsTo(Criminal::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
