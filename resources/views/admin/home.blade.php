@extends('layouts.dashboard');

{{-- aggiungo una section con il content del main in app --}}
@section('content')
    <section>
        <div class="container">
            <h1>Benvenuto {{ $user->name }} nell'area protetta</h1>

        </div>
    </section>
@endsection