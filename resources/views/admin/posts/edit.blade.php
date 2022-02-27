@extends('layouts.dashboard')

@section('content')
    <section>
        <h2>
            Modifica post    
        </h2>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error}}</li>
                @endforeach    
            </ul>
        </div>
            
        @endif
        {{-- controllare la route list --}}
        <form action="{{ route('admin.posts.update', ['post' =>$post->id])}}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              {{-- nella value mettiamo una formula per far vedere la scritta precedente e cambiarla siccome siamo nell'edit --}}
              {{-- <input type="text" class="form-control" id="title" name="title" value="{{old('title') ? old('title') : $post->title}}"> --}}
              {{-- utilizziamo il ternario di old --}}
              <input type="text" class="form-control" id="title" name="title" value="{{old('title', $post->title) }}">
              
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categorie</label>  
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>
                {{-- faccio un foreach per recuperare tutte le categorie --}}
                {{-- imposrtante il ternario per old nella select --}}
            @foreach ($categories as $category)
                {{-- importante old per il salvataggio del valore vado a confrontare il foreign key nella tabella perchè mi basta l'id!!!!! --}}
                <option value="{{$category->id}}" {{ old('category_id', $post->category_id ) == $category->id ? 'selected' : ''}} >{{$category->name }}</option>
                
            @endforeach    
                
              </select>
            </div>
            <h3>Tags:</h3>
            @foreach ($tags as $tag)
            <div class="form-check">
                {{-- problema tra array e collection condizionale per risolvere l'esperienza utente --}}
                
                @if ($errors->any())
                    <input {{ in_array($tag->id , old('tags' , [])) ? 'checked' : ''}} class="form-check-input" type="checkbox" name="tags[]"  value="{{$tag->id}}" id="tag-{{$tag->id}}">
                @else
                
                {{-- cambiamo la funzione per l'esperienza utente , abbiamo una collection e verifichiamo se il tag è all'interno importante fare un dd per verificare la collection--}}
                    <input {{ $post->tags->contains($tags) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}">
                @endif
                
                
                
                {{-- il for deve essere uguale al tag-id --}}
                    <label class="form-check-label" for="tag-{{$tag->id}}">
                    {{ $tag->name }}
                    </label>
            </div>
            @endforeach 
            <div class="form-floating">
                
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" name="content" id="content"  >{{old('content' , $post->content)}}</textarea>
                
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>    
    </section>    
@endsection