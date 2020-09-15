<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crime extends Model
{
    public function criminals(){

        return $this->hasMany(Criminal::class);
    }
}
