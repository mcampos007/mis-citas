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
              <form role="form" method="POST" action="{{ route('register') }}" class="formulario-registrar">
                @csrf 
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Nombre" type="text" name="name" value="{{ old('name') }}" required autofocus>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                        </div>
                        <input class="form-control" placeholder="Apellido" type="text" name="last_name" value="{{ old('last_name') }}" required >
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
                          <option value="3"> CUIL</option>
                          <option value="4"> PASAPORTE</option>
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
                          data-date-start-date="-100y" 
                          data-date-end-date="{{ date('Y-m-d') }}"
                          required>
                      </div>
                  </div>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                        </div>
                        <input class="form-control" placeholder="Contraseña" type="password" name="password" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Confirmar Contraseña" type="password" name="password_confirmation" required>
                    </div>
                  </div>                    
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col-10">
                    <div class="form-group">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="polipriv" 
                        {{-- @if(isset($polipriv))
                        {{'checked'}}
                        @endif --}} required />
                        {{-- <label class="form-check-label" for="flexCheckDefault"></label> --}}
                          
                          <!-- <a href="/aceptaprivacidad/" name="aceptar">Declaro que he leído y acepto la política de privacidad</a>
                          Button trigger modal -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Declaro que he leído y acepto la política de privacidad
                          </button>
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
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Política de Privacidad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @include('includes.politicaprivacidad.politica')
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Volver</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
          </div>
        </div>
      </div>
    </div>
@endsection

@section('scripts')

<script src=" {{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script src=" {{asset("js/sweetalert2@11.js") }}"></script>
<script >
  $('.formulario-registrar'.submit(function(e)){
    e.preventDefault();
    Swal.fire({
  title: 'Debes Aceptar la política de privacidad?',
  showDenyButton: true,
  showCancelButton: false,
  confirmButtonText: 'Aceptar',
  denyButtonText: `No Acpectar`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})    
  })

</script>
@endsection
