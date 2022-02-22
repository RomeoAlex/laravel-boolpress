@extends('layouts.dashboard');

@section('content')
    <section>
        <h2>
            Crea nuovo post
        </h2>
        <form action="{{ route('admin.posts.store')}}" method="post">
            @csrf
            @method('POST')

            <div class="mb-3">
              <label for="title" class="form-label">Titolo</label>
              <input type="text" class="form-control" id="title" name="title">
              
              
            </div>
            <div class="form-floating">
                
                <label for="content" class="form-label">Contenuto</label>
                <textarea class="form-control" id="content" name="content"></textarea>
                
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        
    </section>
@endsection