@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Detail Stock Opname </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('sarpras-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('sarpras-stockopname') }}">Stock Opname</a></li>
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
          <div class="col-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Nilai Buku</h3>
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
                    <td><b class="d-block">Jumlah</b></td>
                    <td>{{ $data->aset->jumlah}}</td>
                    <tr>
                    <td><b class="d-block">Harga</b></td>
                    <td>Rp {{ number_format($data->aset->harga, 0, "," , ".") }}</td>
                    <tr>
                    <td><b class="d-block">Total Harga</b></td>
                    <td>Rp {{ number_format($data->aset->jumlah * $data->aset->harga, 0, "," , ".") }}</td>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

          <div class="col-6">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Nilai Fisik</h3>
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
                    <td><b class="d-block">Jumlah Fisik</b></td>
                    <td>{{ $data->jumlah_fisik}}</td>
                    <tr>
                    <td><b class="d-block">Harga Fisik</b></td>
                    <td>Rp {{ number_format($data->harga_fisik, 0, "," , ".") }}</td>
                    <tr>
                    <td><b class="d-block">Total Harga</b></td>
                    <td>Rp {{ number_format($data->jumlah_fisik * $data->harga_fisik, 0, "," , ".") }}</td>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Hasil</h3>
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
                    <td>{{ $data->aset->nama}}</td>
                    <tr>
                    <td><b class="d-block">Tahun</b></td>
                    <td>{{ $data->aset->tahun_pengadaan}}</td>
                    <tr>
                    <td><b class="d-block">Merek</b></td>
                    <td>{{ $data->aset->merek}}</td>
                    <tr>
                    <td><b class="d-block">Ruang</b></td>
                    <td>{{ $data->aset->ruang->nama}}</td>
                    <tr>
                    <td><b class="d-block">Jenis</b></td>
                    <td>{{ $data->aset->jenis->nama}}</td>
                    <tr >
                    <td><b class="d-block">Selisih Jumlah</b></td>
                        @if($data->aset->jumlah > $data->jumlah_fisik)
                            <td>{{ $data->aset->jumlah - $data->jumlah_fisik}}</td>
                        @else        
                            <td >{{ $data->jumlah_fisik - $data->aset->jumlah}}</td>
                        @endif
                    <tr>
                    <td><b class="d-block">Selisih Total Harga</b></td>
                        @if($data->aset->jumlah * $data->aset->harga > $data->jumlah_fisik * $data->harga_fisik)
                            <td>Rp {{ number_format($data->aset->jumlah * $data->aset->harga - $data->jumlah_fisik * $data->harga_fisik, 0, "," , ".") }}</td>
                        @else        
                            <td>Rp {{ number_format($data->jumlah_fisik * $data->harga_fisik - $data->aset->jumlah * $data->aset->harga, 0, "," , ".") }}</td>
                        @endif
                    <tr>
                    <td><b class="d-block">Keterangan</b></td>
                    <td>{{ $data->keterangan}}</td>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
                    <div><a href="{{ route('sarpras-stockopname') }}" class="btn btn-success">Kembali</a></div><br>
          </div>
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection