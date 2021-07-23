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
                <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('unitkerja-perbaikan-aset')  }}">Tambah </a> </h3>
              </div>
            </li>
            <li >
              <div class="col-sm-6">
              </div>
            </li>
            <li >
              <div >
                <form role="form" action="{{ route('unitkerja-print-perbaikan') }}" method="GET" enctype="multipart/form-data">
                  {{csrf_field()}}
                        <div class="input-group-prepend">
                        <button type="submit" class="btn btn-success"><i class="fas fa-download"></i></button>
                          <select class="form-control" name="Tahun">
                          @foreach($g as $dtj)
                                <option > {{  $dtj }}</option>
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
              <li class="breadcrumb-item"><a href="{{ route('unitkerja-home') }}">Home</a></li>
              <li class="breadcrumb-item">Perawatan</li>
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
                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}</td>
                                            <td>{{ $dt->status}}</td>
                                            <td>
                                                <a href= "{{ url('/unitkerja/home/perawatan/detail',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-success">Detail</a>
                                            </td>
                                            @if($dt->status == 'menunggu')
                                            <td>
                                                
                                                <a href= "{{ url('/unitkerja/home/perawatan/hapus',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Hapus</a>
                                                          <div class="modal fade" id="modal-default">
                                                            <div class="modal-dialog">
                                                              <div class="modal-content">
                                                                <div class="modal-header bg-danger">
                                                                  <h5 class="modal-title">Hapus</h5>
                                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                  </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                  <center><h6>Data Akan Dihapus </h6> Apakah Anda Yakin ?</center>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                  <a href="{{ url('/unitkerja/home/perawatan/hapus',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-danger">Hapus</a>
                                                                </div>
                                                              </div>
                                                              <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                          </div>
                                                          <!-- /.modal -->
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