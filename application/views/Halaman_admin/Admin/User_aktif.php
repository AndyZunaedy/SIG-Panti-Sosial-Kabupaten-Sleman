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
                                    <h4>User Aktif</h4>
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
 <div class="card">
                   

                    <form action="<?= base_url('admin/user_aktif/') ?>" method="POST">
                        <div class="pcoded-search col-lg-12 mb-2 mt-2">
                          <div class="row">
                                <span class="searchbar-toggle"> </span>
                       
                            <input class='col-lg-3 ml-2' type="text" name="keyword" id="keyword" placeholder="Search . . .  " autocomplete='off' autofocus>
                            

                        <input name="search" type="submit" value='Cari'>

                               
                            </div>
                        </div>
                    </form>
                           </div>
                <!-- Inverse table card end -->
                <!-- Hover table card start -->
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                               <?php if($this->input->post('search') && !$user_admin): ?>
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
                                        <th>Nama Admin</th>
                                        <th>Nomor Identitas</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($user_admin as $crud) :
                                        $id_galeri = $crud->id_admin;  ?>
                                        <tr>
                                            <td>
                                                <?= ++$start; ?>
                                            </td>

                                            <td>
                                                <?php echo $crud->name ?>
                                            </td>
                                            <td>
                                                <?php echo $crud->no_identitas ?>
                                            </td>
                                            <td>
                                                <?php echo $crud->email  ?>
                                            </td>

                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#modaltampil<?php echo $id_galeri; ?>" class="btn btn-small"><i class="ti-eye"></i>Detail</a>
                                                <a href=" <?php echo site_url('admin/update_admin/' . $crud->id_admin) ?>" class="btn btn-small"><i class="ti-unlock"></i>Non-aktifkan</a>



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
        $id_admin = $crud->id_admin;
        $nama = $crud->level_admin;
        $foto = $crud->foto;
    ?>
        <div class="modal fade" id="modaltampil<?php echo $id_admin; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <div> <img src="<?= base_url() ?>application/upload/admin/<?= $foto ?>" width="750px" height="500px"></div>
                        </center>
                        <br>
                        <center><?php echo $nama; ?> </center>
                        <hr>

                        <div class="row">
                            <div class="col-lg-10">
                                <dl class="row">
                                    <dt class="col-sm-6">Nama Admin</dt>
                                    <dd class="col-sm-6"><?= $crud->name ?></dd>
                                    <dt class="col-sm-6">No Identitas</dt>
                                    <dd class="col-sm-6"><?= $crud->no_identitas ?></dd>
                                    <dt class="col-sm-6">Email</dt>
                                    <dd class="col-sm-6"><?= $crud->email ?></dd>
                                    <dt class="col-sm-6">Alamat</dt>
                                    <dd class="col-sm-6"><?= $crud->alamat ?></dd>
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