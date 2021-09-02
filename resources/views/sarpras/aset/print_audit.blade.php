
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

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table>
                                <thead>
                                    <tr>
                                    <th>No</th>
                                        <th>Nama</th>
                                        <th>Tahun</th>
                                        <th>Merek</th>
                                        <th>Jenis</th>
                                        <th>kategori</th>
                                        <th>Ruang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <tr>
                                        <td>{{ $no }}</td>
                                            <td>{{ $dt->nama}}</td>
                                            <td>{{ $dt->tahun_pengadaan}}</td>
                                            <td>{{ $dt->merek}}</td>
                                            <td>{{ $dt->jenis->nama}}</td>
                                            <td>{{ $dt->kategori->nama}}</td>
                                            <td>{{ $dt->ruang->nama}}</td>
                                            <td>{{ $dt->jumlah}}</td>
                                            <td>{{ number_format($dt->harga, 0, "," , ".")  }}</td>
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
