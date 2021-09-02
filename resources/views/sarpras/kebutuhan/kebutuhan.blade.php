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
             
            </li>
            <li >
              <div class="col-sm-6">
              </div>
            </li>
            <li >
              <div >
                <form role="form" action="{{ route('print-kebutuhan') }}" method="GET" enctype="multipart/form-data">
                  {{csrf_field()}}
                        <div class="input-group-prepend">
                        <button type="submit" class="btn btn-success"><i class="fas fa-download"></i></button>
                          <select class="form-control" name="Tahun">
                          @foreach($das as $dtj)
                                <option > {{  $dtj->tahun  }}</option>
                            @endforeach
                            </select>
                        </div>
                        <!-- /btn-group -->
                </form>
              </div>
            </li>
          </ol>
          <!--  <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('print-aset') }}" target="_blank">Print </a> </h3>  -->
        </div><!-- /.col -->



          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('sarpras-home') }}">Home</a></li>
              <li class="breadcrumb-item">Pengadaan</li>
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
                                        <th>Tanggal</th>
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
                                            <td>{{ $dt->kategori->nama}}</td>
                                            <td>{{ $dt->status}}</td>
                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}</td>
                                            <td>
                                                <a href= "{{ url('/sarpras/home/pengadaan/detail',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-success">Detail</a>
                                            </td>
                                            @if($dt->status == 'ditolak')
                                            <td>
                                            </td>
                                            @else
                                            <td></td>
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