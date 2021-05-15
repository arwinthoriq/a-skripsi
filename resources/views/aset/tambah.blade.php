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
              <li class="breadcrumb-item"><a href="{{ route('ruang') }}">Aset</a></li>
              <li class="breadcrumb-item">Tambah</li>
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
                <h3 class="card-title">Tambah Aset</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
                <form role="form" action="{{ route('aset-form') }}" method="POST" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="text-input" class=" form-control-label">Nama</label>
                        <input type="text"  name="nama" placeholder="Nama" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Merek</label>
                          <input type="text"  name="merek" placeholder="Merek" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Jumlah</label>
                          <input type="text"  name="jumlah" placeholder="Jumlah" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Tahun</label>
                          <input type="text"  name="tahun_pengadaan" placeholder="Tahun" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Harga</label>
                          <input type="text"  name="harga" placeholder="Harga" class="form-control" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="text-input" class=" form-control-label">Total Harga</label>
                          <input type="text"  name="total_harga" placeholder="Total Harga" class="form-control" required>
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
                          <textarea type="text"  name="keterangan" placeholder="Keterangan" class="form-control" required> </textarea>
                      </div>
                    </div>
                     <!-- text input -->
                  </div>

                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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