@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Detail Aset </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('aset') }}">Aset</a></li>
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
                <h3 class="card-title">Detail Aset</h3>
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
                    <td>{{ $data->tahun_pengadaan}}</td>
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
                    <td><b class="d-block">Tanggal</b></td>
                    <td>{{ date("d F Y", strtotime($data->created_at)) }}</td>
                    <tr>
                    <td><b class="d-block">Keterangan</b></td>
                    <td>{{ $data->keterangan}}</td>
                    <tr>
                    <td><b class="d-block">Jumlah</b></td>
                    <td>{{ $data->jumlah}}</td>
                    <tr>
                    <td><b class="d-block">Harga</b></td>
                    <td>{{ number_format($data->harga)}}</td>
                    <tr>
                    <td><b class="d-block">Total Harga</b></td>
                    <td>{{ number_format($data->total_harga)}}</td>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                    <div><a href="{{ route('aset') }}" class="btn btn-success">Kembali</a></div><br>
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