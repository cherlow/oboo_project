<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    //

    public function users()
    {

        return $this->hasMany(User::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
