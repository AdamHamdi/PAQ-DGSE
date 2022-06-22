<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    
    public function resDomaines(){
        return $this->hasMany('App\Resdomaine');
    }
    public function actions(){
        return $this->hasMany('App\Action');
    }
     public function budgets(){
        return $this->hasMany('App\Budget');
    }
}
