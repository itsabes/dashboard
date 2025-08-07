<footer class="main-footer">
    <strong>SIMRS 2020 <a href="https://rsudtanahabang.jakarta.go.id/" target="_blank">RSUD Tanah Abang<a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/adminlte/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php echo base_url(); ?>assets/adminlte/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/adminlte/dist/js/demo.js"></script>
<!-- swal -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script type="text/javascript">



$(document).ready(function() {

    //SECTION OF PATIEN (*CONTROLER)
  getPatientList();
  getEmptyRoom();
    

  $(document).on("click", ".changeStatusPatient", function () {
     var idPasienInModalChange = $(this).data('id');
     var namaPasienInModalChange = $(this).data('name');
     var statusPasienInModalChange = $(this).data('status');
     $('#idPasienInModalChange').val( idPasienInModalChange );
     $('#namaPasienInModalChange').val( namaPasienInModalChange);
     //get detail pasien
     $.ajax({
         type : 'POST',
         dataType : 'JSON',
         url:'<?php echo base_url(); ?>Patient/getDetailPatient',
         data: {
          id_pasien: idPasienInModalChange,
        },
        success: function (data) {
            console.log(data)
            if(data.status == 200) {
                $('#alasanInModalChange').val(data.data[0].alasan);
                $('#keteranganInModalChange').val(data.data[0].keterangan);
            }                      
        }
     });
        $('#statusInModalChange').change(function(){
            if($(this).val() != '1'){ // or this.value == 'volvo'
                $('#sectionRoomInModalChange').hide();
            }else{
                $('#sectionRoomInModalChange').show();
            }
        });
        $('#statusInModalChange').html('');
        // console.log(statusPasienInModalChange)
        if (statusPasienInModalChange==1) {
            $('#statusInModalChange').html('<option value="1">Ubah Kamar</option><option value="3">Batal</option>');  
        }else {
            $('#statusInModalChange').html('<option value="0">-</option><option value="1">Diterima</option><option value="1">Ditolak</option>');  
        } 
    });

    $(document).on("click", ".editPatient", function () {
        var idPasienInModalEdit = $(this).data('id');
        var namaPasienInModalEdit = $(this).data('name');
        var jkPasienInModalEdit = $(this).data('jk');
        var umurPasienInModalEdit = $(this).data('umur');
        var perujukPasienInModalEdit = $(this).data('perujuk');
        var diagnosaPasienInModalEdit = $(this).data('diagnosa');
        $('#editIdPasien').val(idPasienInModalEdit);
        $('#editNamaPasien').val(namaPasienInModalEdit);
        $('#editJk').val(jkPasienInModalEdit);
        $('#editUmur').val(umurPasienInModalEdit);
        $('#editRumahSakitPerujuk').val(perujukPasienInModalEdit);
        $('#editDiagnosa').val(diagnosaPasienInModalEdit);
    });
    // END SECTION

    // SECTION PASIEN IN HOSPITAL
    getPatientOnDutyList();
    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD',
    });
    
    $(document).on("click", ".modalSchedulToHome", function () {
     var idPasienInModalSchedulToHome = $(this).data('id');
     var namaPasienInModalSchedulToHome = $(this).data('name');
     var roomInModalSchedulToHome = $(this).data('room');
     $('#idPasienInModalSchedulToHome').val( idPasienInModalSchedulToHome );
     $('#namaPasienInModalSchedulToHome').val( namaPasienInModalSchedulToHome );
     $('#roomInModalSchedulToHome').val( roomInModalSchedulToHome );
    });

    //END SECTION

});

