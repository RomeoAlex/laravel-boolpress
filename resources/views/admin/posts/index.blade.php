@extends('layouts.dashboard');

@section('content')
    <section>
        <div class="container">
            <h1>Lista post</h1>
            <div class="row row-cols ">
                @foreach ($posts as $post)
                    <div class="col-3">
                        <div class="card">
                            {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                            <div class="card-body">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <p class="card-text">{{Str::substr($post->content, 0 , 60)}}...</p>
                            </div>
                            <div class="card-body">
                                <a href="#" class="btn btn-primaty">vai al post</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    
                    @endforeach
                </div>
        </div>
    </section>
@endsection