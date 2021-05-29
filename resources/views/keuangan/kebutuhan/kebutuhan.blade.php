@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('keuangan-home') }}">Home</a></li>
              <li class="breadcrumb-item">Kebutuhan</li>
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
                                        <th>Nama</th>
                                        <th>Tahun</th>
                                        <th>Merek</th>
                                        <th>Jumlah</th>
                                        <th>Ruang</th>
                                        <th>jenis</th>
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
                                            <td>{{ $dt->nama}}</td>
                                            <td>{{ $dt->tahun}}</td>
                                            <td>{{ $dt->merek}}</td>
                                            <td>{{ $dt->jumlah}}</td>
                                            <td>{{ $dt->ruang->nama}}</td>
                                            <td>{{ $dt->jenis->nama}}</td>
                                            <td>{{ $dt->status}}</td>
                                            <td>
                                                <a href= "{{ url('/keuangan/home/kebutuhan/detail',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-success">Detail</a>
                                            </td>
                                            @if($dt->status == 'selesai')
                                            <td></td>
                                            @elseif($dt->status == 'ditolak')
                                            <td></td>
                                            @else
                                            <td>
                                                <a href= "{{ url('/keuangan/home/kebutuhan/status',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-block bg-gradient-warning">Edit Status</a>
                                            </td>
                                            @endif
                                            <td>
                                                <a href= "{{ url('/keuangan/home/kebutuhan/hapus',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-danger">Hapus</a>
                                            </td>
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