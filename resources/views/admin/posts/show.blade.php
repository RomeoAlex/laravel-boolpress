@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            {{-- riporto un singolo post --}}
        <h1> {{$post->title}}</h1>
        <h2 class="text-light bg-dark">Slug: {{$post->slug}}</h2>
        {{-- accesso su più livelli di annidamento di array associativi ma è una relazione assoluta ed al momento è null perciò non funzionerà su tutte--}}
        {{-- <h3>Categoria:{{$post->category->name}}</h3>     --}}
        {{-- creo un ternario per risolvere il problema descritto sopra e per dare all'utenza un buona fruibilità --}}
        <h3>Categoria: {{$post->category ? $post->category->name : 'nessuna categoria'}}</h3>
        {{-- Creo forelse per i tags! --}}
        <div class=""><h2>Tags:
            @forelse ($post->tags as $tag)
                {{-- stampo il tag con una condizione loop per la , --}}
                {{$tag->name}}{{ $loop->last ? '' : ', ' }}
            @empty
               Nessun
            @endforelse
        </h2>
        </div>
        
        <p>{{$post->content}}</p>

        <a href="{{route('admin.posts.edit',['post' =>$post->id])}}" class="btn btn-primary">modifica post</a>
        {{-- creo il destroy deve avere un form --}}
        {{-- controllare la tebella route --}}
        <form action="{{route('admin.posts.destroy',['post' =>$post->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">elimina post</button>
        </form>
        
        </div>
    </section>
    
@endsection