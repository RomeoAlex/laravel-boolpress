<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //aggiungere tutte le variabili che si andaranno a salvare nella tabella perciò anche la nuova creata category_id
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id'
    ];
    // funzione di relazione per la tabella
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
