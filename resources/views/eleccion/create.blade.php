@extends('plantilla')
@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Agregar Eleccion
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
        <form method="post" action="{{ route('eleccion.store') }} " 
        enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="periodo">Periodo:</label>
            <input type="text" id="periodo"
                 class="form-control" name="periodo" />
            </div>
            <div class="form-group">
              <label for="fecha">Fecha:</label>
              <input type="date" id="fecha"  
              class="form-control" name="fecha"/>
            </div>
            <div class="form-group">
              <label for="fechaapertura">Fecha Apertura:</label>
              <input type="date" id="fechaapertura"  
              class="form-control" name="fechaapertura"/>
            </div>
            <div class="form-group">
              <label for="horaapertura">Hora Apertura:</label>
              <input type="time" id="horaapertura"  
              class="form-control" name="horaapertura"/>
            </div>
            <div class="form-group">
              <label for="fechacierre">Fecha Cierre:</label>
              <input type="date" id="fechacierre"  
              class="form-control" name="fechacierre"/>
            </div>
            <div class="form-group">
              <label for="horacierre">Hora Cierre:</label>
              <input type="time" id="horacierre"  
              class="form-control" name="horacierre"/>
            </div>
      <div class="form-group">
              <label for="observaciones">Observaciones:</label>
              <input type="text" id="observaciones"  
              class="form-control" name="observaciones"/>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
