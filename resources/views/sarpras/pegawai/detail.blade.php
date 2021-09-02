@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Detail Pegawai </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('sarpras-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('sarpras-pegawai') }}">Pegawai</a></li>
              <li class="breadcrumb-item">Detail</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">

        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Detail Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td><b class="d-block">Nama</b></td>
                    <td>{{ $data->nama}}</td>
                    <tr>
                    <td><b class="d-block">Jabatan</b></td>
                    <td>{{ $data->jabatan}}</td>
                    <tr>
                    <td><b class="d-block">Tempat Tanggal Lahir</b></td>
                    <td>{{ $data->ttl}}</td>
                    <tr>
                    <td><b class="d-block">NIP</b></td>
                    <td>{{ $data->nip}}</td>
                    <tr>
                    <td><b class="d-block">Jenis Kelamin</b></td>
                    <td>{{ $data->kelamin}}</td>
                    <tr>
                    <td><b class="d-block">Alamat</b></td>
                    <td>{{ $data->alamat}}</td>
                    <tr>
                    <td><b class="d-block">Tanggal</b></td>
                    <td>{{ date("d-m-Y", strtotime($data->created_at)) }}</td>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body.. -->
            </div>
            <!-- /.card -->
                    <div><a href="{{ route('sarpras-pegawai') }}" class="btn btn-success">Kembali</a></div><br>
          </div>
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection