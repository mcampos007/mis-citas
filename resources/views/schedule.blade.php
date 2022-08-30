@extends('layouts.panel')

@section('content')
<form action="{{url('/schedule') }}" method="POST">
  @csrf
  <div class="card shadow">
    <div class="card-header border-0">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="mb-0">Gestionar Horarios</h3>
        </div>
        <div class="col text-right">
          <button type="submit" class="btn btn-sm btn-success">
            Guardar Cambios
          </button>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if (session('notification'))
        <div class="alert alert-success" role="alert">
            <strong>{{ session('notification') }}</strong> 
        </div>
      @endif 
      @if (session('errors'))
        <div class="alert alert-danger" role="alert">
            <p>Se han guardado los datos, pero existen inconsistencias!!.</p>
            @foreach($errors as $error)
              <li>
                <strong>{{ $error }}</strong> 
              </li>
            @endforeach
        </div>
      @endif  
    </div>
    
    <div class="table-responsive">
      <!-- Projects table -->
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
          <tr>
            <th scope="col">Día</th>
            <th scope="col">Activo</th>
            <th scope="col">Turno Mañana</th>
            <th scope="col">Turno Tarde</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($workDays as $key => $workDay)
          <tr>
            <th> {{$days[$key]}}</th>
            <td>
              <label class="custom-toggle">
                <input type="checkbox"  nAMe="active[]" value="{{ $key }}"
                @if($workDay->active) checked @endif>
                <span class="custom-toggle-slider rounded-circle"></span>
              </label>
            </td>
            <td> 
              <div class="row">
                <div class="col">
                  <select class="form-control" nAMe="morning_start[]">
                  @for($i=5; $i<=11; $i++)
                    <option value="{{ ($i<10 ? '0' : '') .$i }}:00" 
                    @if($i.':00 AM' == $workDay->morning_start) selected @endif> 
                    {{ $i }}:00 AM
                    </option>
                    <option value="{{ ($i<10 ? '0' : '') .$i }}:30" 
                    @if($i.':30 AM' == $workDay->morning_start) selected @endif> 
                     {{ $i }}:30 AM</option>
                  @endfor
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" nAMe="morning_end[]">
                  @for($i=5; $i<=11; $i++)
                    <option value="{{ ($i<10 ? '0' : '') .$i }}:00"
                    @if($i.':00 AM' == $workDay->morning_end) selected @endif> 
                    {{ $i }}:00 AM
                    </option>
                    <option value="{{ ($i<10 ? '0' : '') .$i }}:30"
                    @if($i.':30 AM' == $workDay->morning_end) selected @endif>  
                    {{ $i }}:30 AM
                    </option>
                  @endfor
                  </select>
                </div>
              </div>
            </td>
            <td> 
              <div class="row">
                <div class="col">
                  <select class="form-control" nAMe="afternoon_start[]">
                  @for($i=1; $i<=11; $i++)
                    <option value="{{ $i+12 }}:00"
                    @if($i.':00 PM' == $workDay->afternoon_start) selected @endif>   
                    {{ $i }}:00 PM
                    </option>
                    <option value="{{ $i+12 }}:30"
                    @if($i.':30 PM' == $workDay->afternoon_start) selected @endif>    
                    {{ $i }}:30 PM
                    </option>
                  @endfor
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" nAMe="afternoon_end[]">
                  @for($i=1; $i<=11; $i++)
                    <option value="{{ $i+12 }}:00"
                    @if($i.':00 PM' == $workDay->afternoon_end) selected @endif>    
                    {{ $i }}:00 PM
                    </option>
                    <option value="{{ $i+12 }}:30"
                    @if($i.':30 PM' == $workDay->afternoon_end) selected @endif>     
                    {{ $i }}:30 PM
                    </option>
                  @endfor
                  </select>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-body">
     {{--  {{ $doctors->links()}} --}}
    </div>
  </div>

</form>

@endsection