function getPatientList() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url(); ?>Patient/getPatientList',
        dataType: 'JSON',
        success: function(data) {
            if(data.status == 200) {
               
                $('#listPatient tbody').empty();
                for(var i = 0; i < data.data.length; i++) {
                    var status_color ='';
                    if (data.data[i].status == 0) {
                        var status = '<span class="badge bg-warning">Belum Ada Status</span>'
                    }else if(data.data[i].status == 1){
                        var status = '<span class="badge bg-primary">Diterima</span>'
                    }else if(data.data[i].status == 2){
                        var status = '<span class="badge bg-danger">Ditolak</span>'
                    }else if(data.data[i].status == 3){
                        var status = '<span class="badge bg-danger">Batal</span>'                    
                    }else if(data.data[i].status == 4){
                        status_color = '#9effc2';
                        var status = '<span class="badge bg-primary">Dirawat</span>'
                    }
                    if (data.data[i].ruangan_dituju == '-') {
                        var kamar = '-';
                    }else{
                        kamar = data.data[i].ruangan_dituju;
                    }
                    // var action_button = '<a href="<?php echo base_url(); ?>Patient/?patientid='+(data.data[i].id_pasien)+'"><button class="btn btn-block btn-primary"></button></a>';
                    var action_button = '<div class="btn-group">'+
                    '<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>'+
                    '<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">'+
                      '<span class="sr-only">Toggle Dropdown</span>'+
                    '</button>'+
                    '<div class="dropdown-menu" role="menu">';
                    if (data.data[i].status != 4) {
                        action_button+='<a class="dropdown-item changeStatusPatient" data-toggle="modal" data-id="'+data.data[i].id_pasien+'" data-name="'+data.data[i].nama_pasien+'" data-status="'+data.data[i].status+'" data-target="#changeStatus">Ubah Status</a>'    
                        +'<a class="dropdown-item editPatient" data-toggle="modal" data-id="'+data.data[i].id_pasien+'" data-name="'+data.data[i].nama_pasien+'" data-jk="'+data.data[i].jk+'" data-umur="'+data.data[i].umur+'" data-perujuk="'+data.data[i].rs_perujuk+'" data-diagnosa="'+data.data[i].diagnosa+'" data-target="#editPatientSpgdt"">Edit</a>';
                    }
                    if(data.data[i].status == 1){
                        action_button+='<a class="dropdown-item" href="<?php echo base_url(); ?>Patient/updatePatienOnSite?patientid='+(data.data[i].id_pasien)+'">Dirawat</a>'
                    }

                    action_button+='<a class="dropdown-item" href="<?php echo base_url(); ?>Patient/?patientid='+(data.data[i].id_pasien)+'">Detail</a>'+
                    
                      '</div>'+
                    '</div>';
                    
                    $('#listPatient tbody').append('<tr style="background-color:'+status_color+'"><td>'+(i+1)+'</td>'+
                    '<td>'+(data.data[i].tgl_rujuk)+'</td>'+
                    '<td>'+(data.data[i].rs_perujuk)+'</td>'+
                    '<td>'+(data.data[i].nama_pasien)+'</td>'+
                    '<td>'+(data.data[i].umur)+'</td>'+
                    '<td>'+(data.data[i].jk)+'</td>'+
                    '<td>'+(data.data[i].diagnosa)+'</td>'+
                    '<td>'+kamar+'</td>'+
                    '<td>'+status+'</td>'+
                    '<td>'+action_button+'</td>'+
                    '</tr>');
                }
            }
            if(!$.fn.dataTable.isDataTable('#listPatient')) {
                var dataTable = $('#listPatient').DataTable({                    
                    "responsive": true,
                    "autoWidth": true,
                    "pageLength": 50
                });
                dataTable.responsive.recalc();
            }
        }
    });
}

function getEmptyRoom() {
    $.ajax({
        url : '<?php echo base_url(); ?>Patient/getEmptyroom',
        type:'POST',
        dataType: 'JSON',
        success: function(data) {
            if(data.status == 200) {
                for(var i = 0; i < data.data.length; i++) {
                    $("#roomInModalChange").append('<option value=' + encodeURI(data.data[i].kd_kamar) + '>' + data.data[i].kd_kamar + '</option>');
                }
            }
        }
    });
}

