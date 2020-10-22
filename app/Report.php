<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
