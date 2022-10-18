@extends('layouts.form')

@section('content')
<div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        {{-- <div class="col-lg-5 col-md-7"> --}}
        <div class="col">
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
              <form role="form" method="POST" action="{{ url('/confirmarpolitica') }}">
                @csrf
                <div class="card-body">
                  <div class="card-header display-4">POLITICA DE PRIVACIDAD</div>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlTextarea3">Leer y Acpetar si está de acuerdo</label>
                  @include('politica-privacidad')
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input name="aceptar" class="custom-control-input" id="aceptar" type="checkbox" {{ old('aceptar') ? 'checked' : '' }}>
                  <label class="custom-control-label" for="aceptar">
                    <span class="text-muted">Aceptar Política</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Confirmar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

