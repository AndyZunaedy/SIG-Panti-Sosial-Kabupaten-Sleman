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
                                    <h4>Komentar</h4>
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
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/komentar'); ?>">Komentar</a>
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
                   <form action="<?= base_url('admin/komentar/') ?>" method="POST">
                        <div class="pcoded-search col-lg-12 mb-2 mt-2">
                          <div class="row">
                                <span class="searchbar-toggle"> </span>
                       
                            <input class='col-lg-3 ml-2' type="text" name="keyword" id="keyword" placeholder="Search . . .  " autocomplete='off' autofocus>
                            <!-- <button type="submit" name="search"><i class="fa fa-search"></i></button> -->

                             <input name="search" type="submit" value='Cari'>

                               
                            </div>
                        </div>
                    </form>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>

                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Isi Komentar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data_penghuni as $crud) :
                                        $id_komen = $crud->id_komen;  ?>

                                        <tr>
                                            <td>
                                                <?= ++$start; ?>
                                            </td>

                                            <td>
                                                <?php echo $crud->nama_user ?>
                                            </td>
                                            <td>
                                                <?php echo $crud->email_user ?>
                                            </td>
                                            </td>
                                            <td style="width: 30%;">
                                                <?php echo $crud->isi_komentar  ?>
                                            </td>

                                            <td>
                                               <a href="#" data-toggle="modal" data-target="#modaltampil<?php echo $id_komen; ?>" class="btn btn-small"><i class="ti-eye"></i>Balas Komentar</a>

                                                <a href="<?php echo site_url('admin/hapus_komen/' . $crud->id_komen) ?>" class="btn btn-small text-danger" onclick="return confirm(' Yakin menghapus data ini?');"><i class="ti-trash"></i> Hapus</a>


                                            </td>
                                        </tr>
                                    <?php endforeach; ?>


                                </tbody>
                            </table>

                        </div>
                        <div class="row">
                            <div class="col ml-2  mb-2">
                                <?= $pagination ?>
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
        $id_komen = $crud->id_komen;
     


    ?>
        <div class="modal fade" id="modaltampil<?php echo $id_komen; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role=" document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-tittle" id="exampleModalLabel">Balas Komentar</h5>

                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form class="" method="POST" action="<?php echo site_url('Admin/balas_komentar') ?>">
                            <input type="hidden" name="id_komen" value="<?php echo $crud->id_komen ?>">
                            <input type="hidden" name="id_profil" value="<?php echo $crud->id_profil ?>">
                            <input type="hidden" name="id_admin" value="<?php echo $crud->id_admin ?>">


                            <div class="form-group">
                                <div class="row col-lg-12">
                                    <div class="col-lg-6">
                                        <input class="form-control mb-2" type="text" placeholder="Nama" name="nama" required value="<?= $crud->name ?>" readonly>
                                    </div>
                                    <div class="col-lg-6">
                                        <input class="form-control" type="email" placeholder="Email" name="email" required value="<?= $crud->email ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <textarea class="form-control" name="isi_komentar" style="width: 96%;" placeholder="Komentars" required></textarea>

                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-primary" type="submit">Kirim</button>
                            </div>

                        </form>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- akhir modal detail -->