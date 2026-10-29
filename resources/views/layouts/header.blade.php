<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">

        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#modal-lg" id="keuangan"></a>
        </li>
        {{-- s --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto d-flex align-items-center">
        <!-- Navbar Search -->
        <li class="nav-item mx-2"> <!-- Added margin spacing -->
            <select id="selectBulanAwal" class="form-control select2" style="width: 100px;"
                onchange="changeBulanTahun()">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                        {{ session('bulan_awal', '01') == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                        {{ strtoupper(\Carbon\Carbon::create()->month($i)->translatedFormat('F')) }}
                    </option>
                @endfor
            </select>
        </li>

        <li class="nav-item mx-2"> <!-- Added margin spacing -->
            <select id="selectBulanAkhir" class="form-control select2" style="width: 100px;"
                onchange="changeBulanTahun()">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}"
                        {{ session('bulan_akhir', '12') == str_pad($i, 2, '0', STR_PAD_LEFT) ? 'selected' : '' }}>
                        {{ strtoupper(\Carbon\Carbon::create()->month($i)->translatedFormat('F')) }}
                    </option>
                @endfor
            </select>
        </li>

        <li class="nav-item mx-2"> <!-- Added margin spacing -->
            <select id="selectTahun" class="form-control select2" style="width: 100px;" onchange="changeBulanTahun()">
                <option value="2024" {{ session('tahun', date('Y')) == '2024' ? 'selected' : '' }}>2024</option>
                <option value="2025" {{ session('tahun', date('Y')) == '2025' ? 'selected' : '' }}>2025</option>
                <option value="2026" {{ session('tahun', date('Y')) == '2026' ? 'selected' : '' }}>2026</option>
            </select>
        </li>

        {{-- <li class="nav-item mx-2">  <!-- Added margin spacing -->
      <a href="/perumdam" class="nav-link btn btn-info px-3">  <!-- Added horizontal padding -->
        <i class="fas fa-home"></i>
      </a>
    </li> --}}

        {{-- <li class="nav-item mx-2">  <!-- Added margin spacing -->
      <a class="nav-link btn-danger px-3" href="/logout" role="button">  <!-- Added horizontal padding -->
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li> --}}
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
                <a href="#"
                    class="d-flex align-items-center text-decoration-none text-light"
                    data-toggle="modal"
                    data-target="#modalProfilPengguna">

                        {{-- <div class="mr-2 rounded-circle bg-primary d-flex align-items-center justify-content-center"
                            style="width:36px;height:36px;min-width:36px;">
                            <i class="fas fa-user"></i>
                        </div> --}}

                        <div class="text-truncate">
                            <strong>{{ Auth::user()->name }}</strong>
                            <small class="d-block text-muted">{{ Auth::user()->nipp }}</small>
                        </div>
                    </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

                @if (Auth::user()->hasAnyRole(['agus', 'ipa']))
                    <li class="nav-item menu-close">
                        <a href="#" class="nav-link active">

                            <p>
                                IPA {{ Auth::user()->ipaRelasi->nama_ipa }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Operator</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/masuk" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Laboratorium</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->hasAnyRole([
                        'adminUmum',
                        'de-was',
                        'dirut',
                        'dirum',
                        'spi',
                        'agus',
                        'adminUtama',
                        'adminUmum',
                        'adminTeknik',
                        'adminLayan',
                        'dirtek',
                        'dirpel',
                    ]))


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
                            {{-- @if (Auth::user()->hasRole('adminUmum') || Auth::user()->hasRole('de-was') || Auth::user()->hasRole('dirut') || Auth::user()->hasRole('dirum') || Auth::user()->hasRole('dirtek') || Auth::user()->hasRole('dirpel') || Auth::user()->hasRole('spi')) --}}
                            @if (Auth::user()->hasAnyRole(['adminUmum', 'de-was', 'dirut', 'dirum', 'spi', 'agus']))
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
                            @if (Auth::user()->hasAnyRole(['adminLayan', 'de-was', 'dirut', 'dirum', 'dirpel', 'spi', 'agus']))
                                <li class="nav-item">
                                    <a href="/evPel" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Pelayanan</p>
                                    </a>
                                </li>
                            @endif

                            @if (Auth::user()->hasAnyRole(['adminTeknik', 'de-was', 'dirut', 'dirum', 'dirtek', 'spi', 'agus']))
                                <li class="nav-item">
                                    <a href="/evOp" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Operasional</p>
                                    </a>
                                </li>
                            @endif


                        </ul>
                    </li>

                @endif

                {{-- MENU BAHAN KIMIA --}}
                @if (Auth::user()->hasAnyRole(['agus', 'ipa', 'gudang']))
                    <li
                        class="nav-item {{ request()->is('gudang*', 'masuk*', 'ipaGudang*', 'dataMinta*', 'stok*', 'ipa/transaksi-keluar*', 'ipa/set-minimum-stok*') ? 'menu-open' : '' }}">

                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-flask"></i>
                            <p>
                                BAHAN KIMIA
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">

                            {{-- OPERASIONAL --}}
                            <li class="nav-header">OPERASIONAL</li>

                            {{-- DASHBOARD GUDANG --}}
                            @if (Auth::user()->hasAnyRole(['agus', 'gudang']))
                                <li class="nav-item">
                                    <a href="{{ route('gudang.dashboard') }}"
                                        class="nav-link {{ request()->routeIs('gudang.dashboard') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-tachometer-alt"></i>
                                        <p>Dashboard Gudang</p>
                                    </a>
                                </li>
                            @endif

                            {{-- OPERASIONAL GUDANG --}}
                            @if (Auth::user()->hasAnyRole(['agus', 'gudang']))
                                <li class="nav-header">OPERASIONAL</li>

                                <li class="nav-item">
                                    <a href="/gudang"
                                        class="nav-link {{ request()->is('gudang*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-warehouse"></i>
                                        <p>Stok Gudang Utama</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="/masuk" class="nav-link {{ request()->is('masuk*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-truck-loading"></i>
                                        <p>Bahan Masuk</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('monitoring-ipa.stok') }}"
                                        class="nav-link {{ request()->routeIs('monitoring-ipa.stok*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-chart-bar"></i>
                                        <p>
                                            Stok Seluruh IPA
                                            <span class="right badge badge-info">Monitoring</span>
                                        </p>
                                    </a>
                                </li>
                            @endif

                            

                            @if (Auth::user()->hasAnyRole(['agus', 'ipa']))
                            <li class="nav-item">
                                <a href="/ipaGudang"
                                    class="nav-link {{ request()->is('ipaGudang*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-boxes"></i>
                                    <p>Stok IPA</p>
                                    <span class="right badge badge-info">Stok</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="/dataMinta"
                                    class="nav-link {{ request()->is('dataMinta*') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-file-alt"></i>
                                    <p>Permintaan Bahan</p>
                                </a>
                            </li>
                                <li class="nav-item">
                                    <a href="/stok" class="nav-link {{ request()->is('stok*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-box-open"></i>
                                        <p>Referensi Stok Gudang</p>
                                    </a>
                                </li>

                                {{-- TRANSAKSI --}}
                                <li class="nav-header">TRANSAKSI</li>

                                <li class="nav-item">
                                    <a href="{{ url('/ipa/transaksi-keluar') }}"
                                        class="nav-link {{ request()->is('ipa/transaksi-keluar*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-history"></i>
                                        <p>Riwayat Barang Keluar</p>
                                    </a>
                                </li>

                                {{-- PENGATURAN --}}
                                <li class="nav-header">PENGATURAN</li>

                                <li class="nav-item">
                                    <a href="{{ route('ipa.set-minimum-stok') }}"
                                        class="nav-link {{ request()->is('ipa/set-minimum-stok*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-sliders-h"></i>
                                        <p>Minimum Stok IPA</p>
                                    </a>
                                </li>
                                @if (Auth::user()->hasAnyRole(['agus']))
                                <li class="nav-item">
                                        <a href="/guna" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>User</p>
                                        </a>
                                    </li>
                                </li>
                                 @endif
                            @endif
                       
                        </ul>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

