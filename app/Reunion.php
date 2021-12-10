<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    public function resdomaine(){
        return $this->belongsTo('App\Resdomaine');
    }
}
