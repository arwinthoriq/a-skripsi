
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
          <center>Data Stock Opname Aset <br> </center>
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
                                        <th>Ruang</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Jumlah Fisik</th>
                                        <th>Harga Fisik</th>
                                        <th>Total Harga Fisik</th>
                                        <th>Selisih Jumlah</th>
                                        <th>Selisih Total Harga</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <tr>
                                        <td>{{ $no }}</td>
                                            <td>{{ $dt->aset->nama}}</td>
                                            <td>{{ $dt->aset->tahun_pengadaan}}</td>
                                            <td>{{ $dt->aset->merek}}</td>
                                            <td>{{ $dt->aset->ruang->nama}}</td>
                                            <td>{{ $dt->aset->jumlah}}</td>
                                            <td>{{ number_format($dt->aset->harga, 0, "," , ".")  }}</td>
                                            <td>{{ number_format($dt->aset->jumlah * $dt->aset->harga, 0, "," , ".")  }}</td>
                                            <td>{{ $dt->jumlah_fisik}}</td>
                                            <td>{{ number_format($dt->harga_fisik, 0, "," , ".")  }}</td>
                                            <td>{{ number_format($dt->jumlah_fisik * $dt->harga_fisik, 0, "," , ".")  }}</td>
                                            @if($dt->aset->jumlah > $dt->jumlah_fisik)
                                                <td>{{ $dt->aset->jumlah - $dt->jumlah_fisik}}</td>
                                            @else        
                                                <td >{{ $dt->jumlah_fisik - $dt->aset->jumlah}}</td>
                                            @endif
                                            @if($dt->aset->jumlah * $dt->aset->harga > $dt->jumlah_fisik * $dt->harga_fisik)
                                                <td>Rp {{ number_format($dt->aset->jumlah * $dt->aset->harga - $dt->jumlah_fisik * $dt->harga_fisik, 0, "," , ".") }}</td>
                                            @else        
                                                <td>Rp {{ number_format($dt->jumlah_fisik * $dt->harga_fisik - $dt->aset->jumlah * $dt->aset->harga, 0, "," , ".") }}</td>
                                            @endif
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

    <div class="row">
    </div>
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
