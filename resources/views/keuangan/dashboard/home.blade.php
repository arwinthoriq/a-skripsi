@extends('layouts.main')

@section('content')
  <div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content">    <!-- Main content -->
      <div class="container-fluid"> <!-- container-fluid -->


        <div class="row"> <!-- row -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $aset->count() }}</h3>
                <p>Aset</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('keuangan-aset') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $perbaikan->count() }}</h3>

                <p>Perawatan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('keuangan-perbaikan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $kebutuhan->count() }}</h3>

                <p>Pengadaan</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('keuangan-kebutuhan') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>  <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
                <div class="card-footer">
                  <div class="row">
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> {{ $perbaikan->count() }}</span>
                        <h5 class="description-header">PERAWATAN</h5>
                        <span class="description-text">DATA PERAWATAN</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block">
                        <span class="description-percentage text-secondary"><i class="fas fa-caret-left"></i> {{ $belumselesai->count() }}</span>
                        <h5 class="description-header">PERAWATAN</h5>
                        <span class="description-text">BELUM SELESAI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> {{ $kebutuhan->count() }}</span>
                        <h5 class="description-header">PENGADAAN</h5>
                        <span class="description-text">DATA KEBUTUHAN</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-3 col-6">
                      <div class="description-block">
                        <span class="description-percentage text-secondary"><i class="fas fa-caret-left"></i> {{ $kebutuhan_belumselesai->count() }}</span>
                        <h5 class="description-header">PENGADAAN</h5>
                        <span class="description-text">BELUM SELESAI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
            </div>
          </div>
        </div>

        <div class="row"> <!-- row -->
          

        <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-success">
                <h3 class="card-title">Perawatan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>                  
                    <tr>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-secondary">Menunggu</h6></td>
                      <td><span >{{ $menunggu->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-primary">Disetujui</h6></td>
                      <td><span >{{ $disetujui->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-danger">Ditolak</h6></td>
                      <td><span >{{ $ditolak->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-warning">Proses</h6></td>
                      <td><span >{{ $proses->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-success">Selesai</h6></td>
                      <td><span >{{ $selesai->count() }}</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
            <!-- /.card -->
          </div>



          <div class="col-md-6">
            <div class="card">
              <div class="card-header bg-warning">
                <h3 class="card-title">Pengadaan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>                  
                    <tr>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-secondary">Menunggu</h6></td>
                      <td><span >{{ $kebutuhan_menunggu->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-primary">Disetujui</h6></td>
                      <td><span >{{ $kebutuhan_disetujui->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-danger">Ditolak</h6></td>
                      <td><span >{{ $kebutuhan_ditolak->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-warning">Proses</h6></td>
                      <td><span >{{ $kebutuhan_proses->count() }}</span></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><h6 class="badge bg-success">Selesai</h6></td>
                      <td><span >{{ $kebutuhan_selesai->count() }}</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>  <!-- /.row -->


      </div>  <!-- /.container-fluid -->
    </section>  <!-- /.content -->
  </div>  <!-- /.content-wrapper -->
@endsection
