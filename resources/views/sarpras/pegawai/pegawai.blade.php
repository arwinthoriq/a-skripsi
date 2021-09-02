@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <li >
              <div class="col-sm-6">
                <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('sarpras-pegawai-form') }}">Tambah </a> </h3>
              </div>
            </li>
            <li >
              <div class="col-sm-6">
              </div>
            </li>
          </ol>
          <!--  <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('print-aset') }}" target="_blank">Print </a> </h3>  -->
          </div><!-- /.col -->


          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('sarpras-home') }}">Home</a></li>
              <li class="breadcrumb-item">Pegawai</li>
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
                                        <th>Jabatan</th>
                                        <th>TTL</th>
                                        <th>NIP</th>
                                        <th>Jenis Kelamin</th>
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
                                            <td>{{ $dt->jabatan}}</td>
                                            <td>{{ $dt->ttl}}</td>
                                            <td>{{ $dt->nip}}</td>
                                            <td>{{ $dt->kelamin}}</td>
                                            <td>
                                                <a href= "{{ url('/sarpras/home/pegawai/detail',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-success">Detail</a>
                                            </td>
                                            <td>
                                                <a href= "{{ url('/sarpras/home/pegawai/edit',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-warning">Edit</a>
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