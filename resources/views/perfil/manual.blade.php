@extends('layouts.panel')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection



@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Manual del Sistema</h3>
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