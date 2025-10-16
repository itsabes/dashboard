<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DATA PENDAFTARAN RAWAT JALAN || RSUD SAWAH BESAR</title>

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
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        </li>
      </ul>

    </nav>

    <!-- Content Wrapper. Contains page content -->
    <div>

      <!-- Content Header (Page header) -->
      <section class="content-header" style="zoom:70%" >

        <div class="container-fluid">

          <div class="row mb-2">

            <div class="col-sm-3" style="text-align: center;">
                <img src="<?php echo base_url() ?>assets/img/LOGO sabes02.png" class="product-image" alt="RSUD SAWAH BESAR" style="width: 70%;">
            </div>

            <div class="col-sm-6" style="text-align: center;">
              <h2><b>INFORMASI DATA PENDAFTARAN RAWAT JALAN</b></h2>
              <h3>RSUD SAWAH BESAR</h3>
              <h4 id="date_time"></h4>
            </div>

            <div class="col-sm-3" style="text-align: center;">
                <img src="<?php echo base_url() ?>assets/img/pemprov_logo.png" class="product-image" alt="RSUD SAWAH BESAR" style="width: 18%;">
            </div>

          </div>

        </div>

      </section>

      <hr class="mb-5">

      <!-- Main content -->
      <section class="content">
        
        <div class="container-fluid">

          <div class="row m-2">

            <div class="col-xs-12 col-md-12">
              
              <form method="post" name="cariData" id="formFilter" class="form-horizontal" role="form" action="" onsubmit="return checkForm(this)">

                <div class="row">

                  <div class="col-xs-12 col-md-4">

                      <div class="form-group">

                          <div class="input-group">

                              <div class="input-group-prepend" >

                                  <span class="input-group-text" style="min-width: 150px;">
                                      Tanggal Dari
                                  </span>

                              </div>

                              <input type="date" class="form-control" id="from"
                                  name="from" value="<?= !empty($from) ? $from : date('Y-m-d') ?>">

                          </div>

                      </div>

                  </div>

                  <div class="col-xs-12 col-md-4">

                      <div class="form-group">

                          <div class="input-group">

                              <div class="input-group-prepend">

                                  <span class="input-group-text" style="min-width: 150px;">
                                      Tanggal Sampai
                                  </span>

                              </div>

                              <input type="date" class="form-control" id="to"
                                  name="to" value="<?= !empty($to) ? $to : date('Y-m-d') ?>">

                          </div>

                      </div>

                  </div>

                  <div class="col-xs-12 col-md-4 float-right">

                      <button type="submit" id="btnCaripasien" name="cari" class="btn btn-m btn-primary float-left" style="background-color:#2e4e65;"> <i
                      class="fa fa-search"></i> Cari Data </button>

                  </div>

                </div>

              </form>  

            </div>

          </div>

          <div class="row" style="zoom:50%">

            <div class="col-xs-12 col-sm-12 col-lg-12">

              <div class="card card-primary p-4 m-4">

                <div class="card-body">

                  <div class="row">

                    <div class="col-xs-12 col-md-12">

                      <p class="card-title" style="font-size: 35px;">
                        Tanggal yang dipilih:
                        <strong><span id="tanggal-dari-span"></span></strong> -
                        <strong><span id="tanggal-sampai-span"></span></strong>
                      </p>

                    </div>

                  </div>

                  </br>

                  <div class="row">

                    <div class="col-xs-12 col-md-12">

                      <div class="card" id="result" style="min-height: 400px;">

                        <div class="card-header text-white" id="ruangAsterCardHeader" style="background-color:#2e4e65;">
                          
                          <h3 class="card-title w-100 text-center" style="font-size: 35px;"><b>JUMLAH PENDAFTARAN RAWAT JALAN</b></h3>

                        </div>

                        <div class="card-body d-flex justify-content-center align-items-center">

                          <h1 class="w-100 text-center" style="font-size: 150px; font-weight: 600; color: #2e4e65;">

                            <span id="total_kunjungan"></span>

                          </h1>

                        </div>

                      </div>

                    </div>
                    
                  </div>

                  </br>
                  
                  <div class="row">

                    <div class="col-xs-12 col-md-6">

                      <div class="card" id="result" style="min-height: 300px;">

                        <div class="card-header text-white" id="ruangAsterCardHeader" style="background-color:#2e4e65;">

                          <h3 class="card-title w-100 text-center" style="font-size: 35px;"><b>JUMLAH PENDAFTARAN ONLINE</b></h3>
 
                        </div>

                        <div class="card-body d-flex justify-content-center align-items-center">

                          <h1 class="w-100 text-center" style="font-size: 100px; font-weight: 600; color: #2e4e65;">

                            <span id="jumlah_online">-</span>

                          </h1>

                        </div>

                      </div>

                    </div>

                    <div class="col-xs-12 col-md-6">

                      <div class="card" id="result" style="min-height: 300px;">

                        <div class="card-header text-white" id="ruangAsterCardHeader" style="background-color:#2e4e65;">
                          
                          <h3 class="card-title w-100 text-center" style="font-size: 35px;"><b>JUMLAH PENDAFTARAN ONSITE</b></h3>
 
                        </div>

                        <div class="card-body d-flex justify-content-center align-items-center">

                          <h1 class="w-100 text-center" style="font-size: 100px; font-weight: 600; color: #2e4e65;">

                            <span id="jumlah_onsite">-</span>

                          </h1>

                        </div>

                      </div>

                    </div>

                  </div>

                  </br>

                  <div class="row">

                    <div class="col-xs-12 col-md-6">

                      <div class="card" id="result" style="min-height: 300px;">

                        <div class="card-header text-white" id="ruangAsterCardHeader" style="background-color:#2e4e65;">
                          
                          <h3 class="card-title w-100 text-center" style="font-size: 35px;"><b>PERSENTASE PENDAFTARAN ONLINE</b></h3>
 
                        </div>

                        <div class="card-body d-flex justify-content-center align-items-center">

                          <h1 class="w-100 text-center" style="font-size: 100px; font-weight: 600; color: #2e4e65;">

                            <span id="persen_online"></span>

                          </h1>

                        </div>

                      </div>

                    </div>

                    <div class="col-xs-12 col-md-6">

                      <div class="card" id="result" style="min-height: 300px;">

                        <div class="card-header text-white" id="ruangAsterCardHeader" style="background-color:#2e4e65;">
                          
                          <h3 class="card-title w-100 text-center" style="font-size: 35px;"><b>PERSENTASE PENDAFTARAN ONSITE</b></h3>
 
                        </div>

                        <div class="card-body d-flex justify-content-center align-items-center">

                          <h1 class="w-100 text-center" style="font-size: 100px; font-weight: 600; color: #2e4e65;">

                            <span id="persen_onsite">0%</span>

                          </h1>

                        </div>

                      </div>

                    </div>

                  </div>

                  </br>

                  <div class="row">

                    <div class="col-xs-12 col-md-12">

                          <p class="card-title" style="font-size: 35px;"><strong>Catatan: </strong></p>
                          <ol class="card-title" style="font-size: 35px;">
                            <li>
                              <p>Pendaftaran Online dapat dilakukan melalui via Pelayanan SiYuko RSUD Sawah Besar, Aplikasi Mobile JKN dan Aplikasi JakSehat</p>
                            </li>
                            <li>
                              <p>Tanggal yang dipilih adalah tanggal kunjungan pasien di RSUD Sawah Besar</p>
                            </li>
                          </ol>

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

