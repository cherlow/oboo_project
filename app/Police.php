<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    //

    public function station(){
        return $this->belongsTo(Station::class);
    }
}
