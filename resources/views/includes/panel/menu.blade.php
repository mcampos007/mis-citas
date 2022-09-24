<!-- Navigation -->
<h6 class="navbar-heading text-muted">
@if (auth()->user()->role == 'admin')
  Gestión de Datos
@else
  Menú
@endif
</h6>
<ul class="navbar-nav">
  @include('includes.panel.menus.'.auth()->user()->role) 
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();">
      <i class="ni ni-key-25 "></i> Cerrar sesión
    </a>
   <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout" >
    @csrf
  </form>
  </li>
</ul>
<!-- Divider -->
@if (auth()->user()->role == 'admin')
  <hr class="my-3">
  <!-- Heading -->
  <h6 class="navbar-heading text-muted">Reportes</h6>
  <!-- Navigation -->
  <ul class="navbar-nav mb-md-3">
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
        <i class="ni ni-collection text-yellow"></i> Frecuencia de Citas
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
        <i class="ni ni-spaceship text-red"></i> Médicos más activos
      </a>
    </li>
  </ul>
  @endif