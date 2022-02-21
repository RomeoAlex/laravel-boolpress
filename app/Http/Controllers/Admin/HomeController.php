<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //funzione per testare
    public function index(){
        // test
        // dd('ciao sto testando il controller e la route');
        // metto il return su admin home 
        return view('admin.home');
    }
}
