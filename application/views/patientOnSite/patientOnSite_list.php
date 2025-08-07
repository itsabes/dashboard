<!-- Content Wrapper, Contains page content -->
<div class="content-wrapper">
    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pasien Dirawat</h1>
                </div>
                <div class="col-sm-6">
                    
                    <!-- <button type="button" class="btn btn-block btn-success float-sm-right col-2" data-toggle="modal" data-target="#addPatientSpgdt"><i class="fas fa-user-plus"></i> Add</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.content header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- card -->
                    <div class="card card-primary card-outline">
                        <!-- card-body -->
                        <div class="card-body">
                            <table id="listPatientOnsite" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>RM</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>JK</th>                                
                                <th>Kamar</th>
                                <th>Lama Rawat</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalSchedulToHome"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="schedulToHomeLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form role="form" method="post" action="<?php echo base_url() ?>PatientOnSite/postSchedulGoHome">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Change Status Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group" hidden>
                        <label class="col-form-label">Id Pasien</label>
                        <input  type="text" class="form-control" id="idPasienInModalSchedulToHome"  name="idPasienInModalSchedulToHome" readonly>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama Pasien</label>
                        <input  type="text" class="form-control" id="namaPasienInModalSchedulToHome"  name="namaPasienInModalSchedulToHome" readonly >
                    </div> 
                    <div class="form-group">
                        <label class="col-form-label">Kamar</label>
                        <input  type="text" class="form-control" id="roomInModalSchedulToHome"  name="roomInModalSchedulToHome" readonly >
                    </div>                    
                    <div class="form-group">
                    <label>Jadwalkan Pulang</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="Tanggal Dijadwalkan" id="dateModalSchedulToHome" name="dateModalSchedulToHome"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save changes</button>
                </div>
                </div>
                </form>
            </div>
        </div>
    </section>
    <!-- /.Main content -->
</div>
<!-- /.content wrapper -->