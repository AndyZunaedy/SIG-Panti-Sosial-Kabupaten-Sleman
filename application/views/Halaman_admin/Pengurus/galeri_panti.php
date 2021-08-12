<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Galeri Panti</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('admin/index'); ?>">
                                            <i class="icofont icofont-home"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/galeri'); ?>">Galeri Panti</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Inverse table card end -->
                <!-- Hover table card start -->
                <div class="card">
                    <div class="card-header">
                        <span> <a href="<?= base_url('admin/formgaleri'); ?>"><i class="ti-plus"></i> Tambah Galeri</a></span>
                    </div>

                    <form action="<?= base_url('admin/galeri/') ?>" method="POST">
                        <div class="pcoded-search col-lg-12 mb-2">
                              <div class="row">
                            <span class="searchbar-toggle"> </span>
                            <!--<div class="pcoded-search-box col-lg-5">-->
                            <!--    <input name="keyword" type="text" placeholder="Search">-->
                            <!--    <span name="search" class="search-icon"><i class="ti-search" aria-hidden="true"></i></span>-->
                            <!--</div>-->
                            
                             <input class='col-lg-3 ml-2' type="text" name="keyword" id="keyword" placeholder="Search . . .  " autocomplete='off' autofocus>
                              <input name="search" type="submit" value='Cari'>
                            
                        </div>
                        </div>
                    </form>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                             <?php if($this->input->post('search') && !$data_galeri): ?>
                                    <tr>
                                        <td colspan='4'>
                                            <div class='alert alert-danger col-lg-3 ml-2' role='alert'>
                                                Data Tidak Ditemukan
                                            </div>
                                        </td>
                                    </tr>
                                  <?php endif;?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>

                                        <th>Nama Galeri</th>
                                        <th>Foto</th>
                                        <th>Keterangan</th>
                                         <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_galeri as $crud) :
                                        $id_galeri = $crud->id_galeri;  ?>
                                        <tr>
                                            <td>
                                                <?= ++$start; ?>
                                            </td>

                                            <td>
                                                <?php echo $crud->nama_galeri ?>
                                            </td>
                                            <td>
                                                <img src="<?= base_url() ?>application/upload/panti/<?= $crud->foto_galeri; ?>" width="100px" height="50px">
                                            </td>
                                            <td>
                                                <?php echo $crud->keterangan  ?>
                                            </td>
                                            <td>
                                                <?php echo $crud->aktifasi_galeri == 0 ? "Belum diverifikasi" : "Terverifikasi"  ?>
                                            </td>

                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#modaltampil<?php echo $id_galeri; ?>" class="btn btn-small"><i class="ti-eye"></i>Detail</a>
                                                <a href=" <?php echo site_url('admin/formedit_galeri/' . $crud->id_galeri) ?>" class="btn btn-small"><i class="ti-marker-alt"></i> Edit</a>
                                                <a href="<?php echo site_url('admin/hapus_galeri/' . $crud->id_galeri) ?>" class="btn btn-small text-danger" onclick="return confirm(' Yakin menghapus data ini?');"><i class="ti-trash"></i> Hapus</a>


                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col">
                                    <?= $pagination ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hover table card end -->

                <!-- Background Utilities table end -->
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    <!-- Main-body end -->

    <div id="styleSelector">

    </div>

    <?php foreach ($profil as $crud) :
        $id_galeri = $crud->id_galeri;
        $nama_panti = $crud->nama_panti;
        $foto = $crud->foto_galeri;
    ?>
        <div class="modal fade" id="modaltampil<?php echo $id_galeri; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role=" document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" id="exampleModalLabel">Tampil Data Profil Panti</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <div> <img src="<?= base_url() ?>application/upload/panti/<?= $foto ?>" width="750px" height="500px"></div>
                        </center>
                        <br>
                        <center><?php echo $nama_panti; ?> </center>
                        <hr>

                        <div class="row">
                            <div class="col-lg-10">
                                <dl class="row">
                                    <dt class="col-sm-6">Nama Galeri</dt>
                                    <dd class="col-sm-6"><?= $crud->nama_galeri ?></dd>
                                    <dt class="col-sm-6">Keterangan</dt>
                                    <dd class="col-sm-6"><?= substr($crud->keterangan, 0, 50) . "..." ?></dd>
                                </dl>

                            </div>

                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- akhir modal detail -->