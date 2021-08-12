<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('Dashboard/kegiatan'); ?>"><i></i> Kegiatan</a>
                    <span>Tampil Kegiatan</span>
                </div>
            </div>
        </div>
    </div>
</div>





<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($id_kegiatan as $r) { ?>
                    <div class="blog-details-inner">
                        <input type=" text" class="form-control " id="id_profil" name="id_profil" value="<?= $r->id_profil ?>" hidden>
                        <div class="blog-detail-title">
                            <span style="line-height: 1.6;">
                                <h2><?= $r->nama_kegiatan ?></h2>
                                <h5><?= $r->nama_panti ?></h5>
                                <p><span> Tanggal : </span>
                                <p> <?php echo  $r->tanggal; ?></p>
                                </p>
                            </span>
                        </div>
                    <?php } ?>
                    <div class=" blog-large-pic">
                        <img src="<?= base_url() ?>application/upload/kegiatan/<?= $r->foto_kegiatan; ?>">
                    </div>
                    <a class=' carousel-control-prev' href="#carouselExampleControls" role='button' data-slide='prev'>
                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Previous</span>
                    </a>
                    <a class='carousel-control-next' href="#carouselExampleControls" role='button' data-slide='next'>
                        <span class='carousel-control-next-icon' aria-hidden='true'></span>
                        <span class='sr-only'>Next</span>
                    </a>
                    <hr>
                    <?php foreach ($id_kegiatan as $r) { ?>
                        <p><?= $r->deskripsi_k  ?></p>
                    </div>
            </div>
        <?php } ?>
        </div>
    </div>
    </div>

</section>

<!-- <div class="col-lg-4">
   

<div class="section-heading ml-4">
    <h5>KEGIATAN TERBARU PANTI</h5>
</div>
<?php foreach ($id_kegiatan1 as $r) { ?>
    <aside class="single_sidebar_widget post_category_widget">
        <ul>
            <img src="<?= base_url() ?>application/upload/kegiatan/<?= $r['foto_kegiatan'] ?>" width="300px" height="250px">
            <h7 class="card-title" <?= $r['id_kegiatan'] ?>><a href=" <?php echo site_url('dashboard/tampil_kegiatan/' . $r['id_kegiatan']) ?>"><?= $r['nama_kegiatan'] ?></a></h7>
            <p><?= substr($r['deskripsi'], 0, 150) . "..." ?></p>
            <hr>
        </ul>
    <?php } ?>
    </aside>

    </div> -->