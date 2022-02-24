<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //funzione di relazione per la tabella
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
