<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Edit Profil</h4>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('admin/index'); ?>">
                                            <i class="icofont icofont-home"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/edit_profil_admin'); ?>">Edit Profil</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Row start -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Edit Profil</h5>
                                </div>
                                <div class="col-lg-8">
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="<?= base_url('admin/edit_profil_admin'); ?>" enctype="multipart/form-data">
                                        <div class="form-row">
                                            <div class="form-group col-md-7">
                                                <input type="text" class="form-control" id="no_identitas" name="no_identitas" value="<?= $admin['no_identitas']; ?>" readonly>
                                                <?= form_error('no_identitas', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                <span class="md-line"></span>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= $admin['email']; ?>">
                                                <input type="text" class="form-control form-control-user" id="id_admin" name="id_admin" placeholder="Email" value="<?= $admin['id_admin']; ?>" hidden>
                                                <span class="md-line"></span>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <input type="text" class="form-control" id="name" name="name" value="<?= $admin['name']; ?>">
                                                <?= form_error('name', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                <span class="md-line"></span>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $admin['alamat_admin']; ?>">
                                                <?= form_error('alamat', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                <span class="md-line"></span>
                                            </div>
                                            <div class="form-group col-md-7">
                                                <input type="file" class="form-control" id="foto" name="foto" value="<?= $admin['foto']; ?>">
                                                <?= form_error('foto', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                <span class=" md-line"></span>
                                            </div>

                                        </div>
                                        <div class="form-row ">

                                            <div class="form-group col-md-10">
                                                <input class="btn btn-success" type="submit" name="update" value="Update" />

                                                <a class="btn btn-success" href="<?php echo site_url('admin') ?>" role="button">Kembali</a>

                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Foto</h5>
                                </div>
                                <center>
                                <div id="foto" style="width: auto; height: 518px;"><img src="<?= base_url() ?>application/upload/admin/<?= $admin['foto']; ?>" style="width: 400px; height:450px;"></div>
                            </center>
                            </div>
                        </div>
                        <!-- Single Open Accordion ends -->
                    </div>
                    <!-- Row end -->
                    <!-- Row start -->

                    <!-- Row end -->
                </div>
                <!-- Page-body end -->
            </div>
        </div>

    </div>
</div>