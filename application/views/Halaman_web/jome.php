<!-- ======= Portfolio Section ======= -->

<section class="blog_area section-padding mt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <div class="table-responsive">
                        <div class="section-heading">
                            <h5>DAFTAR LOKASI</h5>
                        </div>
                        <div class="" id="mapid"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <aside class="single_sidebar_widget post_category_widget">
                    <div class="section-heading">
                        <h5>KEGIATAN PANTI</h5>
                    </div>

                    <ul>
                        <?php foreach ($lokasi as $r) { ?>
                            <h7 class="card-title" <?= $r['id_profil'] ?>><a href=" <?php echo site_url('dashboard/tampil_lokasi/' . $r['id_profil']) ?>"><?= $r['nama_panti'] ?></a></h7>

                            <p class="card-text"><?= $r['alamat'] ?></p>
                            <hr>
                        <?php } ?>

                    </ul>
                </aside>
            </div>
</section>




<section class="ftco-section">

    <div class="container">
        <div class="row d-flex">
            <?php foreach ($profil_keyword as $r) { ?>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry align-self-stretch">
                        <a class="block-20 rounded" style="background-image: url('<?= base_url() . 'application/upload/kegiatan/' . $r['foto_kegiatan'] ?>');">

                        </a>
                        <div class="text p-4">
                            <div class="meta mb-2">
                                <div><a href="#"><?= $r['tanggal'] ?></a></div>
                            </div>
                            <h3 class="heading"><a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>"><?= $r['nama_kegiatan'] ?></a></h3>
                            <p><?= substr($r['deskripsi'], 0, 150) . "..." ?></p>


                        </div>
                    </div>

                </div>
            <?php } ?>

        </div>
        <div class="row">
            <div class="col">
                <center>
                    <?= $pagination ?>
                </center>
            </div>
        </div>
    </div>
</section>










</section><!-- End Portfolio Section -->

<script type="text/javascript">
    var map = L.map('mapid').setView([-7.71556, 110.35556], 11);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);


    <?php foreach ($jenis_panti as $tampil) { ?>
        L.marker([<?= $tampil->latitude ?>, <?= $tampil->longitude ?>]).addTo(map)
            .bindPopup("<b>Nama Panti : <?= $tampil->nama_panti ?></b><br>" +
                "Alamat : <?= $tampil->alamat ?></br>" +
                "Jenis Panti : <?= $tampil->jenis_panti ?></br>");
    <?php } ?>
</script>