<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RSUD TANAH ABANG DASHBOARD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo base_url() ;?>assets/img/logos-whitebackground.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div >
  <!-- Navbar -->
  <nav class=" navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <!-- ----- -->
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
            </div>
        </div>
        </form> -->
      </li>
      <li class="nav-item dropdown">
        <a href="<?php echo site_url('Login'); ?>" class="nav-link">Login</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

 

  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1>DASHBOARD BED RSUD TANAH ABANG</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <!-- ---- -->
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- =========================================================== -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $pasienDiRawat; ?></h3>

                <p>Pasien Dirawat</p>
              </div>
              <div class="icon">
              <i class="fas fa-procedures"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $ruangKosong; ?></h3>

                <p>Kamar Tersedia</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $schedule; ?></h3>

                <p>Pasien Di jadwalkan Pulang</p>
              </div>
              <div class="icon">
                <i class="fas fa-shield-virus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $bookedRoom; ?></h3>

                <p>Pasien Yang Akan Masuk</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ISOLASI COVID Lantai 1</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="cardRuangLily" class="card bg-danger">
                    <div class="card-header" id="ruangLilyCardHeader">
                      <h3 class="card-title">RUANG LILIY <span id="badgeRuangLily" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                          <tr>
                          <th>Nama Ruangan</th>
                          <th>Nama Pasien</th>
                          <th>Usia</th>
                          <th>Keterangan</th>
                          </tr>
                      </thead>
                      <tbody id="show_liliy">
                         <!-- ------  -->
                      </tbody>
                      </table>
                      <!-- end table -->
                    </div>
                    <!-- /.card-body -->
                  </div>

                  <div id="cardRuangHCU" class="card bg-danger">
                    <div class="card-header">
                      <h3 class="card-title">HCU <span id="badgeRuangHCU" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_hcu">
                          <!-- show -->
                        </tbody>
                      </table>
                      <!-- end table -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div  id="cardRuangICU" class="card bg-danger">
                    <div class="card-header">
                      <h3 class="card-title">ICU <span id="badgeRuangICU" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <H3></H3>
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_icu">
                          <!-- show -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div  class="card card-success">
              <div class="card-header">
                <h3 class="card-title">NON-ISOLASI Lantai 1</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="cardRuangLotus" class="card bg-success">
                    <div class="card-header">
                      <h3 class="card-title">RUANG LOTUS <span id="badgeRuangLotus" class="badge bg-warning"><?php echo "(Status Kosong)"; ?></span></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <thead>                  
                          <tr>
                          <th>Nama Ruangan</th>
                          <th>Nama Pasien</th>
                          <th>Usia</th>
                          <th>Keterangan</th>
                          </tr>
                      </thead>
                      <tbody id="show_lotus">
                         <!-- ------  -->
                      </tbody>
                      </table>
                      <!-- end table -->
                    </div>
                    <!-- /.card-body -->
                  </div>

                  <div id="cardRuangCempaka" class="card bg-success">
                    <div class="card-header">
                      <h3 class="card-title">Ruang Cempaka <span id="badgeRuangCempaka" class="badge bg-warning"><?php echo "(Status Kosong)"; ?></span></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_cempaka">
                          <!-- show -->
                        </tbody>
                      </table>
                      <!-- end table -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ISOLASI COVID Lantai 2</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="cardRuangAnggrek" class="card bg-danger">
                    <div class="card-header">
                      <h3 class="card-title">Ruang Anggrek <span id="badgeRuangAnggrek" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <H3></H3>
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_anggrek">
                          <!-- show -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div id="cardRuangMelati" class="card bg-danger">
                    <div class="card-header">
                      <h3 class="card-title">Ruang Melati <span id="badgeRuangMelati" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <H3></H3>
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_melati">
                          <!-- show -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div  id="cardRuangMawar" class="card bg-danger">
                    <div class="card-header">
                      <h3 class="card-title">Ruang Mawar <span id="badgeRuangMawar" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <H3></H3>
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_mawar">
                          <!-- show -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div id="cardRuangKenagga" class="card bg-danger">
                    <div class="card-header">
                      <h3 class="card-title">Ruang Kenangga <span id="badgeRuangKenagga" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <H3></H3>
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_kenangga">
                          <!-- show -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div id="cardRuangTulip" class="card bg-danger">
                    <div class="card-header">
                      <h3 class="card-title">Ruang Tulip <span id="badgeRuangTulip" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <H3></H3>
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_tulip">
                          <!-- show -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->

                  <div id="cardRuangPerina" class="card bg-primary">
                    <div class="card-header">
                      <h3 class="card-title">Ruang Perina <span id="badgeRuangPerina" class="badge bg-warning"><?php echo "(Status FULL)"; ?></h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <table class="table table-bordered">
                      <H3></H3>
                        <thead>                  
                          <tr>
                            <th>Nama Ruangan</th>
                            <th>Nama Pasien</th>
                            <th>Usia</th>
                            <th>Keterangan</th>
                          </tr>
                        </thead>
                        <tbody id="show_perina">
                          <!-- show -->
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/adminlte/dist/js/demo.js"></script>
<!-- swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>
</html>

