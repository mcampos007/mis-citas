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
          <div class="col-md-4">
            <div class="form-group">
              <label for="name">Nombre</label>
              <input type="text" name="name" class="form-control" value="{{ old('name', $usuario->name) }}" required>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="name">E-mail</label>
              <input type="text" name="email" class="form-control" value="{{ old('email', $usuario->email) }}">
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-2">
          <div class="form-group">
            <label for="name">DNI</label>
            <input type="text" name="dni" class="form-control" value="{{ old('dni', $usuario->dni) }}">
          </div>    
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="name">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $usuario->address) }}">
          </div>    
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="name">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $usuario->phone) }}">
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
            <img alt="Seleccione un archivo si desea cambiar su foto de Perfil" src="{{ asset('img/theme/fotoperfil_'.auth()->user()->id.'.png')}}">
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
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
  $(document).ready(()=>{
    $('#specialities').selectpicker('val',@json($speciality_id));
  });
</script> --}}
@endsection