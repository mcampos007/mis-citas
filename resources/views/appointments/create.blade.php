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

      <form action=" {{ url('patients')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for ="specialty">Especialidad</label>
          <select name="specialty_id" id="specialty" class="form-control" required>
            <option value="">Selecionar Especialidad</option> 
            @foreach($specialties as $specialty)
              <option value=" {{$specialty->id}}"> {{$specialty->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="doctor">Médicos</label>
            <select name="doctor_id" id="doctor" class="form-control"> 

            </select>
        </div>
        <div class="form-group">
            <label for="dni">Fecha</label>
             <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                </div>
                <input class="form-control datepicker" placeholder="Selecionar fecha" 
                type="text" value=" {{ date('Y-m-d')}}" data-date-format="yyyy-mm-dd"
                data-date-start-date="{{ date('Y-m-d')}}" data-date-end-date="+30d">
            </div>
        </div>
        <div class="form-group">
            <label for="dni">Hora de Atención</label>
            <input type="text" name="dni" class="form-control" value="{{old('dni')}}" >
        </div>
            
         <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
     
  </div>
  
</div>
@endsection
@section('scripts')
<script src=" {{ asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script>

  // funciones para actulizar los medicos al seleccionar una especialidad
  let $doctor ;

  $(function () {
    const $specialty = $('#specialty'); 
    $doctor = $('#doctor');

    $specialty.change(()=> {
    const specialtyId = $specialty.val();
    const url = `/specialties/${specialtyId}/doctors`;
    $.getJSON(url, onDoctorsLoad);
    });

  });

  
  function onDoctorsLoad(doctors){
    let htmlOptions = '';
    doctors.forEach(doctor => {
      htmlOptions += `<option value="${doctor.id}">${doctor.name}</option>`;  
    });

    $doctor.html(htmlOptions);

    
  }
</script>

@endsection

