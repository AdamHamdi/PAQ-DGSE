<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rendez_vous extends Model
{
    public function admin(){
        return $this->belongsTo('App\Admin');
    }
}
