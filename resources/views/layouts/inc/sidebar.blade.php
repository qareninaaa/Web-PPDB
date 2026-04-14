<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{ route('home') }}" class="logo">
              <img
                src="{{ asset('/img/kaiadmin/logo_light.svg') }}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item {{ Route::is('home') ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item {{ Route::is('daftar-tamu') ? 'active' : '' }}">
                <a href="{{ route('tamu.index') }}">
                  <i class="fas fa-users"></i>
                  <p>Daftar Tamu</p>
                </a>
              </li>
              <li class="nav-item {{ Route::is('karyawan') ? 'active' : '' }}">
                <a href="{{ route('karyawan.index') }}">
                  <i class="fas fa-user-tie"></i>
                  <p>Karyawan</p>
                </a>
              </li>
              <li class="nav-item {{ Route::is('admin') ? 'active' : '' }}">
                <a href="{{ route('admin.index') }}">
                  <i class="fas fa-user-shield"></i>
                  <p>Admin</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>