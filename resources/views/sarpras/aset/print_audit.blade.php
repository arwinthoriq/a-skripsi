
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
          <center>Data Audit <br> </center>
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
<i>Penambahan</i>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table>
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Tahun</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <tr>
                                        <td>{{ $no }}</td>
                                            <td>{{ date("d-m-Y", strtotime($dt->created_at)) }}}</td>
                                            <td>{{ $dt->nama}}</td>
                                            <td>{{ $dt->tahun_pengadaan}}</td>
                                            <td>{{ $dt->jumlah}}</td>
                                            <td>{{ $dt->keterangan}}</td>
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
<i>Pengurangan</i>
    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table>
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Nama</th>
                                        <th>Tahun</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                       <td></td>
                                     </tr>
                                </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

<br>
<br><br>
 <!-- info row -->
 <div class="row invoice-info">
 <div class="row">
      <div class="col-12 table-responsive">
        <table>
                                <tbody>
                                        <tr>
                                        <td>Dibuat Oleh</td>
                                        <td>Direview</td>
                                        <td>periode</td>
                                        <td>indeks</td>
                                        </tr>
                                </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
 </div>
              <!-- /.row -->




    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
