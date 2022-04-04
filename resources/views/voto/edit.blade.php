@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Editar Votos 
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br/>
        @endif
        <form method="post" action="{{ route('voto.update', $votos->id) }}"
        enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
              <label for="eleccion">Elección:</label>
              <input type="text" readonly value="{{$votos->eleccion->periodo}}" />
            </div>
            <div class="form-group">
              <label for="casilla">Casilla:</label>
              <input type="text" readonly value="{{$votos->casilla->ubicacion}}"
            </div>
             <div class="form-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Candidato</th>
                            <th>votos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($votos->candidatos as $candidato)
                            <tr>
                                <td>{{$candidato->nombrecompleto}}</td>
                                <td>
                                    <input type="number" min="0" value="{{$candidato->pivot->votos}}" name="candidato_{{$candidato->id}}" >
                                </td>
                            </tr>                    
                        @endforeach
                    </tbody>
                </table>
            <div class="form-group">
                <label for="evidencia">Evidencia:</label>
                <input type="file" id="evidencia" accept="application/pdf"
                 class="form-control" value="/pdf/{{$votos->evidencia}}" name="evidencia" />
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
