<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Criminal extends Model
{

    use Searchable;
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function crime()
    {
        return $this->belongsTo(Crime::class);
    }

//     public function toSearchableArray()
//     {
//         $array = [
// $this->
//         ];

//         // Customize array...

//         return $array;
//     }
}