<!-- Script untuk mengaktifkan tooltip -->
<script type="text/javascript">

      $(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })

    Swal.fire({
        imageUrl: "<?php echo base_url() ?>assets/img/logos-whitebackground.png",
        imageHeight: 250,
        imageAlt: 'A tall image',
        text: 'INFORMASI DATA PENDAFTARAN RAWAT JALAN',
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

      setTimeout(scrol,1000);
        function scrol() {
            readMessage();
            var textArea = document.getElementById("Message");
            textArea.scrollTop = textArea.scrollHeight;
            setTimeout(scrol,1000);
        }
    });
    
</script>

<!-- Script untuk waktu saat ini pada Header -->
<script type="text/javascript">
  function date_time(id) {
    date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');
    h = date.getHours();
    if(h<10)
      {
      h = "0"+h;
      }
      m = date.getMinutes();
      if(m<10)
      {
      m = "0"+m;
      }
      s = date.getSeconds();
      if(s<10)
      {
      s = "0"+s;
      }
    result = ''+days[day]+', '+d+' '+months[month]+' '+year+' '+h+':'+m+':'+s+' WIB';
    document.getElementById(id).innerHTML = result;
    setTimeout('date_time("'+id+'");','1000');
    return true;
    }
  </script>
  <script type="text/javascript">window.onload = date_time('date_time');</script>


  <!-- Script untuk menampilkan tanggal saat ini/yang dipilih -->
