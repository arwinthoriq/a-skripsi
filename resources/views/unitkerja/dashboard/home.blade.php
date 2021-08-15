@extends('layouts.main')

@section('content')
  <div class="content-wrapper"> <!-- Content Wrapper. Contains page content -->
    <section class="content">    <!-- Main content -->
      <div class="container-fluid"> <!-- container-fluid -->


        <div class="row"> <!-- row -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>{{ $disetujui->count() }}</h3>
                <p>Disetujui</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{ $menunggu->count() }}</h3>

                <p>Menunggu</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $proses->count() }}</h3>

                <p>Proses</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $ditolak->count() }}</h3>

                <p>Ditolak</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
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
                    <div class="col-6">
                      <div class="description-block border-right">
                        <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> {{ $perbaikan->count() }}</span>
                        <h5 class="description-header">PENGADAAN</h5>
                        <span class="description-text">DATA PENGADAAN</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class=" col-6">
                      <div class="description-block">
                        <span class="description-percentage text-secondary"><i class="fas fa-caret-left"></i> {{ $belumselesai->count() }}</span>
                        <h5 class="description-header">PENGADAAN</h5>
                        <span class="description-text">BELUM SELESAI</span>
                      </div>
                      <!-- /.description-block -->
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
            </div>
          </div>
        </div>



      </div>  <!-- /.container-fluid -->
    </section>  <!-- /.content -->
  </div>  <!-- /.content-wrapper -->
@endsection
