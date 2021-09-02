@extends('layouts.main')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="m-0 "> Edit Stock Opname </h5>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('sarpras-home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('sarpras-stockopname') }}">Stock Opname</a></li>
              <li class="breadcrumb-item">Edit</li>
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

    

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card card-dark">
                        <div class="card card-info">
                          <div class="card-header">
                            <h3 class="card-title">Nilai Buku</h3>
                          </div>
                        </div>
                    <div class="card-body">
                          <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="text-input" class=" form-control-label">Jumlah</label>
                                  <input type="text"  name="" placeholder="{{ $data->aset->jumlah}}" class="form-control" disabled>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="text-input" class=" form-control-label">Harga</label>
                                    <input type="text"  name="" placeholder="{{ $data->aset->harga}}" class="form-control" disabled>
                                </div>
                              </div>
                            <!-- text input -->
                          </div>
                    </div>
              </div>
            </div>
            <div class="col-md-10">
              <div class="card card-dark">
                        <div class="card card-success">
                          <div class="card-header">
                            <h3 class="card-title">Nilai Fisik</h3>
                          </div>
                        </div>
                    <div class="card-body">
                      <form role="form" action="{{ route('sarpras-stockopname-form-edit') }}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                          <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <label for="text-input" class=" form-control-label">Jumlah</label>
                                  <input type="text"  name="jumlah_fisik" value="{{ $data->jumlah_fisik}}" class="form-control" required>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="text-input" class=" form-control-label">Harga</label>
                                    <input type="text"  name="harga_fisik" value="{{ $data->harga_fisik}}" class="form-control" required>
                                </div>
                              </div>
                              <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="text-input" class=" form-control-label">Keterangan</label>
                                    <input type="text"  name="keterangan" value="{{ $data->keterangan}}" class="form-control" required>
                                </div>
                              </div>
                            <!-- text input -->
                          </div>
                          <div class="card-footer">
                            <button class="btn btn-primary"  type="button" data-toggle="modal" data-target="#modal-default">Submit</button>
                            <div class="modal fade" id="modal-default">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header bg-secondary">
                                    <h5 class="modal-title">Edit Stock Opname</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <center><h6>Data Stock Opname Akan Berubah </h6> Apakah Anda Yakin ?</center>
                                  </div>
                                  <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                    <button  type="submit" class="btn btn-primary" >Simpan</button>
                                  </div>
                                </div>
                                <!-- /.modal-content -->
                              </div>
                              <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                  </div>
                      </form>
                    </div>
              </div>
            </div>
          </div>
      </div>
    </section>

    


   


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection