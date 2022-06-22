<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resdomaine extends Model
{ protected $fillable = [
    'nom', 'email', 'password',
];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function domaine(){
        return $this->belongsTo('App\Domaine');
    }
    public function reunions(){
        return $this->hasMany('App\Reunion');
    }
}
