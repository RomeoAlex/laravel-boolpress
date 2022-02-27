@extends('layouts.dashboard');

@section('content')
    <section>
        <h2>
            Crea nuovo post
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
        <form action="{{ route('admin.posts.store')}}" method="post">
            @csrf
            @method('POST')

            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>  
              <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">  
            </div>
            {{-- vado a creare una select per la categoria --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">Categorie</label>  
            <select class="form-select" id="category_id" name="category_id">
                <option value="">Nessuna</option>
                {{-- faccio un foreach per recuperare tutte le categorie --}}
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}} >{{$category->name }}</option>
                
            @endforeach    
              </select>
            </div>
            <h3>Tags:</h3>
            @foreach ($tags $tag)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="">
                <label class="form-check-label" for="flexCheckDefault">
                  {{ $tag->name }}
                </label>
              </div>
            @endforeach
            
            <div class="form-floating">
                
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" name="content" {{old('content')}}></textarea>
                
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        
    </section>
@endsection