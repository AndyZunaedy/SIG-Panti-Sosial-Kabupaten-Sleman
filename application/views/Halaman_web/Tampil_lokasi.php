<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('Dashboard/lokasi'); ?>"><i></i> Lokasi</a>
                    <span>Tampil Lokasi</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php foreach ($id_profil as $r) { ?>
                    <div class="blog-details-inner">
                        <input type=" text" class="form-control " id="id_profil" name="id_profil" value="<?= $r->id_profil ?>" hidden>
                        <div class="blog-detail-title">
                            <h2><?= $r->nama_panti ?></h2>
                            <p><span> Ketua Yayasan : </span>
                            <p> <?php echo $r->name; ?></p>

                            </p>
                        </div>
                    <?php } ?>
                    <div class="blog-large-pic">
                        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php $i = 0;
                                foreach ($id_foto as $r) : ?>
                                    <?php if ($i == 0) {
                                        $set_ = 'active';
                                    } else {
                                        $set_ = '';
                                    } ?>
                                    <div class="carousel-item <?php echo $set_; ?>">
                                        <img src="<?= base_url() ?>application/upload/panti/<?= $r->foto_galeri; ?>" width="500px" height="630px">
                                    </div>
                                <?php $i++;
                                endforeach ?>
                            </div>
                            <a class=' carousel-control-prev' href="#carouselExampleControls" role='button' data-slide='prev'>
                                <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Previous</span>
                            </a>
                            <a class='carousel-control-next' href="#carouselExampleControls" role='button' data-slide='next'>
                                <span class='carousel-control-next-icon' aria-hidden='true'></span>
                                <span class='sr-only'>Next</span>
                            </a>
                        </div>
                    </div>

                    <hr>


                    <?php foreach ($id_profil as $r) { ?>
                        <p><?php echo $r->deskripsi; ?></p>
                        <div class="blog-more">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h5>Nomor Izin Panti</h5>
                                    <p><?php echo $r->nomor_izin; ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Alamat</h5>
                                    <p><?php echo $r->alamat; ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Email</h5>
                                    <p><?php echo $r->email; ?></p>
                                </div>
                                <div class="col-sm-4">
                                    <h5>Nomor Telpon</h5>
                                    <p><?php echo $r->telpon; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <hr>
                <!-- peta -->
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                                <a href="<?= base_url('Dashboard/lokasi'); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left"></span> Lihat semua tempat</a>
                                <a href="javascript:void(0)" onclick="showRoute()" class="btn btn-primary m-2"><span class="fa fa-map-o"> </span> Tampilkan Rute </a>
                                <?php
                                foreach ($id_profil as $r) :
                                ?>
                                    <a href=" <?php echo site_url('dashboard/detail_lokasi/' . $r->id_profil) ?>"><span class="glyphicon glyphicon-list"></span> Rute Detail</a>
                                <?php endforeach; ?>
                            </p>
                        </div>
                    </div>
                    <div id="map-canvas" style="height: 500px;"></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <center>
                        <div class="blog-detail-title">
                            <h2>Penghuni Panti</h2>
                        </div>
                    </center>
                    <div class="col-md-12">
                        <p>
                            <?php
                            foreach ($id_profil as $r) :
                            ?>
                                <a href="<?= base_url('dashboard/print_semua/' .  $r->id_profil); ?>" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-chevron-left"></span><i class="fas fa-print"></i> Cetak Semua Data</a>
                            <?php endforeach; ?>
                        </p>
                    </div>
                    <hr>
                    <div class="container">
                        <div class="row d-flex">
                            <?php foreach ($id_penghuni as $r) { ?>
                                <div class="col-md-6 col-lg-3 ftco-animate">
                                    <div class="staff">
                                        <div class="blog-entry align-self-stretch">
                                            <img src="<?= base_url() ?>application/upload/penghuni/<?= $r->foto_penghuni; ?>" width="350px" height="250px">
                                            <div class="text pt-3 px-3 pb-4 text-center">
                                                <a href="#" data-toggle="modal" data-target="#modaltampil<?php echo $r->id_penghuni; ?>" class="btn btn-small">
                                                    <h5><?php echo $r->nama_penghuni; ?></h5>
                                                </a>
                                                <div class="faded">
                                                    <p><?php echo $r->deskripsi_p; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <?= $pagination ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- komentar -->
        <section class="blog-details spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-details-inner">
                            <div class="leave-comment">
                                <h4>Kolom Komentar</h4>
                                <form action="<?php echo base_url('dashboard/kirim_komentar') ?>" class="comment-form" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" name="nama" placeholder="Name">
                                            <input type="text" name="id_profil" placeholder="Name" value="<?= $r->id_profil ?>" hidden>
                                            <input type="text" name="id_admin" placeholder="Name" value="<?= $r->id_admin ?>" hidden>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" name="email" placeholder="Email">
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="isi_komentar" placeholder="Messages"></textarea>
                                            <button type="submit" class="site-btn">Kirim Komentar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>

                            <?php
                            foreach ($tampil_komentar as $utama) :
                            ?>
                                <div class="posted-by">
                                    <div class="pb-text">
                                        <a href="#">
                                            <h5><?php echo $utama->nama_user ?></h5>
                                        </a>
                                        <p><?php echo $utama->isi_komentar ?></p>
                                        <br><button data-toggle="modal" data-target="#modal_komen<?php echo $utama->id_komen; ?>" class="site-btn">Balas</button>
                                    </div>
                                </div>
                                <?php
                                $komen_id = $utama->id_komen;
                                $nama = $utama->nama_user;
                                $id_profil = $utama->id_profil;
                                $query = $this->db->query("SELECT * FROM komentar_kirim WHERE komen_status= '$komen_id' and id_profil = '$id_profil'");
                                foreach ($query->result() as $balasan) :
                                ?>
                                    <br>
                                    <div class="posted-by ml-5">
                                        <div class="pb-text">
                                            <a href="#">
                                                <h5>Balasan komentar dari <?php echo $balasan->nama_user ?></h5>
                                            </a>
                                            <p><?php echo $balasan->isi_komentar ?></p>
                                            <br><button data-toggle="modal" data-target="#modal_komen<?php echo $komen_id; ?>" class="site-btn">Balas</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- batas akhir komentar -->
</section>
<?php foreach ($profil as $crud) :
    $id_penghuni = $crud->id_penghuni;
    $nama_panti = $crud->nama_panti;
    $foto = $crud->foto_penghuni;
    $id_profil = $crud->id_profil;

?>


    <div class="modal fade" id="modaltampil<?php echo $id_penghuni; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <a class="btn btn-primary" href="<?= base_url('dashboard/print/' . $id_penghuni); ?>"><i class="fas fa-print"></i> Print</a>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- akhir modal detail -->
<!-- modal komen -->
<?php foreach ($tampil_komentar as $tp) :


?>
    <div class="modal fade" id="modal_komen<?= $tp->id_komen; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role=" document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-tittle" id="exampleModalLabel">Balas Komentar</h5>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="" method="POST" action="<?php echo site_url('dashboard/balas_komentar') ?>">
                        <input type="hidden" name="id_komen" value="<?php echo $tp->id_komen ?>">
                        <input type="hidden" name="id_profil" value="<?php echo $tp->id_profil ?>">
                        <input type="hidden" name="id_admin" value="<?php echo $tp->id_admin ?>">

                        <div class="form-group">
                            <div class="row col-lg-12">
                                <div class="col-lg-6">
                                    <input class="form-control mb-2" type="text" placeholder="Nama" name="nama" required>
                                </div>
                                <div class="col-lg-6">
                                    <input class="form-control" type="email" placeholder="Email" name="email" required>
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
            </div>


        </div>
    </div>
<?php endforeach; ?>


<!-- akhir modal komen -->


<!-- akhir kode modal dialog -->
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script>
    var a = 2;
    <?php
    $id = $this->uri->segment(3);
    $as = $this->db->query("SELECT * from profil_panti where id_profil = '$id' ");
    foreach ($as->result() as $data) {
        $nama   = $data->nama_panti;
        $alamat   = $data->alamat;
        $lat    = $data->lat;
        $lon    = $data->lng;
    }
    ?>
    var origin_pos = {
        lat: 0,
        lng: 0
    };
    var dst_pos = {
        lat: <?= $lat  ?>,
        lng: <?= $lon ?>
    };
    // 600 d5919d3d68


    var errorRoute = false;
    var map;
    var dragged = false;
    var directionsDisplay;
    var routeDisplayed = 0;

    default_zoom = 10;

    function initialize() {



        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
            zoom: default_zoom,
            center: dst_pos,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);


        // Variabel untuk menyimpan batas kordinat
        var bounds = new google.maps.LatLngBounds();

        // Pengambilan data dari database
        <?php
        $id = $this->uri->segment(3);
        $as = $this->db->query("SELECT * from profil_panti where id_profil = '$id' ");

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

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }
        map_detail = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: default_zoom,
            center: dst_pos
        });

        directionsDisplay = new google.maps.DirectionsRenderer({
            map: map_detail
        });

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                origin_pos = pos;
                infoWindow.setPosition(pos);
                infoWindow.setContent('Lokasi anda');
                infoWindow.open(map_detail);
                map.setCenter(pos);


            }, function() {
                handleLocationError(true, infoWindow, map.getCenter());
            });
        } else {
            handleLocationError(false, infoWindow, map.getCenter());
        }

    }
    //batas
    function showRoute() {


        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;

        directionsDisplay.setMap(map_detail);

        calculateAndDisplayRoute(directionsService, directionsDisplay);
        console.log('Route displayed ' + ++routeDisplayed);

    }


    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map_canvas);
    }

    //menampilkan rute lokasi




    function calculateAndDisplayRoute(directionsService, directionsDisplay) {


        directionsService.route({
                origin: origin_pos,
                destination: dst_pos,
                travelMode: 'DRIVING',
            },
            (response, status) => {
                if (status === "OK") {
                    directionsDisplay.setDirections(response);

                } else {

                    window.alert("Directions request failed due to " + status);
                }
            }
        );
    }


    google.maps.event.addDomListener(window, 'load', initialize);
</script>