{{-- MODAL PROFIL PENGGUNA --}}
<div class="modal fade" id="modalProfilPengguna" tabindex="-1"
     role="dialog" aria-labelledby="judulProfilPengguna"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg"
             style="border-radius:16px; overflow:hidden;">

            <div class="text-white text-center p-4"
                 style="background:linear-gradient(135deg,#1f4e79,#2878a5);">

                <button type="button"
                        class="close text-white"
                        data-dismiss="modal"
                        aria-label="Tutup"
                        style="opacity:1;">
                    <span>&times;</span>
                </button>

                <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center mx-auto mb-3"
                     style="width:76px;height:76px;font-size:30px;">
                    <i class="fas fa-user"></i>
                </div>

                <h5 class="mb-1" id="judulProfilPengguna">
                    {{ Auth::user()->name }}
                </h5>

                <div style="opacity:.85;font-size:13px;">
                    <i class="fas fa-shield-alt mr-1"></i>
                    Akun EVKIN
                </div>
            </div>

            <div class="modal-body p-4">

                <div class="d-flex align-items-start mb-3">
                    <div class="text-primary mr-3">
                        <i class="fas fa-envelope fa-lg"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Email</small>
                        <strong>{{ Auth::user()->email }}</strong>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-3">
                    <div class="text-primary mr-3">
                        <i class="fas fa-id-card fa-lg"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">NIPP</small>
                        <strong>{{ Auth::user()->nipp ?: '-' }}</strong>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <div class="text-primary mr-3">
                        <i class="fas fa-user-tag fa-lg"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Role Aplikasi</small>
                        <strong>
                            {{ Auth::user()->getRoleNames()->implode(', ') ?: '-' }}
                        </strong>
                    </div>
                </div>

                <button type="button"
                        class="btn btn-outline-primary btn-block mb-2"
                        data-toggle="collapse"
                        data-target="#formUbahPassword"
                        aria-expanded="false">
                    <i class="fas fa-key mr-2"></i> Ubah Password
                </button>

                <div class="collapse mt-3" id="formUbahPassword">
                    <div class="card card-body bg-light border-0">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle mr-1"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Password belum berhasil diubah.</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST"
                              action="{{ route('profil.password.update') }}">
                            @csrf
                            @method('PUT')

                           <div class="form-group">
                                    <label>Password Lama</label>
                                    <div class="input-group">
                                        <input type="password"
                                            name="current_password"
                                            class="form-control password-toggle-input"
                                            autocomplete="current-password"
                                            required>

                                        <div class="input-group-append">
                                            <button type="button"
                                                    class="btn btn-outline-secondary toggle-password"
                                                    aria-label="Tampilkan password">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Password Baru</label>
                                    <div class="input-group">
                                        <input type="password"
                                            name="password"
                                            class="form-control password-toggle-input"
                                            minlength="8"
                                            autocomplete="new-password"
                                            required>

                                        <div class="input-group-append">
                                            <button type="button"
                                                    class="btn btn-outline-secondary toggle-password"
                                                    aria-label="Tampilkan password">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small class="text-muted">Minimal 8 karakter.</small>
                                </div>

                                <div class="form-group">
                                    <label>Konfirmasi Password Baru</label>
                                    <div class="input-group">
                                        <input type="password"
                                            name="password_confirmation"
                                            class="form-control password-toggle-input"
                                            autocomplete="new-password"
                                            required>

                                        <div class="input-group-append">
                                            <button type="button"
                                                    class="btn btn-outline-secondary toggle-password"
                                                    aria-label="Tampilkan password">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fas fa-save mr-1"></i>
                                Simpan Password
                            </button>
                        </form>
                    </div>
                </div>

                <hr>

                <form method="GET"
                      action="{{ route('logout') }}"
                      onsubmit="return confirm('Apakah Anda yakin ingin keluar dari aplikasi?')">
                    @csrf

                    <button type="submit" class="btn btn-danger btn-block">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Logout
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
