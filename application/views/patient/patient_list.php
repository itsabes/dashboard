<!-- Content Wrapper, Contains page content -->
<div class="content-wrapper">
    <!-- content header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">List of Patient</h1>
                </div>
                <div class="col-sm-6">
                    
                    <button type="button" class="btn btn-block btn-success float-sm-right col-2" data-toggle="modal" data-target="#addPatientSpgdt"><i class="fas fa-user-plus"></i> Add</button>
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
                            <table id="listPatient" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Rujuk</th>
                                <th>RS Perujuk</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>JK</th>
                                <th>Diagnosa</th>
                                <th>Kamar</th>
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

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="addPatientSpgdt" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPatinetSpgdtLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url() ?>Patient/postNewDataPatient">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Pasien</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Nama</label>
                                            <input  type="text" class="form-control" id="namaPasien"  name="namaPasien" placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Jenis Kelamin</label>
                                            <select class="form-control" id="jk" name="jk">
                                                <option value="L">Laki - Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Umur</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="umur" name="umur" placeholder="Umur" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Rumah Sakit Perujuk</label>
                                            <input  type="text" class="form-control" id="rumahSakitPerujuk" name="rumahSakitPerujuk" placeholder="Perujuk" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Diagnosa</label>
                                            <textarea id="diagnosa" name="diagnosa" class="form-control" placeholder="Diagnosa" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                                               
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="changeStatus"  data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="changeStatusLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <form role="form" method="post" action="<?php echo base_url() ?>Patient/updateStatusPatien">
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
                        <input  type="text" class="form-control" id="idPasienInModalChange"  name="idPasienInModalChange" readonly>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Nama Pasien</label>
                        <input  type="text" class="form-control" id="namaPasienInModalChange"  name="namaPasienInModalChange" readonly >
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">Status</label>
                        <select class="form-control" id="statusInModalChange" name="statusInModalChange">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alasan</label>
                        <textarea id="alasanInModalChange" name="alasanInModalChange" class="form-control"></textarea required>
                    </div>
                    <div id="sectionRoomInModalChange" class="form-group">
                        <label class="col-form-label">Booking Kamar</label>
                        <select class="form-control" id="roomInModalChange" name="roomInModalChange">
                        
                        </select>
                    </div>
                    <div class="form-group">
                        <label>keterangan</label>
                        <textarea id="keteranganInModalChange" name="keteranganInModalChange" class="form-control"></textarea required>
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

        <div class="modal fade bd-example-modal-lg" id="editPatientSpgdt" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addPatinetSpgdtLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form role="form" method="post" action="<?php echo base_url() ?>Patient/postEditDataPatient">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Pasien</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="form-group" >
                                    <label class="col-form-label">ID</label>
                                    <input  type="text" class="form-control" id="editIdPasien"  name="editIdPasien" placeholder="Nama" required>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Nama</label>
                                            <input  type="text" class="form-control" id="editNamaPasien"  name="editNamaPasien" placeholder="Nama" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Jenis Kelamin</label>
                                            <select class="form-control" id="editJk" name="editJk">
                                                <option value="L">Laki - Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Umur</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="editUmur" name="editUmur" placeholder="Umur" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Tahun</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="col-form-label">Rumah Sakit Perujuk</label>
                                            <input  type="text" class="form-control" id="editRumahSakitPerujuk" name="editRumahSakitPerujuk" placeholder="Perujuk" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Diagnosa</label>
                                            <textarea id="editDiagnosa" name="editDiagnosa" class="form-control" placeholder="Diagnosa" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                                               
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Change</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Main content -->
</div>
<!-- /.content wrapper -->