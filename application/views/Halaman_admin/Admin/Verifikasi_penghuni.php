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
                                    <h4>Verifikasi Data Penghuni Panti</h4>
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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/penghuni'); ?>">Penghuni Panti</a>
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
                   
                    <form action="<?= base_url('Admin/verifikasi_penghuni/') ?>" method="POST">
                        <div class="pcoded-search col-lg-12 mb-2 mt-2">
                            <div class="row">
                                <span class="searchbar-toggle"> </span>
                                 <input class='col-lg-3 ml-2' type="text" name="keyword" id="keyword" placeholder="Search . . .  " autocomplete='off' autofocus>
                             <input name="search" type="submit" value='Cari'>
                               
                            </div>
                        </div>
                    </form>
                     </div>
                    <div class="card">
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <?php if($this->input->post('search') && !$data_penghuni): ?>
                                    <tr>
                                        <td colspan='4'>
                                            <div class='alert alert-danger col-lg-3 ml-2 mt-3' role='alert'>
                                                Data Tidak Ditemukan
                                            </div>
                                        </td>
                                    </tr>
                                  <?php endif;?>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama</th>
                                        <th>Foto</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_penghuni as $crud) :
                                        $id_penghuni = $crud->id_penghuni;  ?>

                                        <tr>
                                            <td>
                                                <?= ++$start; ?>
                                            </td>
                                            <td>

                                                <?php echo $crud->nama_penghuni ?>
                                            </td>
                                            <td>
                                                <img src="<?= base_url() ?>application/upload/penghuni/<?= $crud->foto_penghuni; ?>" width="100px" height="50px">
                                            </td>
                                            </td>
                                            <td>
                                                <?php echo $crud->deskripsi_p ?>
                                            </td>
                                            <td width="250">
                                                <a href="<?= base_url('admin/print/' .  $id_penghuni); ?>" class="btn btn-small"><i class=" ti-printer"></i> Cetak</a>
                                                <a href="#" data-toggle="modal" data-target="#modaltampil<?php echo $id_penghuni; ?>" class="btn btn-small"><i class="ti-eye"></i>Detail</a>

                                                <a href="<?php echo site_url('admin/update_penghuni_aktif/' . $crud->id_penghuni) ?>" class="btn btn-small"><i class="ti-marker-alt"></i>Verifikasi</a>


                                                <a href="<?php echo site_url('admin/hapus_penghuni_verifikasi/' . $crud->id_penghuni) ?>" class="btn btn-small text-danger" onclick="return confirm('Yakin menghapus data ini?');"><i class="ti-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col ml-2">
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
        $id_penghuni = $crud->id_penghuni;
        $nama_panti = $crud->nama_panti;
        $foto = $crud->foto_penghuni;


    ?>
        <div class="modal fade" id="modaltampil<?php echo $id_penghuni; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role=" document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" id="exampleModalLabel">Tampil Data Profil Panti</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <div> <img src="<?= base_url() ?>application/upload/penghuni/<?= $foto ?>" width="750px" height="500px"></div>
                        </center>
                        <br>
                        <center><?php echo $nama_panti; ?> </center>
                        <hr>

                        <div class="row">
                            <div class="col-lg-10">
                                <dl class="row">
                                    <dt class="col-sm-6">Nama</dt>
                                    <dd class="col-sm-6"><?= $crud->nama_penghuni ?></dd>
                                    <dt class="col-sm-6">Deskripsi</dt>
                                    <dd class="col-sm-6"><?= substr($crud->deskripsi_p, 0, 50) . "..." ?></dd>
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