<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function resAction(){
        return $this->belongsTo('App\ResAction');
    }
    public function domaine(){
        return $this->belongsTo('App\Domaine');
    }
    public function budgets(){
        return $this->hasMany('App\Budget');
    }
}
