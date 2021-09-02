@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Edit Status Pengadaan </h5>
@if($m = session::get('sukses'))
<div class="alert alert-success alert-block">
    <strong>{{$m}}</strong> 
    <button type="button" class="close" data-dismiss="alert"> &times;
    </button>
</div>
@endif
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('keuangan-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('keuangan-kebutuhan') }}">Pengadaan</a></li>
              <li class="breadcrumb-item">Status</li>
            </ol>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@if($data->status == 'selesai')
    <!-- Main content -->
    <section class="content">
      <div class="error-page">

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Akses Ditolak.</h3>


        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
@else

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
                <form role="form" action="{{ route('keuangan-kebutuhan-status') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row">
                      <!-- text input -->
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Nama</label>
                        <input type="text"  name="" placeholder="{{ $data->nama}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Tahun</label>
                        <input type="text"  name="" placeholder="{{ $data->tahun}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Jumlah</label>
                        <input type="text"  name="" placeholder="{{ $data->jumlah}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Harga</label>
                        <input type="text"  name="" placeholder="{{ $data->harga}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Total Harga</label>
                        <input type="text"  name="" placeholder="{{ $data->jumlah * $data->harga}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Merek</label>
                          <input type="text"   name="" placeholder="{{ $data->merek}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Ruang</label>
                          <input type="text"   name="" placeholder="{{ $data->ruang->nama}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Jenis</label>
                          <input type="text"   name="" placeholder="{{ $data->jenis->nama}}" class="form-control" disabled>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Kategori</label>
                          <input type="text"   name="" placeholder="{{ $data->kategori->nama}}" class="form-control" disabled>
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
                  <div class="margin">
                  @if($data->status == 'menunggu')
                    <div class="btn-group">
                            <button class="btn btn-block bg-gradient-primary"  type="button" data-toggle="modal" data-target="#modal-disetujui">Disetujui</button>
                            <div class="modal fade" id="modal-disetujui">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Edit Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <center><h6>Status Akan Berubah Menjadi "Disetujui" </h6> Apakah Anda Yakin ?</center>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button name="status" value="disetujui" type="submit" class="btn btn-primary" >Simpan</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                    </div>
                    <div class="btn-group">
                            <button class="btn btn-block bg-gradient-danger"  type="button" data-toggle="modal" data-target="#modal-ditolak">Ditolak</button>
                            <div class="modal fade" id="modal-ditolak">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Edit Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <center><h6>Status Akan Berubah Menjadi "Ditolak" </h6> Apakah Anda Yakin ?</center>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button name="status" value="ditolak" type="submit" class="btn btn-primary" >Simpan</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                  </div>
                  @elseif($data->status == 'disetujui')
                    <div class="btn-group">
                            <button class="btn btn-block bg-gradient-warning" type="button" data-toggle="modal" data-target="#modal-default">Proses</button>
                            <div class="modal fade" id="modal-default">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Edit Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <center><h6>Status Akan Berubah Menjadi "Proses" </h6> Apakah Anda Yakin ?</center>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button name="status" value="proses" type="submit" class="btn btn-primary" >Simpan</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                    </div>

                  @endif
                </div>
              </div>
              
              @if($data->status == 'proses')
              <div class="col-sm-6">
                      <div class="form-group">
                        <a href= "{{ url('/keuangan/home/pengadaan/status/selesai',['id'=>Crypt::encrypt($data->id)]) }} " class="btn btn-success">Ke Halaman Helesai</a>
                      </div>
                    </div>
              @endif
              


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
@endif
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection