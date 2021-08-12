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
                                    <h4>Dashboard</h4>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="icofont icofont-home"> Dashboard</i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h4>Peta Kabupaten Sleman</h4>
                                    <div class="card-header-right"><i class="icofont icofont-spinner-alt-5"></i></div>

                                    <div class="card-header-right">
                                        <i class="icofont icofont-spinner-alt-5"></i>
                                    </div>

                                </div>
                                <div class="card-block">
                                    <div class="" id="map-canvas" style="width: auto; height:550px;"></div>
                                </div>
                            </div>
                            <!-- Basic Form Inputs card end -->
                            <!-- Input Grid card start -->

                        </div>
                    </div>
                    <!-- Page body end -->
                </div>
            </div>
            <!-- Main-body end -->

        </div>

        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row">
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">

                                            <span class="text-c-blue f-w-600"> Data Orang Penghuni Panti</span>
                                            <h4> <?php
                                                    // foreach ($a as $data) {
                                                    echo $jumlah_penghuni;

                                                    // 
                                                    ?> Orang</h4>
                                            <div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->
                                <div class="col-md-9 col-xl-4">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">

                                            <span class="text-c-pink f-w-600"> Jumlah Pengurus Panti</span>
                                            <h4> <?php
                                                    echo $admin;
                                                    ?>
                                                Pengurus </h4>
                                            <div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->
                                <div class="col-md-9 col-xl-4">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <span class="text-c-green f-w-600">Jumlah Panti</span>
                                            <h4><?php
                                                echo $panti;
                                                ?>
                                                Panti </h4>
                                            <div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->

                                <!-- card1 end -->
                                <!-- Statestics Start -->
                                <!-- Data widget End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script>
        var marker;

        function initialize() {

            // Variabel untuk menyimpan informasi (desc)  

            //  Variabel untuk menyimpan peta Roadmap
            var mapOptions = {
                center: new google.maps.LatLng(-7.71556, 110.35556),
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP

            }

            // Pembuatan petanya
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            // Variabel untuk menyimpan batas kordinat
            var bounds = new google.maps.LatLngBounds();

            // Pengambilan data dari database
            <?php
            $as = $this->db->query("SELECT * from profil_panti");
            foreach ($as->result() as $data) {
                $nama   = $data->id_profil;
                $nama_panti   = $data->nama_panti;
                $alamat   = $data->alamat;
                $lat    = $data->lat;
                $lon    = $data->lng;

            ?>

                var title = "<center><h5><b><?php echo $nama_panti ?></b></h5><h7><?php echo $alamat ?></h7><br><br></center>";
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