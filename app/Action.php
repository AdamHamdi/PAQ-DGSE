<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function domaine(){
        return $this->belongsTo('App\Domaine');
    }
    public function budgets(){
        return $this->hasMany('App\Budget');
    }
}
