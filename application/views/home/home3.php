<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RSUD SAWAH BESAR DASHBOARD BED </title>
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
<body class="hold-transition sidebar-mini" style="zoom:80%">
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
      <!-- <li class="nav-item dropdown">
        <a href="<?php echo site_url('Login'); ?>" class="nav-link">Login</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

 

  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3" style="text-align: center;">
              <img src="<?php echo base_url() ?>assets/img/LOGO sabes02.png" class="product-image" alt="RSUD SAWAH BESAR" style="width: 80%;">
          </div>
          <div class="col-sm-6" style="text-align: center;">
            <h1>INFORMASI BED MANAJEMEN</h1>
            <h1>RSUD SAWAH BESAR</h1>
            <?php
                date_default_timezone_set('Asia/Jakarta');

                function hari_ini(){
                    $hari = date ("D");
                
                    switch($hari){
                        case 'Sun':
                            $hari_ini = "Minggu";
                        break;
                
                        case 'Mon':			
                            $hari_ini = "Senin";
                        break;
                
                        case 'Tue':
                            $hari_ini = "Selasa";
                        break;
                
                        case 'Wed':
                            $hari_ini = "Rabu";
                        break;
                
                        case 'Thu':
                            $hari_ini = "Kamis";
                        break;
                
                        case 'Fri':
                            $hari_ini = "Jumat";
                        break;
                
                        case 'Sat':
                            $hari_ini = "Sabtu";
                        break;
                        
                        default:
                            $hari_ini = "Tidak di ketahui";		
                        break;
                    }
                
                    return "<b>" . $hari_ini . "</b>";
                
                }

                echo hari_ini().', '. date("d-m-y H:i:s ").' WIB';
            ?>
          </div>
          <div class="col-sm-3" style="text-align: center;">
              <img src="<?php echo base_url() ?>assets/img/pemprov_logo.png" class="product-image" alt="RSUD SAWAH BESAR" style="width: 18%;">
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col">
            <div class="small-box bg-primary">
              <div class="inner">
                  <h3 id="total_bed"><?php echo $room; ?></h3>

                  <p>Total Bed</p>
              </div>
              <div class="icon">
                  <i class="fa fa-cube"></i>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="small-box bg-warning">
              <div class="inner">
                  <h3 id="pasien_dirawat"><?php echo $pasienDiRawat; ?></h3>
                  <p>Pasien Dirawat</p>
              </div>
              <div class="icon">
              <i class="fas fa-procedures"></i>
              </div>
            </div>
          </div>          
          <div class="col">
            <div class="small-box bg-info">
              <div class="inner">
                  <h3 id="ruang_kosong"><?php echo $ruangKosong; ?></h3>
                  <p>Bed Tersedia</p>
              </div>
              <div class="icon">
                  <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
              </a> -->
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Lantai 1</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangMerak" class="card bg-danger" style="height: 70%;">
                      <div class="card-header" id="ruangAsterCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG MERAK </h3>
                        <div class="card-tools">
                        </div>
                      </div>
                      <div class="card-body">
                        <h3 class="card-title" style="font-size: 30px;"> <span id="badgeRuangMerak" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangAster" class="card bg-danger" style="height: 70%;">
                      <div class="card-header" id="ruangAsterCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG ASTER </h3>
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <h3 class="card-title" style="font-size: 30px;"> <span id="badgeRuangAster" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangRaflesia" class="card bg-danger" style="height: 70%;">
                      <div class="card-header" id="ruangRaflesiaCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG RAFLESIA </h3>
                        <div class="card-tools">
                        <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <h3 class="card-title" style="font-size: 30px;"> <span id="badgeRuangRaflesia" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">LANTAI 2</h3>

                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-md-4">
                    <div id="cardRuangICU" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang ICU <span id="badgeRuangICU" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_icu">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-4">
                    <div id="cardRuangICUIsolasi" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang ICU Isolasi <span id="badgeRuangICUIsolasi" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_icuIsolasi">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-4">
                    <div id="cardRuangHCU" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang HCU <span id="badgeRuangHCU" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_hcu">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                
                <br>
                <div class="row">
                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangGaruda" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang Garuda <span id="badgeRuangGaruda" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_garuda">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangBougenvile" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang Cempaka 1 <span id="badgeRuangBougenvile" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_bougenvile">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangCempaka2" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang Cempaka 2 <span id="badgeRuangCempaka2" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_Cempaka2">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangElang" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang Cempaka 3 <span id="badgeRuangElang" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_elang">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangRajawali" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang Cempaka 4 <span id="badgeRuangRajawali" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_rajawali">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangKutilang" class="card bg-danger" style="height: 100%;">
                      <div class="card-header">
                          <h3 class="card-title" style="font-size: 30px;">Ruang Cempaka 5 <span id="badgeRuangKutilang" class="badge bg-warning"><?php echo "(Status Full)"; ?></h3>
                          <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
                          </button>
                          </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <H3></H3>
                          <thead>
                            <tr>
                            <th>Nama Ruangan</th>
                            <th>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody id="show_kutilang">
                              <!-- show -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="card-title">Lantai 3</h3>
                  <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangCemara1" class="card bg-danger">
                      <div class="card-header" id="ruangAsterCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG CEMARA 1 <span id="badgeRuangCemara1" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_cemara1">
                              <!-- ------  -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangCemara2" class="card bg-danger">
                      <div class="card-header" id="ruangAsterCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG CEMARA 2 <span id="badgeRuangCemara2" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_cemara2">
                              <!-- ------  -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangCemara3" class="card bg-danger">
                      <div class="card-header" id="ruangAsterCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG CEMARA 3 <span id="badgeRuangCemara3" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_cemara3">
                              <!-- ------  -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangSeruni" class="card bg-danger">
                      <div class="card-header" id="ruangRaflesiaCardHeader">
                          <h3 class="card-title" style="font-size: 30px;">RUANG SERUNI <span id="badgeRuangSeruni" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_seruni">
                              <!-- ------  -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangAnyelir" class="card bg-danger">
                      <div class="card-header" id="ruangRaflesiaCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG ANYELIR PERINA <span id="badgeRuangAnyelir" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_anyelir">
                              <!-- ------  -->
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-2">
                    <div id="cardRuangAnggrek" class="card bg-danger">
                      <div class="card-header" id="ruangRaflesiaCardHeader">
                        <h3 class="card-title" style="font-size: 30px;">RUANG ANGGREK <span id="badgeRuangAnggrek" class="badge bg-warning"><?php echo "(Status Full)"; ?></span></h3>
                        <div class="card-tools">
                          <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
                        </div>
                      </div>
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>                  
                              <tr>
                              <th>Nama Ruangan</th>
                              <th>Keterangan</th>
                              </tr>
                          </thead>
                          <tbody id="show_anggrek">
                              <!-- ------  -->
                          </tbody>
                        </table>
                      </div>
                    </div>       
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

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

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })

      function show_product() {
        console.log('REFRESH DATA RUN');
        $('[data-toggle="tooltip"]').tooltip()
        $.ajax({
          type: 'ajax',
          url: '<?php echo site_url('Home/getSummaryData')?>',
          async: true,
          dataType: 'json',
          type: 'post',
          success: function(response) {
            
            $('#total_bed').html(response.room);
            $('#pasien_dirawat').html(response.pasienDiRawat);
            $('#ruang_kosong').html(response.ruangKosong);
            // $('#schedule').html(response.schedule);
            // $('#booked_room').html(response.bookedRoom);
          }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListMerak')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

                var umur = '', jk = '', booking = '';

                if (data[i].status == 'KOSONG') {

                  var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                  umur = '-';
                  jk = '-';
                  total_kosong++;
                } else {

                  var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                  umur = data[i].umur;
                  jk = data[i].jk;
                }

                html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangMerak span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangMerak').attr('class', 'badge bg-primary');
                $('#cardRuangMerak').attr('class', 'card bg-success'); 
              }

              $('#show_merak').html(html);

            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListAster')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

                var umur = '', jk = '', booking = '';

                if (data[i].status == 'KOSONG') {

                  var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                  umur = '-';
                  jk = '-';
                  total_kosong++;
                } else {

                  var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                  umur = data[i].umur;
                  jk = data[i].jk;
                }

                html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangAster span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangAster').attr('class', 'badge bg-primary');
                $('#cardRuangAster').attr('class', 'card bg-success'); 
              }

              $('#show_aster').html(html);

            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListRaflesia')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

                var umur = '', jk = '', booking = '';

                if (data[i].status == 'KOSONG') {

                  var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                  umur = '-';
                  jk = '-';
                  total_kosong++;
                } else {

                  var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                  umur = data[i].umur;
                  jk = data[i].jk;
                }

                html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangRaflesia span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangRaflesia').attr('class', 'badge bg-primary');
                $('#cardRuangRaflesia').attr('class', 'card bg-success'); 
              }

              $('#show_raflesia').html(html);

            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getRuangHCU')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
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
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
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
            url: '<?php echo site_url('Home/getRuangICUIsolasi')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangICUIsolasi span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangICUIsolasi').attr('class', 'badge bg-primary');
                $('#cardRuangICUIsolasi').attr('class', 'card bg-success'); 
              }
              
              $('#show_icuIsolasi').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListGaruda')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangGaruda span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangGaruda').attr('class', 'badge bg-primary');
                $('#cardRuangGaruda').attr('class', 'card bg-success'); 
              }
              
              $('#show_garuda').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListBougenvile')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangBougenvile span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangBougenvile').attr('class', 'badge bg-primary');
                $('#cardRuangBougenvile').attr('class', 'card bg-success'); 
              }
              
              $('#show_bougenvile').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListCempaka2')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangCempaka2 span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangCempaka2').attr('class', 'badge bg-primary');
                $('#cardRuangCempaka2').attr('class', 'card bg-success'); 
              }
              
              $('#show_Cempaka2').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListElang')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangElang span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangElang').attr('class', 'badge bg-primary');
                $('#cardRuangElang').attr('class', 'card bg-success'); 
              }
              
              $('#show_elang').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListRajawali')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangRajawali span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangRajawali').attr('class', 'badge bg-primary');
                $('#cardRuangRajawali').attr('class', 'card bg-success'); 
              }
              
              $('#show_rajawali').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListRajawaliBayi')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangRajawaliBayi span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangRajawaliBayi').attr('class', 'badge bg-primary');
                $('#cardRuangRajawaliBayi').attr('class', 'card bg-success'); 
              }
              
              $('#show_rajawalibayi').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListKutilang')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangKutilang span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangKutilang').attr('class', 'badge bg-primary');
                $('#cardRuangKutilang').attr('class', 'card bg-success'); 
              }
              
              $('#show_kutilang').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListEdelweis')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangEdelweis span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangEdelweis').attr('class', 'badge bg-primary');
                $('#cardRuangEdelweis').attr('class', 'card bg-success'); 
              }
              
              $('#show_edelweis').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListLili')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangLili span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangLili').attr('class', 'badge bg-primary');
                $('#cardRuangLili').attr('class', 'card bg-success'); 
              }
              
              $('#show_lili').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListTulip')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
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
            url: '<?php echo site_url('Home/getListAnggrek')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
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
            url: '<?php echo site_url('Home/getListAnggrekBayi')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangAnggrekBayi span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangAnggrekBayi').attr('class', 'badge bg-primary');
                $('#cardRuangAnggrekBayi').attr('class', 'card bg-success'); 
              }
              
              $('#show_anggrekbayi').html(html);
            }
        }); 

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListAnyelir')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangAnyelir span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangAnyelir').attr('class', 'badge bg-primary');
                $('#cardRuangAnyelir').attr('class', 'card bg-success'); 
              }
              
              $('#show_anyelir').html(html);
            }
        }); 

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListCemara1')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangCemara1 span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangCemara1').attr('class', 'badge bg-primary');
                $('#cardRuangCemara1').attr('class', 'card bg-success'); 
              }
              
              $('#show_cemara1').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListCemara2')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangCemara2 span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangCemara2').attr('class', 'badge bg-primary');
                $('#cardRuangCemara2').attr('class', 'card bg-success'); 
              }
              
              $('#show_cemara2').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListCemara3')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangCemara3 span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangCemara3').attr('class', 'badge bg-primary');
                $('#cardRuangCemara3').attr('class', 'card bg-success'); 
              }
              
              $('#show_cemara3').html(html);
            }
        });

        $.ajax({
            type: 'ajax',
            url: '<?php echo site_url('Home/getListSeruni')?>',
            dataType: 'json',
            type: 'post',
            success: function (data) {

              var html = '', total_kosong = 0;

              for (i = 0; i < data.length; i++) {

              var umur = '', jk = '', booking = '';

              if (data[i].status == 'KOSONG') {

                var status_kamar = '<span class="badge bg-primary">KOSONG</span>'
                umur = '-';
                jk = '-';
                total_kosong++;
              } else {

                var status_kamar = '<span class="badge bg-warning">DIRAWAT</span>'
                umur = data[i].umur;
                jk = data[i].jk;
              }

              html += '<tr><td>'+data[i].kd_kmr+'</td><td>'+status_kamar+'&nbsp;'+booking+'</td></tr>';
              }

              if (total_kosong  >= 1) {
                $('#cardRuangSeruni span').text('Jumlah Bed : '+data.length+ ' Tersedia : ' + total_kosong);
                $('#badgeRuangSeruni').attr('class', 'badge bg-primary');
                $('#cardRuangSeruni').attr('class', 'card bg-success'); 
              }
              
              $('#show_seruni').html(html);
            }
        });

    }

    Swal.fire({
        imageUrl: "<?php echo base_url() ?>assets/img/logos-whitebackground.png",
        imageHeight: 150,
        imageAlt: 'A tall image',
        text: 'INFORMASI BED MANAJEMEN RSUD SAWAH BESAR',
        showConfirmButton: false,
        timer: 1000
    });

    setInterval("show_product();",10000);

    $(document).ready(function () {
      // LOTUS
      // $('#badgeRuangLotus').attr('class', 'badge bg-success');
      // $('#cardRuangLotus').attr('class', 'card bg-success');

      // // CEMPAKA
      // $('#badgeRuangCempaka').attr('class', 'badge bg-success');
      // $('#cardRuangCempaka').attr('class', 'card bg-success');
      
      show_product()
        
    });
    
</script>

<script type="text/javascript">
    window.setTimeout( function() {
        window.location.reload();
    }, 50000);
</script>
