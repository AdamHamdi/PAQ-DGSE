<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    
    public function domaine(){
        return $this->belongsTo('App\Domaine');
    }

    public function action(){
        return $this->belongsTo('App\Action');
    }
}
