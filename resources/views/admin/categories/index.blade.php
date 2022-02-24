@extends('layouts.dashboard');

{{-- aggiungo una section con il content del main in app --}}
@section('content')
    <section>
        <div class="container">
            <h1>Indice delle categorie</h1>

            <ul class="list-group">
                @foreach ($categories as $category)
                <li class="list-group-item">{{$category->name}}</li>
                    
                @endforeach
                
              </ul>
        </div>
    </section>
@endsection