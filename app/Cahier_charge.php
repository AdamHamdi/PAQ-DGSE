<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cahier_charge extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
