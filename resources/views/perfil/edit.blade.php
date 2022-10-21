@extends('layouts.panel')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection



@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Datos de Mi Perfil</h3>
      </div>
      <div class="col text-ri ght">
        <a href="{{ url('home') }}" class="btn btn-sm btn-default">Cancelar y volver</a>
      </div>
    </div>
  </div>
  @if ($errors->any())
      <div class="alert alert-danger" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>
                {{ $error }}
              </li>
            @endforeach
          </ul>
      </div>
    @endif
    
  <div class="card-body">
    
   
    <form action="{{ url('perfil') }}" method="POST" enctype="multipart/form-data">
      @csrf()
      {{-- @method('PUT') --}}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $usuario->name) }}" required>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="last_name">Apellido</label>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
              </div>
              <input class="form-control" placeholder="Apellido" type="text" name="last_name" value="{{ old('last_name',$usuario->last_name) }}" required >
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="name">E-mail</label>
        <input type="text" name="email" class="form-control" value="{{ old('email', $usuario->email) }}">
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">  
          <label for="tipodoc">Tipo de Documente</label>     
            <select name="tipodoc" id="tipodoc" class="form-control selectpicker"  title="Seleccione El tipo de Documento">
                <option value="1" @if ($usuario->tipodoc_id == "1") selected @endif> DNI</option>
                <option value="2" @if ($usuario->tipodoc_id == "2") selected @endif> CUIT</option>
                <option value="3" @if ($usuario->tipodoc_id == "3") selected @endif> CUIL</option>
                <option value="4" @if ($usuario->tipodoc_id == "4") selected @endif> PASAPORTE</option>
            </select>
          </div>
        </div>

        <div class="col-6">
          <div class="form-group">
            <label for="dni">N° de Documento</label>
            <div class="input-group input-group-alternative mb-3">
              <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-hat-3"></i></span> 
              </div>
              <input class="form-control" placeholder="Numero" type="text" name="dni" value="{{ old('dni', $usuario->dni) }}" required >
            </div>
          </div>
        </div>
      </div> 
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="name">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $usuario->address) }}">
          </div>    
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="name">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $usuario->phone) }}">
          </div>    
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="sexo">Sexo</label>
            <select id="sexo" class="form-control selectpicker" name="sexo"  title="Sexo">
              <option value ="Varon" @if($usuario->sexo=="Varon") selected @endif>
                Varon
              </option>
              <option value ="Mujer" @if($usuario->sexo=="Mujer") selected @endif>
                Mujer
              </option>
              <option value ="No definido" @if($usuario->sexo=="No definido") selected @endif>
                No definido
              </option>
            </select>
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
                value="{{old('fecha_nac',$usuario->fecha_nac)}}" 
                data-date-format="yyyy-mm-dd"
                data-date-start-date="" 
                data-date-end-date="{{ date('Y-m-d') }}">
            </div>
        </div>  
        </div>
      </div>      
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="password">contraseña</label>
            <input type="password" name="password" class="form-control" value="">
            <p>Ingrese un valor, solo si desea modificar su contraseña</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-1">
          <div class="avatar avatar-sm rounded-circle">
            @if (auth()->user()->avatar !== 'noimage')
              <img alt="Seleccione un archivo si desea cambiar su foto de Perfil" src="{{ asset('img/theme/'.auth()->user()->avatar)}}">
            @else
              <img alt="Image placeholder" src="{{ asset('img/theme/avatar.jpg')}}">
            @endif
          </div>
        </div>
        <div class="col-md-3">
          <input type="file" name="photo" class="form-control">
          <button type="submit" class="btn btn-primary">
            Actualizar datos del Perfil              
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
{{--<script>
  $(document).ready(()=>{
    $('#specialities').selectpicker('val',@json($speciality_id));
  });
</script> --}}
<script src=" {{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>


@endsection