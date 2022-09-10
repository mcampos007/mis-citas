@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Registrar Nuevo turno</h3>
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

      <form action=" {{ url('appointments')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="description">Descripción</label>
          <input type="text" id="description" class="form-control"  placeholder="Describe brevemente la consulta" name="description" required value="{{old('description')}}">
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
              <label for ="specialty">Especialidad</label>
              <select name="specialty_id" id="specialty" class="form-control" required>
                <option value="">Selecionar Especialidad</option> 
                @foreach($specialties as $specialty)
                  <option value=" {{$specialty->id}}" 
                   @if(old("specialty_id") == $specialty->id ) selected @endif>{{$specialty->name}}
                  </option>
                @endforeach
              </select>  
          </div>
          <div class="form-group col-md-6">
              <label for="doctor">Médicos</label>
              <select name="doctor_id" id="doctor" class="form-control" required> 
                @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id}}" 
                    @if (old("doctor_id") == $doctor->id) selected @endif>{{ $doctor->name }}</option>
                @endforeach
            </select>  
          </div>
        </div>
        <div class="form-group">
            <label for="dni">Fecha</label>
             <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" placeholder="Selecionar fecha" 
                id="date" name="scheduled_date" type="text" 
                value="{{old('scheduled_date',  date('Y-m-d')) }}" 
                data-date-format="yyyy-mm-dd"
                data-date-start-date="{{ date('Y-m-d') }}" 
                data-date-end-date="+30d">
            </div>
        </div>
        <div class="form-group">
            <label for="dni">Hora de Atención</label>
            <div id="hours">
              <div class="alert alert-info" role="alert">
                Seleccione un médio y una fecha, para ver su horas disponibles.
              </div>
            </div>
        </div>
        <div class="form-group">
            <label for="type">Tipo de consulta</label>
            <div class="custom-control custom-radio">
              <input type="radio" id="type1" name="type" class="custom-control-input" 
              @if (old('type','Consulta') == "Consulta") checked @endif value="Consulta">
              <label class="custom-control-label" for="type1">Consulta</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="type2" name="type" class="custom-control-input" 
              @if (old('type') == "Examen") checked @endif value="Examen">
              <label class="custom-control-label" for="type2">Examen</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" id="type3" name="type" class="custom-control-input" 
              @if (old('type') == "Intervención") checked @endif value="Intervención">
              <label class="custom-control-label" for="type3">Intervención</label>
            </div>
        </div>
            
         <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
     
  </div>
  
</div>
@endsection
@section('scripts')
<script src=" {{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{ asset('/js/appointments/create.js') }}"></script>
@endsection

