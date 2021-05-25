@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Edit Status Perbaikan </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('perbaikan') }}">Perbaikan</a></li>
              <li class="breadcrumb-item">Status</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-dark">
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form role="form" action="{{ route('perbaikan-status') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Nama</label>
                        <input type="text"  name="" placeholder="{{ $data->aset->nama}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Merek</label>
                          <input type="text"  name="" placeholder="{{ $data->aset->merek}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Ruang</label>
                          <input type="text"  name="" placeholder="{{ $data->aset->ruang->nama}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Jenis</label>
                          <input type="text"  name="" placeholder="{{ $data->aset->jenis->nama}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Status</label>
                          <input type="text"  name="" placeholder="{{ $data->status}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Keterangan</label>
                          <input type="text"  name="" placeholder="{{ $data->keterangan}}" class="form-control" disabled> 
                      </div>
                    </div>
                    
                     <!-- text input -->
                 
                    <div class="col-sm-6">
                      <div class="form-group">
                            @if($data->status == 'menunggu')
                            <button class="btn btn-block bg-gradient-primary" name="status" value="disetujui" type="submit">Disetujui</button>
                            @elseif($data->status == 'disetujui')
                            <button class="btn btn-block bg-gradient-warning" name="status" value="proses" type="submit">Proses</button>
                            @elseif($data->status == 'proses')
                            <button class="btn btn-block bg-gradient-success" name="status" value="selesai" type="submit">Selesai</button>
                            @endif
                      </div>
                    </div>


                </form>
              </div>

            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection