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
            <p>Se han guardado los datos, pero existen incosistencias!!.</p>
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
          @foreach ($days as $key => $day)
          <tr>
            <th> {{$day}}</th>
            <td>
              <label class="custom-toggle">
                <input type="checkbox"  name="active[]" value="{{ $key }}">
                <span class="custom-toggle-slider rounded-circle"></span>
              </label>
            </td>
            <td> 
              <div class="row">
                <div class="col">
                  <select class="form-control" name="morning_start[]">
                  @for($i=5; $i<=11; $i++)
                    <option value="{{ ($i<10 ? '0': '').$i }}:00"
                    @if($i.'00 AM' == $workDay->morning_start) selected @endif> {{ $i }}:00 am
                    </option>
                    <option value="{{ ($i<10 ? '0': '').$i }}:30"> {{ $i }}:30 am</option>
                  @endfor
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="morning_end[]">
                  @for($i=5; $i<=11; $i++)
                    <option value="{{ ($i<10 ? '0': '').$i }}:00"> {{ $i }}:00 am</option>
                    <option value="{{ ($i<10 ? '0': '').$i }}:30"> {{ $i }}:30 am</option>
                  @endfor
                  </select>
                </div>
              </div>
            </td>
            <td> 
              <div class="row">
                <div class="col">
                  <select class="form-control" name="afternoon_start[]">
                  @for($i=1; $i<=11; $i++)
                    <option value="{{ $i+12 }}:00"> {{ $i }}:00 pm</option>
                    <option value="{{ $i+12 }}:30"> {{ $i }}:30 pm</option>
                  @endfor
                  </select>
                </div>
                <div class="col">
                  <select class="form-control" name="afternoon_end[]">
                  @for($i=1; $i<=11; $i++)
                    <option value="{{ $i+12 }}:00"> {{ $i }}:00 pm</option>
                    <option value="{{ $i+12 }}:30"> {{ $i }}:30 pm</option>
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

