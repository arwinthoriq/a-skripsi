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
                <h3 class="m-0 "> <a class="btn btn-primary" href="{{ route('sarpras-stockopname-aset') }}">Tambah </a> </h3>
              </div>
            </li>
            <li >
              <div class="col-sm-6">
              </div>
            </li>
            <li >
              <div >
                <form role="form" action="{{ route('print-stockopname') }}" method="GET" enctype="multipart/form-data">
                  {{csrf_field()}}
                        <div class="input-group-prepend">
                        <button type="submit" class="btn btn-success"><i class="fas fa-download"></i> PDF</button>
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
              <li class="breadcrumb-item">Stock Opname</li>
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
                                        <th>Ruang</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Jumlah Fisik</th>
                                        <th>Total Harga Fisik</th>
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
                                            <td>{{ $dt->aset->ruang->nama}}</td>
                                            <td>{{ $dt->aset->jumlah}}</td>
                                            <td>{{ $dt->aset->jumlah * $dt->aset->harga}}</td>
                                            <td>{{ $dt->jumlah_fisik}}</td>
                                            <td>{{ $dt->jumlah_fisik * $dt->harga_fisik}}</td>
                                            <td>
                                                <a href= "{{ url('/sarpras/home/stock-opname/detail',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-success">Detail</a>
                                            </td>
                                            <td>
                                                <a href= "{{ url('/sarpras/home/stock-opname/edit',['id'=>Crypt::encrypt($dt->id)]) }}" class="btn btn-warning">Edit</a>
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