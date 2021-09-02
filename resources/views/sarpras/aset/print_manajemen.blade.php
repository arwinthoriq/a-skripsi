
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SIMASET</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4  height: 70px; padding: 10px;  -->
  <style>
  table, td, th{
    border: 1px solid black;
  }
  table{
    border-collapse: collapse;
    width:100%;
  }
  th, td{
    height: 70px;
    text-align:center;
  }
  </style>
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">  
          <center>Data Manajemen <br></center>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row.. -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
      
      </div>
    </div>
    <!-- /.row -->
    <br>

    <!-- Table row -->
    <center><h3>Aset</h3></center>
    <div class="row">
      <div class="col-12 table-responsive">
        <table>
                                
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}</td>
                                            <td>{{ $dt->nama}}</td>
                                            <td>{{ $dt->jumlah}}</td>
                                            <td>{{ number_format($dt->jumlah * $dt->harga, 0, "," , ".")  }}</td>
                                        </tr>
                                        <?php $no++; ?>  
                                        @endforeach
                                </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
<br>
        <!-- Table row -->
        <center><h3>Pengadaan</h3></center>
    <div class="row">
      <div class="col-12 table-responsive">
        <table>
                                
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($datapd as $dt)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}</td>
                                            <td>{{ $dt->nama}}</td>
                                            <td>{{ $dt->jumlah}}</td>
                                            <td>{{ number_format($dt->jumlah * $dt->harga, 0, "," , ".")  }}</td>
                                            <td>{{ $dt->status}}</td>
                                        </tr>
                                        <?php $no++; ?>  
                                        @endforeach
                                </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <br>
        <!-- Table row -->
        <center><h3>Perawatan</h3></center>
    <div class="row">
      <div class="col-12 table-responsive">
        <table>
                                
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($datapr as $dt)
                                        <tr>
                                            <td>{{ $no }}</td>
                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}</td>
                                            <td>{{ $dt->aset->nama}}</td>
                                            <td>{{ $dt->status}}</td>
                                            <td>{{ $dt->keterangan}}</td>
                                        </tr>
                                        <?php $no++; ?>  
                                        @endforeach
                                </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
