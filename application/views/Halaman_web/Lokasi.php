<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Lokasi</span>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                <div class="blog-sidebar">
                    <div class="search-form">
                        <h4>Search</h4>
                        <form action="<?= base_url('dashboard/lokasi/') ?>" method="POST">
                            <input type="text" name="keyword" id="keyword" placeholder="Search . . .  " autocomplete='off' autofocus>
                            <!-- <button type="submit" name="search"><i class="fa fa-search"></i></button> -->

                            <input name="search" type="submit" value='Cari'>

                        </form>
                    </div>
                    <!-- <div class="blog-catagory">
                        <h4>Categories</h4>
                        <ul>
                            <?php foreach ($jenis_panti as $r) { ?>
                                <li><a href="#"><?= $r['jenis_panti'] ?></a></li>

                            <?php } ?>
                        </ul>
                    </div> -->
                    <div class="recent-post">
                        <h4>Kegiatan Panti</h4>
                        <div class="recent-blog">
                            <?php foreach ($profile_keyword as $r) { ?>
                                <a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="<?= base_url() ?>application/upload/kegiatan/<?= $r['foto_kegiatan']; ?>" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6><?= $r['nama_kegiatan'] ?></h6>
                                        <span>
                                            <p><?= substr($r['deskripsi_k'], 0, 50) . "..." ?></p>
                                        </span>
                                    </div>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-2">




                <div class="row">
                  <?php if($this->input->post('search') && !$data): ?>
                                    <tr>
                                        <td colspan='4'>
                                            <div class='alert alert-danger col-lg-12' role='alert'>
                                                Data Tidak Ditemukan
                                            </div>
                                        </td>
                                    </tr>
                                  <?php endif;?>
                    <?php
                    foreach ($data as $r) {
                    ?>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                  
                                <div class="bi-pic">
                                      <a href=" <?php echo site_url('dashboard/tampil_lokasi/' . $r['id_profil']) ?>">
                                    <img src="<?= base_url() ?>application/upload/panti/profil/<?= $r['foto_p']; ?>" alt="" style="width: 250px; height: 300px;">
                                     </a>
                                </div>
                                <div class="bi-text" <?= $r['id_profil'] ?>>
                                    <a href=" <?php echo site_url('dashboard/tampil_lokasi/' . $r['id_profil']) ?>">

                                        <h5><?= $r['nama_panti'] ?></h5>
                                       
                                    </a>
                                    <p><?= $r['alamat'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <div class="row">
                    <div class="col">
                        <?= $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- <div class="card-block table-border-style ml-5 mr-5 ">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Panti</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data_lokasi as $crud) :
                ?>
                    <tr>
                        <td>
                            <?= ++$start; ?>
                        </td>
                        <td>
                            <?php echo $crud['nama_panti'] ?>
                        </td>
                        <td>
                            <?php echo $crud['alamat'] ?>
                        </td>

                        <td>
                            <a href="<?php echo site_url('dashboard/tampil_lokasi/' . $crud['id_profil']) ?>" class="btn btn-small"><i class=" fa-map-marked">Rute</i></a>
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

<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12 ">
                <div class="filter-control">
                    <ul>
                        <li class="active">Kegiatan Panti</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php foreach ($profile_keyword as $r) { ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?= base_url() ?>application/upload/kegiatan/<?= $r['foto_kegiatan']; ?>" alt="">
                                <div class="sale"><?= $r['tanggal'] ?></div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="quick-view"><a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>">Tampilkan</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name">Coat</div>
                                <a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>">
                                    <h5><?= $r['nama_kegiatan'] ?></h5>
                                </a>
                                <div class="product-price">

                                    <span><?= substr($r['deskripsi'], 0, 150) . "..." ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section> -->