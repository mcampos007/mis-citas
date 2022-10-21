@extends('layouts.panel')

@section('styles')
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection


@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Nuevo médico</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('doctors')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
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

      <form action=" {{ url('doctors')}}" method="POST">
        @csrf
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="name">Nombre del médico</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" required autofocus>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="last_name">Apellido del médico</label>
                <input class="form-control" placeholder="Apellido" type="text" name="last_name" value="{{ old('last_name') }}" required >
            </div>
          </div>
        </div>
        <div class="form-group">
            <label for="name">E-mail</label>
            <input type="text" name="email" class="form-control" value="{{old('email')}}" >
        </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group">       
              <select name="tipodoc" id="tipodoc" class="form-control selectpicker" data-style="btn-default" title="Seleccione El tipo de Documento">
                  <option value="1"> DNI</option>
                  <option value="2"> CUIT</option>
                  <option value="2"> CUIL</option>
                  <option value="2"> PASAPORTE</option>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <div class="input-group input-group-alternative mb-3">
                <div class="input-group-prepend">
                 <span class="input-group-text"><i class="ni ni-hat-3"></i></span> 
                </div>
                <input class="form-control" placeholder="Numero" type="text" name="dni" value="{{ old('dni') }}" required >
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <div class="col">
              <div class="form-group">
                <label for="sexo">Sexo </label>
                <select id="sexo" class="form-control" name="sexo">
                  <option value ="Varon" >
                    Varon
                  </option>
                  <option value ="Mujer" >
                    Mujer
                  </option>
                  <option value ="No definido" >
                    No definido
                  </option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="fecha_nac">Fecha de Nacimiento</label>
               <div class="input-group">
                  <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                  </div>
                  <input class="form-control datepicker" placeholder="Selecionar fecha" 
                  id="date" name="fecha_nac" type="text" 
                  value="{{old('fecha_nac')}}" 
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
                <input type="text" name="address" class="form-control" value="{{old('address')}}" >
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="phone">Teléfono</label>
                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" >
            </div>    
          </div>
        </div>
        
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="text" name="password" class="form-control" value="{{str_random(6) }}" >
        </div>   
        <div class="form-group">
          <label for="specialties">Especialidades</label>
          <select name="specialties[]" id="specialties" class="form-control selectpicker" data-style="btn-default" multiple title="Seleccione una o varias">
            @foreach($specialties as $specialty)
              <option value=" {{$specialty->id}}"> {{$specialty->name}}</option>
            @endforeach
          </select>
        </div> 
         <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
     
  </div>
  
</div>
@endsection

@section('scripts')
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
  <script src=" {{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
@endsection
