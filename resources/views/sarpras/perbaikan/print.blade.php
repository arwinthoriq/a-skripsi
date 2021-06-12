
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
          <center>Data Perbaikan Dinas Pendidikan Kabupaten Blora <br> Tahun {{ $dth }}</center>
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
                                        <th>Merek</th>
                                        <th>Jenis</th>
                                        <th>Ruang</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <tr>
                                        <td>{{ $no }}</td>
                                            <td>{{ $dt->aset->nama}}</td>
                                            <td>{{ $dt->aset->merek}}</td>
                                            <td>{{ $dt->aset->jenis->nama}}</td>
                                            <td>{{ $dt->aset->ruang->nama}}</td>
                                            <td>{{ $dt->status}}</td>
                                            <td>{{  date("d-m-Y", strtotime($dt->created_at))   }}</td>
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
    <p ><b>Sub Total</b><br>
    Data Perbaikan : {{ $j->count()}}
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