<script type="text/javascript">

      function show_product() {
        console.log('REFRESH DATA RUN');
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangLiliy')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangLily span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangLily').attr('class', 'badge bg-primary');
              $('#cardRuangLily').attr('class', 'card bg-success'); 
            }               
            $('#show_liliy').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangHCU')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangHCU span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangHCU').attr('class', 'badge bg-primary');
              $('#cardRuangHCU').attr('class', 'card bg-success'); 
            } 
            $('#show_hcu').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangICU')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangICU span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangICU').attr('class', 'badge bg-primary');
              $('#cardRuangICU').attr('class', 'card bg-success'); 
            } 
            $('#show_icu').html(html);
            }
        });
        
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangICU')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            $('#show_icu').html(html);
            }
        });



        // lantai 2

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangAnggrek')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangAnggrek span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangAnggrek').attr('class', 'badge bg-primary');
              $('#cardRuangAnggrek').attr('class', 'card bg-success'); 
            } 
            $('#show_anggrek').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangMelati')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangMelati span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangMelati').attr('class', 'badge bg-primary');
              $('#cardRuangMelati').attr('class', 'card bg-success'); 
            } 
            $('#show_melati').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangMawar')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong = +1
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangMawar span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangMawar').attr('class', 'badge bg-primary');
              $('#cardRuangMawar').attr('class', 'card bg-success'); 
            } 
            $('#show_mawar').html(html);
            }
        });
        
        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangKenangga')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangKenagga span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangKenagga').attr('class', 'badge bg-primary');
              $('#cardRuangKenagga').attr('class', 'card bg-success'); 
            } 
            $('#show_kenangga').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangTulip')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
            console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            if (total_kosong  >= 1) {
              $('#cardRuangTulip span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangTulip').attr('class', 'badge bg-primary');
              $('#cardRuangTulip').attr('class', 'card bg-success'); 
            } 
            $('#show_tulip').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangPerina')?>',
            async: true,
            dataType: 'json',
            type: 'post',
            success: function (data) {
                console.log(data)
            var html = '';
            var i;
            var nama,umur,total_kosong=0;                
            for (i = 0; i < data.length; i++) {
              if (data[i].status=='KOSONG') {
                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                nama = '-';
                umur = '-';
                total_kosong++;
              }else if (data[i].status=='BOOKED') {
                var status_kamar = '<span class="badge bg-primary">WAITING LIST</span>'
                nama = data[i].nama_pasien_spgdt;
                umur = data[i].umur_pasien_spgdt;
              }else if (data[i].status=='SCHEDULE') {
                var status_kamar = '<span class="badge bg-success">DIJADWALKAN PULANG</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }else{
                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                nama = data[i].nm_pasien;
                umur = data[i].umur.slice(0,3);
              }
                var no = i + 1;
                html += '<tr>' +
                '<td>' + data[i].kd_kmr + '</td>' +
                '<td>' + nama + '</td>' +
                '<td>' + umur + ' </td>' +
                '<td>' + status_kamar+'</td>' +
                '</tr>';
            }
            console.log(total_kosong)
            if (total_kosong  >= 1) {
              $('#cardRuangPerina span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
              $('#badgeRuangPerina').attr('class', 'badge bg-primary');
              $('#cardRuangPerina').attr('class', 'card bg-success'); 
            } 
            $('#show_perina').html(html);
            }
        });

    }

    Swal.fire({
        imageUrl: "<?php echo base_url() ?>assets/img/logos-whitebackground.png",
        imageHeight: 150,
        imageAlt: 'A tall image',
        text: 'Selamat Datang Di Dasboard BED RSURSDTA',
        showConfirmButton: false,
        timer: 2500
    });

    setInterval("show_product();",10000);

    $(document).ready(function () {
      // LOTUS
      $('#badgeRuangLotus').attr('class', 'badge bg-success');
      $('#cardRuangLotus').attr('class', 'card bg-success');

      // CEMPAKA
      $('#badgeRuangCempaka').attr('class', 'badge bg-success');
      $('#cardRuangCempaka').attr('class', 'card bg-success');
      
      show_product()
        
    });
    
</script>
