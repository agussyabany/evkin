
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link"></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-lg" id="keuangan"></a>
    </li>
    {{-- s --}}
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Navbar Search -->
    <li class="nav-item">
      <a class="nav-link" data-widget="navbar-search" href="#" role="button">
        <i class="fas fa-search"></i>
      </a>
      <div class="navbar-search-block">
        <form class="form-inline">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
              <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    
    <li class="nav-item">
      <a class="nav-link btn-danger"   href="/logout" role="button">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    
   
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('assets/dist/img/logo.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item menu-close">
              <a href="#" class="nav-link active">
                
                <p>
                  DASHBOARD
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/evkin" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Main</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/perumdam" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mobile</p>
                  </a>
                </li>
              </ul>
            </li>
        <li class="nav-item menu-close">
          <a href="#" class="nav-link active">
            
            <p>
              EVALUASI KINERJA
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
          {{-- @if (Auth::user()->hasRole('adminUmum') || Auth::user()->hasRole('de-was') || Auth::user()->hasRole('dirut') || Auth::user()->hasRole('dirum') || Auth::user()->hasRole('dirtek') || Auth::user()->hasRole('dirpel') || Auth::user()->hasRole('spi') ) --}}
             @if (Auth::user()->hasAnyRole(['adminUmum','de-was','dirut','dirum','spi']))
               

            
            <li class="nav-item">
              <a href="/evkeu" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keuangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/evSdm" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sdm</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Administrasi</p>
              </a>
            </li>

        @endif
        @if (Auth::user()->hasAnyRole(['adminLayan','de-was','dirut','dirum','dirpel','spi']))
            <li class="nav-item">
              <a href="/evPel" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pelayanan</p>
              </a>
            </li>
            @endif

            @if (Auth::user()->hasAnyRole(['adminTeknik','de-was','dirut','dirum','dirtek','spi']))
            <li class="nav-item">
              <a href="/evOp" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Operasional</p>
              </a>
            </li>
            @endif
            
           
          </ul>
        </li>

        {{-- DIREKSI --}}
        @if (Auth::user()->hasAnyRole(['adminUtama','de-was','dirut','dirum','spi']))
        <li class="nav-item menu-close">
          <a href="#" class="nav-link active">
            <p>
              UTAMA
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/perencanaanPenelitian" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Perencanaan Dan Penelitian</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Satuan Pengawas Internal</p>
              </a>
            </li>
          </ul>
        </li>
        @endif


        @if (Auth::user()->hasAnyRole(['adminUmum','de-was','dirut','dirum','spi']))
        <li class="nav-item menu-close">
          <a href="#" class="nav-link active">
            <p>
              UMUM
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/umkes" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Umum Dan Kesekretariatan </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/keuangan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Keuangan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/sdm" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sumber Daya Manusia</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/adm" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Aspek Adminsitrasi</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        
        @if (Auth::user()->hasAnyRole(['adminTeknik','de-was','dirut','dirum','dirtek','spi']))
        <li class="nav-item menu-close">
          <a href="#" class="nav-link active">
            <p>
              TEKNIK
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/produksi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Produksi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/distribusi" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Distribusi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/perawatan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Perawatan</p>
              </a>
            </li>
          </ul>
        </li>
        @endif

        @if (Auth::user()->hasAnyRole(['adminLayan','de-was','dirut','dirum','dirpel','spi']))
        <li class="nav-item menu-close">
          <a href="#" class="nav-link active">
            <p>
              PELAYANAN
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/pelayanan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Hubungan Pelanggan</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/kepatuhan" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kepatuhan</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>

