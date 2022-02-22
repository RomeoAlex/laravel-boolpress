@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            {{-- riporto un singolo post --}}
        <h1> {{$post->title}}</h1>
        <h2 class="text-light bg-dark">Slug: {{$post->slug}}</h2>
        <p>{{$post->content}}</p>

        </div>
    </section>
    
@endsection