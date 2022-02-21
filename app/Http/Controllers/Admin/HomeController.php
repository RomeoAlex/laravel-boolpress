<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// utilizzo il controller per restituire alla view l'id dell'utente nella pagina di benvenuto "protetta"
use illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    //funzione per testare
    public function index(){
        // utilizzo la funzione auth di facades
        $user = Auth::user();
        // testo la funzione con un dd
        // dd('$user');
        
        $data = [
            'user' => $user

        ];


        // test per il controller
        // dd('ciao sto testando il controller e la route');
        // metto il return su admin home 
        return view('admin.home', $data);
    }
}
