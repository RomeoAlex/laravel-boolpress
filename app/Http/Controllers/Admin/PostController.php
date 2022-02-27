<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// richiamo il model
use App\Post;
// richiamo il model
use App\Category;
// richiamo il model per i Tags
use App\Tag;
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
        // richiamo le categorie er inserirle nel create form
        $categories = Category::all();
        $tags = Tag::all();
        $data = [
            'categories' => $categories,
            'tags' =>$tags
        ];
        
        return view('admin.posts.create', $data);
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
        // dd($form_data);
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
        // dd($form_data);
        // vado a salvare le tags nella tabella ponte DOPO IL SAVE PERCHE' ABBIAMO I VALORI DELL'ID!!!
        // utilizzo di sync o attach in store è equivalente
        // creo condizionale se non vengono spuntati i tags nella create
        if (isset($form_data['tags'])) {
            # code...
            $new_post->tags()->sync($form_data['tags']);
        }
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
        // testo la categoria sul post
        // dd($post->category);
        // $category = $post->category;
        
        // TEST SULLA TABELLA PONTE
        // TEST sull'inserminte manuale dei tags sul post nel database per verificarne il funzionamento
        // dd($post->tags);
        // $tags_test = $post->tags;
        // $tag = $tags_test[0];
        // dd($tag);


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

        $post = Post::findOrFail($id);
        // test
        // dd($post);
        $categories = Category::all();

        
        $data = [
            'post' => $post,
            'categories' => $categories
        ];

        return view('admin.posts.edit', $data);
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
        $form_data = $request->all();
        $request->validate($this->getValidateRules());
        $post = Post::findOrFail($id);
        // mi trovo nella condizione che modificare un post mi aggiunge uno slug aggiuntivo devo creare una condizione
        if($form_data['title'] !=$post->title ){
            $form_data['slug'] = $this->getUniqueSlug($form_data['title']);
        }
        $post->update($form_data);

        return redirect()->route('admin.posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
    // creo funzione per la validazione
    protected function getValidateRules(){
        return [
            'title' => 'required|max:255',
            'content' => 'required|max:60000',
            'category_id' => 'exists:categories,id|nullable',
            'tags' => 'exists:tags,id'
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
