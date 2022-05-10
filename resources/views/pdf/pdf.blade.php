@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
       Funcionarios 
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
    @endif
    <h1>{{$title}}</h1>
    <p>{{$date}}</p>
    <p>Este es el contenido de la pagina creada con laravel 8, este es un framework basado en PHP.</p>
    </div>
</div>
@endsection
