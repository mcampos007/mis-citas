@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Pacientes</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('patients/create')}}" class="btn btn-sm btn-success">Nuevo paciente</a>
      </div>
    </div>
  </div>
  <div class="card-body">
    @if (session('notification'))
      <div class="alert alert-success" role="alert">
          <strong>{{ session('notification') }}</strong> 
      </div>
    @endif  
  </div>
  
  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">E-mail</th>
          <th scope="col">Dni</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($patients as $patient)
          <tr>
            <th scope="row">
              {{ $patient->name}}
            </th>
            <th scope="row">
              {{ $patient->last_name}}
            </th>
            <td>
              {{ $patient->email}}
            </td>
            <td>
              {{ $patient->dni}}
            </td>
            <td>
              
              <form action=" {{ url('/patients/'.$patient->id)}}" method="POST" class="formulario-eliminar">
                @csrf
                @method("DELETE")
                <a href="{{ url('patients/'.$patient->id.'/edit')}}" class="btn btn-sm btn-primary ">Editar </a>
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </td>
          <tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="card-body"> 
    {{ $patients->links()}}
  </div>
</div>
@endsection
@section('scripts')
<script src=" {{asset("js/sweetalert2@11.js") }}"></script>

@if(session('isdeleted')== 'ok')
    <script>
    Swal.fire(
         ' Eliminado!',
         'El paciente  a sido eliminado.',
         'success');
    </script>
  @endif
<script >
  

  $('.formulario-eliminar').submit(function(e){
    e.preventDefault();
     Swal.fire({
    title: 'Estas seguro?',
    text: "Esta acción no se podrá revertir!",
    icon: 'Atención',
    showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Si , Eliminar !'
   }).then((result) => {
     if (result.isConfirmed) {
       /*Swal.fire(
         ' Eliminado!',
         'El paciente a sido eliminado.',
         'success'
       )*/
       this.submit();
     }
   }) 
  });
 
</script>
@endsection