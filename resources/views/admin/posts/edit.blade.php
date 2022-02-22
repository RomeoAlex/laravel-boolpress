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
            <div class="form-floating">
                
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" name="content"  value="{{old('title' , $post->content)}}" ></textarea>
                
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>    
    </section>    
@endsection