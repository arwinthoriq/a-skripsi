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
              <li class="breadcrumb-item"><a href="{{ route('sarpras-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('sarpras-perbaikan') }}">Perbaikan</a></li>
              <li class="breadcrumb-item">Aset</li>
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
                                        <th>Merek</th>
                                        <th>Ruang</th>
                                        <th>jenis</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt )
                                        <tr>
                                          <td>{{ $no }}</td>
                                            <td>{{ $dt->nama }}</td>
                                            <td>{{ $dt->merek }}</td>
                                            <td>{{ $dt->ruang->nama}}</td>
                                            <td>{{ $dt->jenis->nama}}</td>
                                            <td>  <a href= "{{ url('/sarpras/home/perbaikan/aset/tambah',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-primary">Perbaiki</a> </td>
                                             

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