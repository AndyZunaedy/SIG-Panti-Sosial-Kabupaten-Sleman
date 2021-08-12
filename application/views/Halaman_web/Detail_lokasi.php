<style>
    #right-panel {
        font-family: 'Roboto', 'sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }

    #right-panel select,
    #right-panel input {
        font-size: 15px;
    }

    #right-panel select {
        width: 100%;
    }

    #right-panel i {
        font-size: 12px;
    }

    #right-panel {
        /* float: right; */
        /* width: 34%; */
        height: 500px;
        overflow: auto;
    }

    .panel {
        height: 550px;
        overflow: auto;
    }
</style>

<script>
    <?php
    $id = $this->uri->segment(3);
    $as = $this->db->query("SELECT * from profil_panti where id_profil = '$id' ");
    foreach ($as->result() as $data) {
        $nama   = $data->id_profil;
        $nama_panti   = $data->nama_panti;
        $alamat   = $data->alamat;
        $lat    = $data->lat;
        $lon    = $data->lng;
    }
    ?>
    var markerArray = [];

    var origin_pos = {
        lat: 0,
        lng: 0
    };
    var dst_pos = {
        lat: <?= $lat  ?>,
        lng: <?= $lon ?>
    };

    var errorRoute = false;
    var map;
    var dragged = false;
    var directionsDisplay;
    var routeDisplayed = 0;

    default_zoom = 4;

    function initialize() {
        var a = 2;
        // Variabel untuk menyimpan informasi (desc)
        var infoWindow = new google.maps.InfoWindow;

        //  Variabel untuk menyimpan peta Roadmap
        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }

        // Pembuatan petanya
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: default_zoom,
            center: dst_pos
        });

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
            draggable: true,
            map: map,
            panel: document.getElementById('right-panel')
        });
        var stepDisplay = new google.maps.InfoWindow;

        directionsDisplay.addListener('directions_changed', function() {
            //calculateAndDisplayRoute()
            computeTotalDistance(directionsDisplay.getDirections());
            for (var i = 0; i < markerArray.length; i++) {
                markerArray[i].setMap(null);
            }
            showSteps(directionsDisplay.getDirections(), markerArray, stepDisplay, map);

        });

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                //infoWindow.setPosition(pos);
                //infoWindow.setContent('Location found.');
                //infoWindow.open(map);
                //map.setCenter(pos);
                calculateAndDisplayRoute(pos, {
                    lat: <?= $lat ?>,
                    lng: <?= $lon ?>
                }, directionsService, directionsDisplay, stepDisplay, map);
            }, function() {
                calculateAndDisplayRoute(getCurLocation(), {
                    lat: <?= $lat ?>,
                    lng: <?= $lon ?>
                }, directionsService, directionsDisplay, stepDisplay, map);
            });
        } else {
            // Browser doesn't support Geolocation
            calculateAndDisplayRoute(getCurLocation(), {
                lat: <?= $lat ?>,
                lng: <?= $lon ?>
            }, directionsService, directionsDisplay, stepDisplay, map);
        }


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
                // zoom: 15,
                position: lokasi,
                icon: image
            });

            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
        }

        // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
            google.maps.event.addListener(marker, 'click', function() {
                infoWindow.setContent(html);
                infoWindow.open(map, marker);
            });
        }



    }

    function calculateAndDisplayRoute(origin, destination, directionsService, directionsDisplay, stepDisplay, map) {

        for (var i = 0; i < markerArray.length; i++) {
            markerArray[i].setMap(null);
        }

        directionsService.route({
            origin: origin,
            destination: destination,
            //waypoints: [{location: 'Adelaide, SA'}, {location: 'Broken Hill, NSW'}],
            travelMode: 'DRIVING',
            avoidTolls: true
        }, function(response, status) {
            if (status === 'OK') {
                //console.log(response);
                directionsDisplay.setDirections(response);
                showSteps(response, markerArray, stepDisplay, map);
            } else {
                alert('Could not display directions due to: ' + status);
            }
        });
    }

    function showSteps(directionResult, markerArray, stepDisplay, map) {
        // For each step, place a marker, and add the text to the marker's infowindow.
        // Also attach the marker to an array so we can keep track of it and remove it
        // when calculating new routes.
        var myRoute = directionResult.routes[0].legs[0];

        //console.log(directionResult.routes[0].legs[0]);

        for (var i = 0; i < myRoute.steps.length; i++) {
            var marker = markerArray[i] = markerArray[i] || new google.maps.Marker();
            //marker.setMap(map);
            //marker.setPosition(myRoute.steps[i].start_location);
            //marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png');
            attachInstructionText(
                stepDisplay, marker, myRoute.steps[i].instructions, map);
        }
    }

    function attachInstructionText(stepDisplay, marker, text, map) {
        google.maps.event.addListener(marker, 'click', function() {
            // Open an info window when the marker is clicked on, containing the text
            // of the step.
            stepDisplay.setContent(text);
            stepDisplay.open(map, marker);
        });
    }

    function computeTotalDistance(result) {
        var total = 0;
        var myroute = result.routes[0];
        var terdekat = 0;

        terdekat = myroute.legs[0].steps[0].distance.value;

        //console.log(result);
        for (var i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
        }
        total = total / 1000;
        document.getElementById('total').innerHTML = total + ' km';
        document.getElementById('terdekat').innerHTML = (terdekat / 1000) + ' km'; // + terdekat + ' m';
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="<?= base_url('Dashboard'); ?>"><i class="fa fa-home"></i> Home</a>
                    <a href="<?= base_url('Dashboard/lokasi'); ?>"><i></i> Lokasi</a>
                    <?php
                      $id = $this->uri->segment(3);
                      ?>
                    <a href="<?= base_url('Dashboard/tampil_lokasi/'. $id); ?>"><i></i> Tampil Lokasi</a>
                    
                    <span>Detail Lokasi</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="post-details-area">
    <div class="page-header pl-4 m-2">
        <h4>Rute Detail ke <?= $nama_panti ?></h4>
    </div>
    <div class="row m-2">

        <div class="col-xl-6 col-sm-4">
            <div class="bg-white mb-30 box-shadow">

                <div id="map" style="width: auto; height: 500px;">

                </div>
                <center>
                    <span class="help-block">Geser marker atau garis untuk mengubah rute.</span>
                </center>
            </div>

        </div>
        <div class="col-xl-4 col-sm-4">

            <div class="bg-white mb-30 box-shadow clearfix" style="background: white;">
                <div id="right-panel">
                    <p>Total Jarak: <span id="total"></span><br />
                        Node Terdekat: <span id="terdekat"></span></p>
                </div>
            </div>


        </div>


</section>