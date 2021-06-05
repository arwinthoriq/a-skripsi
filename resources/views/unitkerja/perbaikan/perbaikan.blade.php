@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('unitkerja-perbaikan-aset') }}">Tambah </a> </h3>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('unitkerja-home') }}">Home</a></li>
              <li class="breadcrumb-item">Perbaikan</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="card">
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Aset</th>
                                        <th>Merek</th>
                                        <th>Ruang</th>
                                        <th>Jenis</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ $dt->aset->nama}}</td>
                                            <td>{{ $dt->aset->merek}}</td>
                                            <td>{{ $dt->aset->ruang->nama}}</td>
                                            <td>{{ $dt->aset->jenis->nama}}</td>
                                            <td>{{ date("d F Y", strtotime($dt->created_at)) }}</td>
                                            <td>{{ $dt->status}}</td>
                                            <td>
                                                <a href= "{{ url('/unitkerja/home/perbaikan/detail',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-success">Detail</a>
                                            </td>
                                            @if($dt->status == 'menunggu')
                                            <td>
                                                <a href= "{{ url('/unitkerja/home/aset/hapus',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
                                            @endif
                                        </tr>
                                        <?php $no++; ?>    
                                        @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection