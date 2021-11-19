<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResAction extends Model
{ protected $fillable = [
    'nom', 'email', 'password',
];
    public function user(){
        return $this->belongsTo('App\User');
    }
}