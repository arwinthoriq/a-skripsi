<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMASET</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
     <!-- <script src="{{ asset('js/app.js') }}" defer></script>  -->
     <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--<link href="{{ asset('alert/css/bootstrap.min.css') }}" rel="stylesheet">-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ asset('AdminLTE-master/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700') }}" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-master/plugins/toastr/toastr.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                <li class="nav-item">
                                  <a class="nav-link">{{ Auth::user()->name }} <span class="caret"></span>
                                  </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fa fa-power-off"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
  </nav>
    <main class="py-4">
            @yield('content')
        </main>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <center>
      <span class="brand-text font-weight-light">SIMASET</span></center>
    </a>
    <a href="/" class="brand-link">
        <center>
      <span class="brand-text font-weight-light">
          @if(Auth::user()->akses == 'sarpras')
           SARANA PRASARANA
          @endif
          @if(Auth::user()->akses == 'keuangan')
          KEUANGAN
          @endif
          @if(Auth::user()->akses == 'unitkerja')
          UMPEG
          @endif
      </span>
      </center>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          @if(Auth::user()->akses == 'sarpras')
          <li class="nav-item">
            <a href="{{route('sarpras-home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-aset')}}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p> Aset </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-ruang')}}" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p> Ruang </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-jenis')}}" class="nav-link">
              <i class="nav-icon fas fa-plus-square"></i>
              <p> Jenis </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-perbaikan')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p> Perawatan </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-kebutuhan')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Pengadaan </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-user')}}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p> Pengguna </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-stockopname')}}" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p> Stock Opname </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-kategori')}}" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p> Kategori </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('sarpras-pegawai')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p> Pegawai </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->akses == 'keuangan')
          <li class="nav-item">
            <a href="{{route('keuangan-home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('keuangan-aset')}}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p> Aset </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('keuangan-perbaikan')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p> Perawatan </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('keuangan-kebutuhan')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Pengadaan </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->akses == 'unitkerja')
          <li class="nav-item">
            <a href="{{route('unitkerja-home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p> Dashboard </p>
            </a>
          </li>
          <!--
          <li class="nav-item">
            <a href="{{route('unitkerja-perbaikan')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p> Perawatan </p>
            </a>
          </li>
          -->
          <li class="nav-item">
            <a href="{{route('unitkerja-kebutuhan')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p> Pengadaan </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="/">SIMASET</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE-master/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE-master/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script> $.widget.bridge('uibutton', $.ui.button) </script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE-master/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE-master/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE-master/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('AdminLTE-master/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE-master/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE-master/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE-master/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('AdminLTE-master/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE-master/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-master/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('AdminLTE-master/dist/js/pages/dashboard.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE-master/dist/js/demo.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('AdminLTE-master/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('AdminLTE-master/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE-master/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('AdminLTE-master/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('AdminLTE-master/plugins/toastr/toastr.min.js') }}"></script>

<!-- page script --> 
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>


<!--  <script src="{{ asset('AdminLTE-master/plugins/datatables/dataTables-search..min.js') }}"></script>  --> 
</body>
</html>
