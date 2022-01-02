<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function action(){
        return $this->belongsTo('App\Action');
    }
}