function getPatientOnDutyList() {
    $.ajax({
        type: 'GET',
        url: '<?php echo base_url(); ?>PatientOnSite/getPatientList',
        dataType: 'JSON',
        success: function(data) {
            if(data.status == 200) {
                $('#listPatientOnsite tbody').empty();
                for(var i = 0; i < data.data.length; i++) {
                    if (data.data[i].jadwal_pulang == 0) {
                        var jadwal_pulang = '<span class="badge bg-success">Dirawat</span>'
                    }else{
                        var jadwal_pulang = '<span class="badge bg-warning">Dijadwalkan Pulang '+data.data[i].jadwal_pulang+'</span>'
                    }
                    // var action_button = '<a href="<?php echo base_url(); ?>Patient/?patientid='+(data.data[i].id_pasien)+'"><button class="btn btn-block btn-primary"></button></a>';
                    var action_button = '<div class="btn-group">'+
                    '<button type="button" class="btn btn-primary"><i class="fas fa-edit"></i></button>'+
                    '<button type="button" class="btn btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown">'+
                      '<span class="sr-only">Toggle Dropdown</span>'+
                    '</button>'+
                    '<div class="dropdown-menu" role="menu">'+
                      '<a class="dropdown-item modalSchedulToHome" data-toggle="modal" data-id="'+data.data[i].no_rawat+'" data-name="'+data.data[i].nm_pasien+'" data-room="'+data.data[i].kd_kamar+'" data-target="#modalSchedulToHome">Jadwalkan Pulang</a>'+
                      '</div>'+
                    '</div>';

                    $('#listPatientOnsite tbody').append('<tr><td>'+(i+1)+'</td>'+
                    '<td>'+(data.data[i].no_rkm_medis)+'</td>'+
                    '<td>'+(data.data[i].nm_pasien)+'</td>'+
                    '<td>'+(data.data[i].umur)+'</td>'+
                    '<td>'+(data.data[i].jk)+'</td>'+
                    '<td>'+(data.data[i].kd_kamar)+'</td>'+
                    '<td>'+(data.data[i].lama)+'</td>'+
                    '<td>'+jadwal_pulang+'</td>'+
                    '<td>'+action_button+'</td>'+
                    '</tr>');
                }
            }
            if(!$.fn.dataTable.isDataTable('#listPatientOnsite')) {
                var dataTable = $('#listPatientOnsite').DataTable({                    
                    "responsive": true,
                    "autoWidth": true,
                    "pageLength": 50
                });
                dataTable.responsive.recalc();
            }
        }
    });
}


</script>
</body>

</html>
<?php
if($this->session->flashdata('FlashdataSuccess')) {
    ?>
    <script type="text/javascript">
    swal.fire({
        title: '<?php echo $this->session->flashdata('FlashdataSuccess')[0] ?>',
        text: '<?php echo $this->session->flashdata('FlashdataSuccess')[1] ?>',
        icon: 'success'
    });
    </script>
    <?php
} else if($this->session->flashdata('FlashdataWarning')) {
    ?>
    <script type="text/javascript">
    swal.fire({
        title: '<?php echo $this->session->flashdata('FlashdataWarning')[0] ?>',
        text: '<?php echo $this->session->flashdata('FlashdataWarning')[1] ?>',
        icon: "warning"
    });
    </script>
    <?php
} else if($this->session->flashdata('FlashdataInfo')) {
    ?>
    <script type="text/javascript">
    swal.fire({
        title: '<?php echo $this->session->flashdata('FlashdataInfo')[0] ?>',
        text: '<?php echo $this->session->flashdata('FlashdataInfo')[1] ?>',
        icon: "info"
    });
    </script>
    <?php
} else if($this->session->flashdata('FlashdataError')) {
    ?>
    <script type="text/javascript">
    swal.fire({
        title: '<?php echo $this->session->flashdata('FlashdataError')[0] ?>',
        text: '<?php echo $this->session->flashdata('FlashdataError')[1] ?>',
        icon: "error"
    });
    </script>
    <?php
}
?>
