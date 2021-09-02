@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Detail Pengadaan </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('sarpras-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('sarpras-kebutuhan') }}">Pengadaan</a></li>
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
                <h3 class="card-title">Detail Pengadaan</h3>
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
                    <td><b class="d-block">Tahun</b></td>
                    <td>{{ $data->tahun}}</td>
                    <tr>
                    <td><b class="d-block">Merek</b></td>
                    <td>{{ $data->merek}}</td>
                    <tr>
                    <td><b class="d-block">Ruang</b></td>
                    <td>{{ $data->ruang->nama}}</td>
                    <tr>
                    <td><b class="d-block">Jenis</b></td>
                    <td>{{ $data->jenis->nama}}</td>
                    <tr>
                    <td><b class="d-block">Kategori</b></td>
                    <td>{{ $data->kategori->nama}}</td>
                    <tr>
                    <td><b class="d-block">Tanggal</b></td>
                    <td>{{ date("d-m-Y", strtotime($data->created_at)) }}</td>
                    <tr>
                    <td><b class="d-block">Keterangan</b></td>
                    <td>{{ $data->keterangan}}</td>
                    <tr>
                    <td><b class="d-block">Jumlah</b></td>
                    <td>{{ $data->jumlah}}</td>
                    <tr>
                    <td><b class="d-block">Harga</b></td>
                    <td>{{ number_format($data->harga, 0, "," , ".")  }}</td>
                    <tr>
                    <td><b class="d-block">Total Harga</b></td>
                    <td>{{ number_format($data->jumlah * $data->harga, 0, "," , ".")  }}</td>
                    <tr>
                    <td><b class="d-block">Status</b></td>
                    <td>{{ $data->status}}</td>
                    <tr>
                    <td><b class="d-block">Dibuat Oleh</b></td>
                    <td>{{ $data->user->name}}</td>
                    <tr>
                    <td><b class="d-block">Akses Pengguna</b></td>
                    <td>{{ $data->user->akses}}</td>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                    <div><a href="{{ route('sarpras-kebutuhan') }}" class="btn btn-success">Kembali</a></div><br>
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