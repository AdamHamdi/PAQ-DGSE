<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendez_vous extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
