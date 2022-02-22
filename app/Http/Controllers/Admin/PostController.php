<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// richiamo il model
use App\Post;
// per slug bisogna importare la funzione di supporto
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // richiamo i post dal database
        $posts = Post::all();
        // test dd controllo a video su posts guardare la tebella route:lists
        // dd($posts);

        // immetto i post richiamati per rimandarli alla view
        $data = [
            'posts' => $posts
        ];

        return view('admin.posts.index', $data );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        // validazione per i campi vuoti
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'content' => 'required|max:60000'
        // ]);
        // se uso la funzione scritta al fondo 
        $request->validate($this->getValidateRules());
            // creo le variabili per salvare i dati ricevuti dal form
        $new_post = new Post();
        $new_post->fill($form_data);
        // ma devo popolare lo slug utilizzando la sua sintassi e il titolo del form
        // $new_post->slug = Str::slug( $form_data['title'] );
        // inoltre controllo se lo slug esiste e aggiungo man mano 1 finche non esiste uno slug univoco
        // POSTO LA FUNZIONE ALLA FINE PER RIUTILIZZARLA NELL'EDIT
        // $slug = Str::slug( $form_data['title'] );
        //     // per non creare concatenzioni nel while
        // $slug_base = $slug;
        // $post_found = Post::where('slug', '=', $slug)->first();
        // $counter = 1;
        // while ($post_found) {
        //     // se esiste agiungiamo un - , $counter che man mano inceremnterà, al titolo
        //     $slug = $slug_base . '-' . $counter;
        //     // dovrà avanti finche il valore non sarà vuoto , null e perciò poterlo inserire nel database
        //     $post_found = Post::where('slug', '=', $slug)->first();
        //     $counter++;
        // }
        $new_post->slug = $this->getUniqueSlug($form_data['title']);
        $new_post->save();
        // ritorno alla pagina del post creato
        return  redirect()->route('admin.posts.show', ['post' => $new_post->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //per visualizzare un post in base all'id
        $post = Post::findOrFail($id);
        // test
        // dd($post);
        $data = [
            'post' => $post
        ];
        // return sulla view
        return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    // creo funzione per la validazione
    protected function getValidateRules(){
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000'
        ];
    }
    protected function getUniqueSlug($title){
        $slug = Str::slug($title);
            // per non creare concatenzioni nel while
        $slug_base = $slug;
        $post_found = Post::where('slug', '=', $slug)->first();
        $counter = 1;
        while ($post_found) {
            // se esiste agiungiamo un - , $counter che man mano inceremnterà, al titolo
            $slug = $slug_base . '-' . $counter;
            // dovrà avanti finche il valore non sarà vuoto , null e perciò poterlo inserire nel database
            $post_found = Post::where('slug', '=', $slug)->first();
            $counter++;
        }
        // riportiamo il valore slug
        return $slug;
    }
}