<script>
  function formatTanggalIndo(tanggal) {
      const date = new Date(tanggal);
      const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
      const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      return days[date.getDay()] + ', ' + date.getDate() + ' ' + months[date.getMonth()] + ' ' + date.getFullYear();
  }

  function updateTanggalDipilih(from, to) {
      const formattedFrom = formatTanggalIndo(from);
      const formattedTo = formatTanggalIndo(to);
      $('#tanggal-dari-span').text(formattedFrom);
      $('#tanggal-sampai-span').text(formattedTo);
  }

  $(document).ready(function () {
      // Saat halaman pertama kali dibuka
      const today = new Date().toISOString().split('T')[0];
      updateTanggalDipilih(today, today);

      // Saat tombol "Cari Data" diklik
      $('#formFilter').submit(function (e) {
          e.preventDefault();
          const from = $('#from').val();
          const to = $('#to').val();
          updateTanggalDipilih(from, to);
          getKunjungan(from, to);
      });
  });
</script>

<!-- AJAX untuk mengambil data kunjungan -->
<script>
  function getKunjungan(from, to) {
    $.ajax({
        url: '<?= base_url('home/get_kunjungan_dashboard') ?>',
        method: 'GET',
        data: {
            from: from,
            to: to
        },
        beforeSend: function () {
            Swal.fire({
                imageUrl: "<?php echo base_url() ?>assets/img/logos-whitebackground.png",
                imageHeight: 150,
                imageAlt: 'A tall image',
                title: 'Informasi Data Pendaftaran Rawat Jalan',
                imageHeight: 200,
                html: 'Sedang memuat...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
        },
        success: function(response) {
            Swal.close(); // Tutup loader
            const res = JSON.parse(response);
            if (res.status === 200) {
                const data = res.data;
                $('#total_kunjungan').text(data.total_kunjungan);
                $('#jumlah_online').text(data.jumlah_online);
                $('#persen_online').text(data.persen_online + '%');
                $('#jumlah_onsite').text(data.jumlah_onsite);
                $('#persen_onsite').text(data.persen_onsite + '%');
            } else {
                Swal.fire('Peringatan', 'Data tidak ditemukan', 'warning');
            }
        },
        error: function() {
            Swal.fire('Error', 'Terjadi kesalahan saat mengambil data', 'error');
        }
    });
  }


  // ✅ Panggil saat pertama kali halaman dibuka
  $(document).ready(function() {
      const today = new Date().toISOString().split('T')[0];
      getKunjungan(today, today);
  });

  // ✅ Event tombol cari
  $('#formFilter').submit(function(e) {
      e.preventDefault();
      const from = $('#from').val();
      const to = $('#to').val();
      getKunjungan(from, to);
  });
</script>
