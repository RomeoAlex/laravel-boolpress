<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
   public function index() {
    // prendo i post dal model   
    // $posts = Post::all();
    // rimando i dati a json per vue, controllo tramite postman
    // return response()->json($posts);
    
    
    // return response()->json($response_array);
    
    
    // prendo solo 8 post per pagina utilizzando paginate , 
    $posts = Post::paginate(8);
    // verifico le informazioni di paginate con un dd
    // dd($posts);
    // 2 tipologie differenti di return 
    return response()->json([
        'success' => true,
        'results' => $posts
    ]);
    // $response_array = [
    //     // variabile per notificare il successo dell'operazione a schermo in caso di false si riporta su una pagina di manutenzione
    //     'success' => true,
    //     'results' => $posts
    // ];
   }
}
