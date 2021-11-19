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
}
