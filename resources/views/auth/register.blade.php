@extends('layouts.form')
@section('title','Registro de Nuevo usuario!')
@section('subtitle','Ingresa tus datos para registrarte.')
@section('content')
<div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                @if($errors->any())
                    <div class="text-center text-muted mb-4">
                        <small>Oops ! Se encontró un error.</small>
                    </div>
                    <div class="alert alert-danger" role="alert">
                        <strong>Error!</strong> {{ $errors->first()}}
                    </div>  
                @endif
              <form role="form" method="POST" action="{{ route('register') }}">
                @csrf 
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nombre" type="text" name="name" value="{{ old('name') }}" required >
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Apellido" type="text" name="last_name" value="{{ old('last_name') }}" required autofocus>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required>
                  </div>
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
                <label for="sexo">Sexo</label>
                <div class="form-group">       
                  <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="sexo" id="flexRadioDefault1" value="Varon">
                    <label class="form-check-label" for="flexRadioDefault1">Varón</label>
                  </div>
                  <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="sexo" id="flexRadioDefault2" value="Mujer">
                    <label class="form-check-label" for="flexRadioDefault2">Mujer</label>
                  </div>
                  <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="sexo" id="flexRadioDefault3" value="No Definido">
                    <label class="form-check-label" for="flexRadioDefault3">No definido</label>
                  </div>
                  <div class="form-group">
                      <label for="fecha_nac">Fecha de Nacimiento</label>
                       <div class="input-group">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input class="form-control datepicker" placeholder="Selecionar fecha" 
                          id="date" name="fecha_nac" type="text" 
                          value="{{old('fecha_nac',  date('Y-m-d')) }}" 
                          data-date-format="yyyy-mm-dd"
                          data-date-start-date="" 
                          data-date-end-date="{{ date('Y-m-d') }}">
                      </div>
                  </div>                  
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Contraseña" type="password" name="password" required>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Confirmar Contraseña" type="password" name="password_confirmation" required>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-10">
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="polipriv"
                        @if(isset($polipriv))
                            {{'checked'}}
                          @endif required />
                        <label class="form-check-label" for="flexCheckDefault"><a href="{{ url("/aceptaprivacidad")}}" >
                            Declaro que he leído y acepto la política de privacidad</a></label>

                      </div>                     
                    </div>  
                  </div>  
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Confirmar Registro</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')

<script src=" {{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>


@endsection
