<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page-header start -->
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-6">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Tambah Profil Panti</h4>
                                </div>
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('admin/index'); ?>">
                                            <i class="icofont icofont-home"></i>Dashboard
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/profil_panti'); ?>">Profil Panti</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('admin/form_tambah_panti'); ?>">Form Tambah Panti</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Page-header end -->

                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Row start -->
                    <div class="row">
                        <!-- Multiple Open Accordion start -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Peta Kabupaten Sleman</h5>
                                </div>
                                <div class="card">
                                    <div id='map' style='width: auto; height: 550px;'></div>
                                </div>
                            </div>
                        </div>
                        <!-- Multiple Open Accordion ends -->
                        <!-- Single Open Accordion start -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Form Input Profil Panti</h5>
                                </div>
                                <div class="card-body">


                                    <form method="POST" action="<?= base_url('admin/tambah_profil'); ?>" enctype="multipart/form-data">


                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Nama Panti</label>
                                                <input type="text" class="form-control " id="nama_panti" name="nama_panti" placeholder="Nama Panti">
                                                <?= form_error('nama_panti', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Nomor Izin</label>
                                                <input type="text" class="form-control " id="nomor_izin" name="nomor_izin" placeholder="Nomor Izin Panti">
                                                <?= form_error('nomor_izin', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>

                                            <?php foreach ($id_admin as $crud) : ?>
                                                <input type="text" class="form-control " id="id_admin" name="id_admin" value="<?php echo $crud->id_admin; ?>" hidden>
                                            <?php endforeach; ?>

                                        </div>


                                        <!-- row CBB -->
                                        <div class="form-row">
                                            <!--cbb jenis panti  -->
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Jenis Panti</label>
                                                <select class='form-control '  name='id_jenis_panti' id='id_jenis_panti'>
                                                    <option value=''>Jenis Panti</option>
                                                    <?php
                                                    foreach ($jenis_panti->result() as $jenis) {
                                                        echo "<option value='$jenis->id_jenis_panti'>$jenis->jenis_panti</option>";
                                                    }
                                                    ?>
                                                </select>
                                                  <?= form_error('id_jenis_panti', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                            <!-- cbb kecamatan -->
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Kecamatan</label>
                                                <select class='form-control '  name='id_kecamatan' id='id_kecamatan'>
                                                    <option value=''>Pilih Kecamatan</option>
                                                    <?php
                                                    foreach ($provinsi as $prov) {
                                                        echo "<option value='$prov[id_kecamatan]'>$prov[nama_kecamatan]</option>";
                                                    }
                                                    ?>
                                                </select>
                                                  <?= form_error('id_kecamatan', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                            <!-- cbb kecamatan -->
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Desa</label>
                                                <select class='form-control'  name='id_desa' id='id_desa'>
                                                    <option value=''>Pilih Desa</option>
                                                </select>
                                                 <?= form_error('id_desa', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>

                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Latitude</label>
                                                <input onchange="ubahLat()" text" class="form-control " id="Latitude" name="latitude" placeholder="-7.71556 " >
                                                <?= form_error('latitude', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Longitude</label>
                                                <input onchange="ubahLat()" type="text" class="form-control " id="Longitude" name="longitude" placeholder="110.35556" >
                                                <?= form_error('longitude', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Nomor Telpon</label>
                                                <input type="text" class="form-control " id="telpon" name="telpon" placeholder="081296364848" >
                                                <?= form_error('telpon', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label for="contoh1">Email</label>
                                                <input type="text" class="form-control " id="email" name="email" placeholder="user@gmail.com">
                                                <?= form_error('email', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-10">
                                                <label>Foto</label>
                                                <div class="form-group">
                                                    <input type="file" class="form-control" id="foto" name="foto">
                                                     <?= form_error('foto', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row ">
                                            <div class="form-group col-md-10 ">
                                                <label for="contoh1">Alamat</label>
                                                <textarea type="text" class="form-control " id="alamat" name="alamat" rows="5" placeholder="Alamat"></textarea>
                                                <?= form_error('alamat', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-row ">
                                            <div class="form-group col-md-10 ">
                                                <label for="contoh1">Deskripsi</label>
                                                <textarea type="text" class="form-control " id="deskripsi" name="deskripsi" rows="5" placeholder="Deskripsi"></textarea>
                                                <?= form_error('deskripsi', '<small class="text-danger pl-3" > ', '</small>'); ?>
                                            </div>

                                        </div>

                                        <div class="form-row ">

                                            <div class="form-group col-md-10">
                                                <input class="btn btn-success" type="submit" name="simpan" value="Simpan" />

                                                <a class="btn btn-success" href="<?php echo site_url('admin/profil_panti') ?>" role="button">Kembali</a>

                                            </div>
                                        </div>

                                    </form>


                                </div>
                            </div>
                        </div>
                        <!-- Single Open Accordion ends -->
                    </div>
                    <!-- Row end -->
                    <!-- Row start -->

                    <!-- Row end -->
                </div>
                <!-- Page-body end -->
            </div>
        </div>

    </div>
</div>


<pre id="coordinates" class="coordinates"></pre>


<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(function() {

        $.ajaxSetup({
            type: "POST",
            url: "<?php echo base_url('admin/ambil_data') ?>",
            cache: false,
        });

        $("#id_kecamatan").change(function() {
            var value = $(this).val();
            if (value > 0) {

                $.ajax({
                    data: {
                        modul: 'id_desa',
                        id: value

                    },
                    success: function(respond) {
                        $("#id_desa").html(respond);
                        console.log(respond)
                    }
                })
            }

        });

    })
</script>

<script>
    var marker;

    function taruhMarker(peta, posisiTitik) {

        if (marker) {
            // pindahkan marker
            marker.setPosition(posisiTitik);
        } else {
            // buat marker baru
            marker = new google.maps.Marker({
                position: posisiTitik,
                map: peta
            });
        }

        // isi nilai koordinat ke form
        document.getElementById("Latitude").value = posisiTitik.lat();
        document.getElementById("Longitude").value = posisiTitik.lng();

    }

    function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-7.71556, 110.35556),
            zoom: 9,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var peta = new google.maps.Map(document.getElementById("map"), propertiPeta);

        // even listner ketika peta diklik
        google.maps.event.addListener(peta, 'click', function(event) {
            taruhMarker(this, event.latLng);
        });

    }


    // event jendela di-load  
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<!-- <script>
    var defaultCenter = {
        lat = document.getElementById('Latitude'),
        lng = document.getElementById('Longitude')

    };

    function initialize() {

        var mapOptions = {
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        // Pembuatan petanya
        var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: defaultCenter
            },
            mapOptions);
        var marker = new google.maps.Marker({
            position: defaultCenter,
            map: map,
            title: 'Click to zoom',
            draggable: true
        });


        marker.addListener('drag', handleEvent);
        marker.addListener('dragend', handleEvent);

        var infowindow = new google.maps.InfoWindow({
            content: '<h4>Drag untuk pindah lokasi</h4>'
        });

        infowindow.open(map, marker);
    }

    function handleEvent(event) {
        document.getElementById('Latitude').value = event.latLng.lat();
        document.getElementById('Longitude').value = event.latLng.lng();
    }

    google.maps.event.addDomListener(window, 'load', initialize);
</script> -->