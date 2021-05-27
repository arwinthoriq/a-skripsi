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
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('aset') }}">Aset</a></li>
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
              <div class="card-header">
                <h3 class="card-title">Edit Aset</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form role="form" action="{{ route('aset-form-edit') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Nama</label>
                        <input type="text"  name="nama" value="{{ $data->nama}}" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Merek</label>
                          <input type="text"  name="merek" value="{{ $data->merek}}" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Jumlah</label>
                          <input type="text"  name="jumlah" value="{{ $data->jumlah}}" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Tahun</label>
                          <input type="text"  name="tahun_pengadaan" value="{{ $data->tahun_pengadaan}}" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Harga</label>
                          <input type="text"  name="harga" value="{{ $data->harga}}"  class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Total Harga</label>
                          <input type="text"  name="total_harga" value="{{ $data->total_harga}}"  class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Jenis</label>
                          <select class="form-control" name="jenis_id">
                          @foreach($dataj as $dtj)
                              <option value="{{ Crypt::encrypt($dtj->id) }}">{{ $dtj->nama}}</option>
                          @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Ruang</label>
                          <select class="form-control" name="ruang_id">
                          @foreach($datar as $dtr)
                              <option value="{{ Crypt::encrypt($dtr->id) }}">{{ $dtr->nama}}</option>
                          @endforeach
                          </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Keterangan</label>
                          <textarea type="text"  name="keterangan" value="{{ $data->keterangan}}"  class="form-control" required>{{ $data->keterangan}} </textarea>
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
                                    <h5 class="modal-title">Edit Aset</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <center><h6>Data Aset Akan Berubah </h6> Apakah Anda Yakin ?</center>
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