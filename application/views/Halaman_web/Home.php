<!-- <div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <span>Contact</span>
                </div>
            </div>
        </div>
    </div>
</div> -->


<div class="map spad">
    <div class="container">
        <div class="map-inner">


            <div id="map-canvas" style="height: 500px;"></div>
        </div>
    </div>
</div>

<section class="man-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="filter-control">
                    <ul>
                        <li class="active">Lokasi Panti</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php foreach ($lokasi as $r) { ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?= base_url() ?>application/upload/panti/profil/<?= $r['foto_p']; ?>" alt="" width="150px" height="250px">
                               
                                <ul>
                                    <li class="quick-view"><a href="#">Tampilkan</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name" <?= $r['id_profil'] ?>></div>
                                <a href=" <?php echo site_url('dashboard/tampil_lokasi/' . $r['id_profil']) ?>">
                                    <h5><?= $r['nama_panti'] ?></h5>
                                </a>
                                <div class="product-price">

                                    <span>
                                        <p><?= $r['alamat'] ?></p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg m-large" data-setbg="assets/home/img/products/lokasii.jpg">
                    <h2>Lokasi Panti</h2>
                    <a href="<?= base_url('Dashboard/lokasi'); ?>">Lihat Lokasi</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Man Banner Section End -->



<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="assets/home/img/products/kegiatan.jpg">
                    <h2>Kegiatan Panti</h2>
                    <a href="<?= base_url('Dashboard/kegiatan'); ?>">Kegiatan Panti</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active">Kegiatan Panti</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel">
                    <?php foreach ($profil_keyword as $r) { ?>
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="<?= base_url() ?>application/upload/kegiatan/<?= $r['foto_kegiatan']; ?>" alt="" width="150px" height="250px">
                               
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="quick-view"><a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>">Tampilkan</a></li>
                                </ul>
                            </div>
                            <div class="pi-text">

                                <a href="<?= base_url('dashboard/tampil_kegiatan/') . $r['id_kegiatan'] ?>">
                                    <h5><?= $r['nama_kegiatan'] ?></h5>
                                </a>
                                <div class="product-price">

                                    <span><?= substr($r['deskripsi_k'], 0, 150) . "..." ?></span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>


            </div>
        </div>
    </div>
</section>
<!-- Women Banner Section End -->




<!-- <script type="text/javascript">
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
</script> -->

<!-- <script>
    function initialize() {
        
        var propertiPeta = {
            center: new google.maps.LatLng(-7.71556, 110.35556),
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);


    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script> -->


<script>
    var marker;
    default_zoom = 15;
    function initialize() {

        // Variabel untuk menyimpan informasi (desc)  

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
            zoom: default_zoom,
            center: new google.maps.LatLng(-7.71556, 110.35556),
            mapTypeId: google.maps.MapTypeId.ROADMAP

        }

        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
        $as = $this->db->query("SELECT * from profil_panti where aktifasi_profil='1'");
        foreach ($as->result() as $data) {
            $nama   = $data->id_profil;
            $nama_panti   = $data->nama_panti;
            $alamat   = $data->alamat;
            $lat    = $data->lat;
            $lon    = $data->lng;

        ?>

            var title = "<center><h5><b><?php echo $nama_panti ?></b></h5><h7><?php echo $alamat ?></h7><br><br><a class='btn btn-primary btn-sm' href='<?php echo site_url("dashboard/tampil_lokasi/" . $nama) ?>'>Detail</a></center>";
            var infoWindow = new google.maps.InfoWindow({
                content: title

            })
        <?php
            echo ("addMarker($lat,$lon);\n");
            // echo ("addMarker($lat, $lon, '<b>$nama</b>');\n");
        }

        ?>

        // Proses membuat marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);

            var marker = new google.maps.Marker({
                map: map,
                position: lokasi,
                animation: google.maps.Animation.DROP
            });
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow);
        }
        var activeInfoWindow;
        // Menampilkan informasi pada masing-masing marker yang dikli
        function bindInfoWindow(marker, map, infoWindow) {

            google.maps.event.addListener(marker, 'click', function() {

                infoWindow.setContent(infoWindow);
                infoWindow.open(map, marker);

            });
        }

    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>







<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCMSeqm36g9ARaIu7cSfnww_TpM8cZp99M&callback=initMap" async defer></script> -->