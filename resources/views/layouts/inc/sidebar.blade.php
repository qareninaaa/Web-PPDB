<div class="sidebar" data-background-color="dark">
  <div class="sidebar-logo">
    <div class="logo-header" data-background-color="dark">
      <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('/img/kaiadmin/logo_light.svg') }}" class="navbar-brand" height="20"/>
      </a>
    </div>
  </div>

  <div class="sidebar-wrapper scrollbar scrollbar-inner">
    <div class="sidebar-content">
      <ul class="nav nav-secondary">

        <!-- Dashboard -->
        <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
          <a href="{{ route('home') }}">
            <i class="fas fa-home"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Data Pendaftar -->
        <li class="nav-item {{ Route::is('siswa.*') ? 'active' : '' }}">
          <a href="{{ route('siswa.index') }}">
            <i class="fas fa-user-graduate"></i>
            <p>Data Pendaftar</p>
          </a>
        </li>

        <!-- Siswa Diterima -->
        <li class="nav-item {{ Route::is('siswa.diterima') ? 'active' : '' }}">
          <a href="{{ route('siswa.diterima') }}">
            <i class="fas fa-check-circle"></i>
            <p>Siswa Diterima</p>
          </a>
        </li>

        <!-- Siswa Ditolak -->
        <li class="nav-item {{ Route::is('siswa.ditolak') ? 'active' : '' }}">
          <a href="{{ route('siswa.ditolak') }}">
            <i class="fas fa-times-circle"></i>
            <p>Siswa Ditolak</p>
          </a>
        </li>

        <!-- Admin -->
        <li class="nav-item {{ Route::is('admin.*') ? 'active' : '' }}">
          <a href="{{ route('admin.index') }}">
            <i class="fas fa-user-shield"></i>
            <p>Admin</p>
          </a>
        </li>

      </ul>
    </div>
  </div>
</div>