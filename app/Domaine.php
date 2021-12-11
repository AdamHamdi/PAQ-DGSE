<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function actions(){
        return $this->hasMany('App\Action');
    }
     public function budgets(){
        return $this->hasMany('App\Budget');
    }
}
