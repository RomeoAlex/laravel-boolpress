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
    $posts = Post::paginate(9);
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
//    per creare lo show dei post per il pubblico vado in api.php a creare la rotta
public function show($slug) {
    // test per vedere lo slug
    // dd($slug);
    $post = Post::where('slug', '=', $slug)->with(['category', 'tags'])->first();
    // con with vado a selezionare gli attributi category e tags di post !!! CONTROLLARE LA CHIAMATA API CON POSTMAN
    // risposta a json per vue questa soluzione è insufficiente se l'end url non è corretto e punta un elemento che non esiste nel database
    // return response()->json([
    //     'success' => true,
    //     'results' => $post
    // ]);
    // creo un condizionale
    if($post) {
            return response()->json([
        'success' => true,
        // modifico results per recuperare i dati delle tags e delle categorie ma posso inserire gli elementi direttamente quando chiamo il model
        // 'results' => [
        //    'post' => $post,
        //    'tags' => $post->tags,
        //    'category' => $post->category
        // ]
        'results' => $post
    ]);
    }else {
        // nel caso non esista rimandiamo un array vuoto
        return response()->json([
            'success' => false,
            'results' => []
            // potremmo anche non mettere l'array
        ]);
    }
}
}
