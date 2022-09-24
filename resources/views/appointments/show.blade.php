@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Turno # {{ $appointment->id}}</h3>
      </div>
    </div>
  </div>
  <div class="card-body">
    <ul>
      <li>
        <strong>Fecha: </strong>{{ $appointment->scheduled_date}}
      </li>
      <li>
        <strong>Hora: </strong>{{ $appointment->scheduled_time}}
      </li>
      @if($role == 'doctor' || $role == 'admin')
      <li>
        <strong>Paciente: </strong>{{ $appointment->patient->name}}
      </li>
      @endif
      @if ($role == 'patient'  || $role == 'admin')
      <li>
        <strong>Médico: </strong>{{ $appointment->doctor->name}}
      </li>
      @endif
      <li>
        <strong>Especialidad: </strong>{{ $appointment->specialty->name}}
      </li>
      <li>
        <strong>Tipo: </strong>{{ $appointment->type}}
      </li>
      <li>
        @if( $appointment->status == 'Cancelada')
          <strong>Estado: </strong>
          <span class="badge bg-gradient-danger">Cancelada</span>
        @else
          <span class="badge bg-gradient-success">{{$appointment->status}}</span>
        @endif  
      </li>
    </ul>
    @if( $appointment->status == 'Cancelada')
      <div class="alert alert-warning">
        @if($appointment->cancellation)
        <p>A cerca de la cancelación del turno
        <ul>
          
          <li><strong>Fecha de la cancelación</strong>
            {{ $appointment->cancellation->created_at}}
          </li>
          <li><strong>¿Quién canceló el turno?</strong>
            @if (auth()->user()->id == $appointment->cancelled_by_id)
              Tú
            @else
              {{ $appointment->cancellation->cancelled_by->name}}
            @endif
          </li>
          <li><strong>Motivo de la cancelación</strong>
            {{ $appointment->cancellation->justification}}
          </li>
        </ul>
        @else
        <ul>
          <li>Este Turno se canceló antes de su confirmación</li>
        </ul>
        @endif
      </div>
    @endif 
    <a href="{{ url('/appointments') }}" class="btn btn-default">Volver</a>
  </div> 
</div>
@endsection

