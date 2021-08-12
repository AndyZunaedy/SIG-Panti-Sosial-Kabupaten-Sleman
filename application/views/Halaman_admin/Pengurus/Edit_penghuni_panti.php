<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Edit Penghuni Panti</h4>
                                </div>
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('admin/index'); ?>">
                                            <i class="icofont icofont-home"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/penghuni'); ?>">Penghuni Panti</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/formedit_penghuni'); ?>">Form Edit Penghuni</a>
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
                        <!-- Multiple Open Accordion start -->
                        <div class="col-lg-7">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Form Edit Penghuni</h5>
                                </div>
                                <div class="card-body">

                                    <form method="POST" action="<?= base_url('admin/edit_penghuni/'); ?>" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-10">

                                                <label for="contoh1">Nama Panti</label>

                                                <input type="text" class="form-control " id="id_penghuni" name="id_penghuni" value="<?php echo $id_penghuni->id_penghuni; ?>" hidden>

                                                <select class='form-control ' required name='id_profil' id='id_profil'>
                                                    <?php
                                                     foreach ($nama_panti as $jenis) {
                                                        echo "<option value='$jenis->id_profil'>$jenis->nama_panti</option>";
                                                   
                                                    }
                                                    foreach ($tampil as $jenis) {
                                                        echo "<option value='$jenis->id_profil'>$jenis->nama_panti</option>";
                                                    }
                                                    ?>
                                                     <option value=''>Nama Panti</option>
                                                </select>
                                                  <?= form_error('id_profil', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Nama</label>
                                                <input type="text" class="form-control " id="nama" name="nama" placeholder="Nama" value="<?php echo $id_penghuni->nama_penghuni; ?>">
                                                <?= form_error('nama', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Umur</label>
                                                <input type="text" class="form-control " id="umur" name="umur" placeholder="Umur" value="<?php echo $id_penghuni->umur; ?>">
                                                <?= form_error('umur', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Jenis Kelamin</label>
                                                <select class='form-control ' required name="kelamin">
                                                    <?php
                                                    foreach ($jenis_k1 as $jenis) {
                                                        echo "<option value='$jenis->id_jk'>$jenis->jenis_kelamin</option>";
                                                    }
                                                    foreach ($jenis_k as $jk) {
                                                        echo "<option value='$jk->id_jk'>$jk->jenis_kelamin</option>";
                                                    }

                                                    ?>
                                                      <option value=''>Jenis Kelamin</option>
                                                </select>
                                                  <?= form_error('kelamin', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>



                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label>Foto</label>
                                                <div class="form-group">
                                                    <input type="file" class="form-control" id="foto" name="foto">
                                                     <?= form_error('foto', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label>Deskripsi</label>
                                                <textarea type="text" class="form-control " id="deskripsi" name="deskripsi" placeholder="Deskripsi"><?php echo $id_penghuni->deskripsi_p; ?></textarea>
                                                <?= form_error('deskripsi', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>

                                        </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-10 ml-4">
                                        <input class="btn btn-success" type="submit" name="simpan" value="Simpan" />
                                        <a class="btn btn-success" href="<?php echo site_url('admin/penghuni') ?>" role="button">Kembali</a>
                                    </div>
                                </div>

                                <?php foreach ($id_admin as $crud) : ?>
                                    <input type="text" class="form-control " id="id_admin" name="id_admin" value="<?php echo $crud->id_admin; ?>" hidden>
                                <?php endforeach; ?>
                                </form>

                            </div>
                        </div>

                        <!-- Multiple Open Accordion ends -->
                        <!-- Single Open Accordion start -->
                        <div class="col-lg-5">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Foto</h5>
                                </div>

                                <div class="mb-3" id="foto" style="width: auto; height: 450px;">
                                    <center><img src="<?= base_url() ?>application/upload/penghuni/<?= $id_penghuni->foto_penghuni; ?>" style="width: 400px; height:450px;"></center>
                                </div>




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