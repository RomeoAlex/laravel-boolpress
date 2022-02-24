@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            {{-- riporto un singolo post --}}
        <h1> {{$post->title}}</h1>
        <h2 class="text-light bg-dark">Slug: {{$post->slug}}</h2>
        <p>{{$post->content}}</p>

        <a href="{{route('admin.posts.edit',['post' =>$post->id])}}" class="btn btn-primary">modifica post</a>
        <a href=""class="btn btn-danger">elimina post</a>
        </div>
    </section>
    
@endsection