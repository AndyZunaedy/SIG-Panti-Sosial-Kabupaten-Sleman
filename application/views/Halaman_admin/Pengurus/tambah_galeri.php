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
                                    <h4> Galeri Panti</h4>
                                </div>
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/galeri'); ?>">Galeri Panti</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/formgaleri'); ?>">Form Tambah Galeri</a>
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
                                    <h5 class="card-header-text">Form Tambah Galeri</h5>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="<?= base_url('admin/tambah_galeri'); ?>" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-8">
                                                <label for="contoh1">Nama Panti</label>
                                                <select class='form-control '  name='id_profil' id='id_profil'>
                                                    <option value=''>Nama Panti</option>
                                                    <?php
                                                    foreach ($penghuni as $jenis) {
                                                        echo "<option value='$jenis->id_profil'>$jenis->nama_panti</option>";
                                                    }
                                                    ?>
                                                </select>
                                                 <?= form_error('id_profil', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Nama Galeri</label>
                                                <input type="text" class="form-control " id="nama_galeri" name="nama_galeri" placeholder="Nama Galeri" >
                                                <?= form_error('nama_galeri', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label>Foto</label>
                                                <div class="form-group">
                                                    <input type="file" class="form-control" id="foto" name="foto" >
                                                    <?= form_error('foto', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label>Keterangan</label>
                                                <textarea type="text" class="form-control " id="keterangan" name="keterangan" rows="5"  placeholder="Keterangan"></textarea>
                                                <?= form_error('keterangan', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>

                                        </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-10 ml-4">
                                        <input class="btn btn-success" type="submit" name="simpan" value="Simpan" />
                                        <a class="btn btn-success" href="<?php echo site_url('admin/galeri') ?>" role="button">Kembali</a>

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