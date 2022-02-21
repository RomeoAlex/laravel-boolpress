<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //funzione per testare
    public function index(){
        dd('ciao sto testando il controller e la route');
    }
}
