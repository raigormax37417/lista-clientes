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
        <form method="post" action="{{ route('funcionario.store') }} " 
        enctype="multipart/form-data">
        
            @csrf 
            <div class="form-group">
              <label for="eleccion">Nombre Completo: </label>
              <input type="text" id="nombrecompleto" placeholder="nombre completo"/>
            </div>
            <div class="form-group">
              <label for="casilla">Sexo: </label>
              <input type="text" id="sexo" placeholder="Sexo" />
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
