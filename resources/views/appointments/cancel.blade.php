@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Cancelar Turno</h3>
      </div>
    </div>
  </div>
  
  <div class="card-body">
    @if (session('notification'))
    <div class="alert alert-success" role="alert">
        <strong>{{ session('notification') }}</strong> 
    </div>
    @endif  
    @if($role == 'patient')
      <p>Estas a punto de cancelar el Turno reservado con el medico 
        <strong>{{ $appointment->doctor->name}} (especialidad) {{$appointment->specialty->name }} </strong> 
        para el día {{ $appointment->scheduled_date }}
      </p>
    @endif
    @if($role == 'admin')
      <p>Estas a punto de cancelar el Turno reservado por el paciente {{ $appointment->patient->name}} para ser tendido por el médico 
        <strong>{{ $appointment->doctor->name}} (especialidad) {{$appointment->specialty->name }} </strong> 
        para el día {{ $appointment->scheduled_date }} (hora {{ $appointment->scheduled_time_12}})
      </p>
    @endif
    @if($role == 'doctor')
      <p>Estas a punto de cancelar el Turno reservado para el paciente
        <strong>{{ $appointment->patient->name}} (especialidad) {{$appointment->specialty->name }} </strong> 
        para el día {{ $appointment->scheduled_date }} hora: {{ $appointment->scheduled_time_12 }}
      </p>
    @endif
    
    <form action=" {{ url('/appointments/'.$appointment->id.'/cancel')}}" method="POST">
      @csrf
      <div class="form-group">
        <label for="jutstification">Por favor cuentanos el motivo de la cancelación del Turno</label>
        <textarea id="jutstification" name="justification" rows="3" class="form-control" required></textarea>
      </div>
      <button class="btn btn-danger" type="submit">Cancelar Turno</button>
      <a href=" {{ url('/appointments')}}" class="btn btn-default">
        Volver al listado de Turnos sin cancelar
      </a>
    </form>
  </div>

</div>
@endsection

