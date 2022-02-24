@extends('layouts.dashboard');

{{-- aggiungo una section con il content del main in app --}}
@section('content')
    <section>
        <div class="container">
            
                <h2>{{$category->name}}</h2>
                    
                <ul class="list-group">
                    @forelse ($posts as $post)
                    <li class="list-group-item">
                        <a href="{{route('admin.posts.show',['post' =>$post->id])}}">{{$post->title}}</a>
                    </li>
                    @empty
                        <li class="list-group-item">Nessun post trovato</li>
                    @endforelse
                    
                  </ul>
        </div>
    </section>
@endsection