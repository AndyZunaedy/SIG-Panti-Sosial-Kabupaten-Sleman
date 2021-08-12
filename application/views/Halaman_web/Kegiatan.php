<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Kegiatan</span>
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
                        <form action="<?= base_url('dashboard/kegiatan/') ?>" method="POST">
                            <input type="text" name="keyword" id="keyword" placeholder="Search . . .  " autocomplete='off' autofocus>
                            <input name="search" type="submit" value='Cari'>
                        </form>
                    </div>
                    <!-- <div class="blog-catagory">
                        <h4>Categories</h4>
                        <ul>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Picnic</a></li>
                            <li><a href="#">Model</a></li>
                        </ul>
                    </div> -->
                    <div class="recent-post">
                        <h4>Lokasi Panti</h4>
                        <div class="recent-blog">
                            <?php foreach ($lokasi as $r) { ?>
                                <a href=" <?php echo site_url('dashboard/tampil_lokasi/' . $r['id_profil']) ?>" class="rb-item">
                                    <div class="rb-pic">
                                        <img src="<?= base_url() ?>application/upload/panti/profil/<?= $r['foto_p']; ?>" alt="">
                                    </div>
                                    <div class="rb-text">
                                        <h6><?= $r['nama_panti'] ?></h6>
                                        <span>
                                            <p><?= $r['alamat'] ?></p>
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
                    <?php if($this->input->post('search') && !$profil_keyword): ?>
                                    <tr>
                                        <td colspan='4'>
                                            <div class='alert alert-danger col-lg-12' role='alert'>
                                                Data Tidak Ditemukan
                                            </div>
                                        </td>
                                    </tr>
                                  <?php endif;?>
                    
                    <?php foreach ($profil_keyword as $r) { ?>
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                     <a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>" class="rb-item">
                                    <img src="<?= base_url() ?>application/upload/kegiatan/<?= $r['foto_kegiatan']; ?>" alt="" style="width: 250px; height: 300px;">
                                    </a>
                                </div>
                                <div class="bi-text" <?= $r['id_profil'] ?>>
                                    <a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>" class="rb-item">
                                        <h6><?= $r['nama_kegiatan'] ?></h6>
                                    </a>
                                    <p><?= substr($r['deskripsi_k'], 0, 50) . "..." ?></p>
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