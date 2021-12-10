<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{ protected $fillable = [
    'nom', 'email', 'password',
];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function rendez_vous(){
        return $this->hasMany('App\Rendez_vous');
    }
}
