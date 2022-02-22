@extends('layouts.dashboard');

@section('content')
    <section>
        <div class="container">
            <h1>Lista post</h1>
            {{ dd($posts)}}
        </div>
    </section>
@endsection