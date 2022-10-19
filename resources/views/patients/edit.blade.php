@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Modificar paciente</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('patients')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
      </div>
    </div>
  </div>
  <div class="card-body">
      @if($errors->any())
          <div class="text-center text-muted mb-4">
              <small>Oops ! Se encontraron un errorres.</small>
          </div>
          <div class="alert alert-danger" role="alert">
              @foreach($errors->all() as $error)
                <li><strong>Error!</strong> {{ $error}}</li>
              @endforeach
          </div>
      @endif  

      <form action=" {{ url('patients/'.$patient->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="name">Nombre del paciente</label>
                <input type="text" name="name" class="form-control" value="{{old('name', $patient->name)}}" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
                <label for="last_name">Apellido del paciente</label>
                <input type="text" name="last_name" class="form-control" value="{{old('last_name', $patient->last_name)}}" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="name">E-mail</label>
                <input type="text" name="email" class="form-control" value="{{old('email', $patient->email)}}" >
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="dni">Dni</label>
                <input type="text" name="dni" class="form-control" value="{{old('dni', $patient->dni)}}" >
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="sexo">Sexo {{$patient->sexo }}</label>
              <select id="sexo" class="form-control" name="sexo">
                <option value ="Varon" 
                  @if ($patient->sexo =="Varon") selected @endif>Varon
                </option>
                <option value ="Mujer" 
                  @if ($patient->sexo =="Mujer") selected @endif>Mujer
                </option>
                <option value ="No definido" 
                  @if ($patient->sexo =="No definido") selected @endif>No definido
                </option>
              </select>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
                <label for="fecha_nac">Fecha de Nacimiento</label>
                 <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                    </div>
                    <input class="form-control datepicker" placeholder="Selecionar fecha" 
                    id="date" name="fecha_nac" type="text" 
                    value="{{old('fecha_nac', $patient->fecha_nac)}}" 
                    data-date-format="yyyy-mm-dd"
                    data-date-start-date="" 
                    data-date-end-date="{{ date('Y-m-d') }}">
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" name="address" class="form-control" value="{{old('address', $patient->address)}}" >
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" class="form-control" value="{{old('phone', $patient->phone)}}" >
            </div>
          </div>
        </div>  
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="text" name="password" class="form-control" value="" >
            <p>Ingrese un valor solo si desea modificar la contraseña</p>
        </div>    
         <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
     
  </div>
  
</div>
@endsection

@section('scripts')

<script src=" {{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>


@endsection