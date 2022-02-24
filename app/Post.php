<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'slug'

    ];
    // funzione di relazione per la tabella
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
