<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/animate.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/magnific-popup.css">


    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/jquery.timepicker.css">

    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>dashboard3/css/style.css">

    <!-- css leaflet -->
    <link href="<?= base_url('assets/'); ?>leaflet/leaflet.css" rel="stylesheet">
    <script src="<?= base_url('assets/'); ?>leaflet/leaflet.js"></script>
</head>

<style type="text/css">
    #mapid {
        height: 800px;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html"><i class="fas fa-hands-helping"></i> Sosial Sesama</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Dashboard'); ?>">Home</a></li>
                    <li class="nav-item"><a href="<?= base_url('Dashboard/lokasi'); ?>" class="nav-link">Lokasi</a></li>
                    <li class="nav-item"><a href="<?= base_url('Dashboard/kegiatan'); ?>" class="nav-link">Kegiatan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('dashboard/data_orang_panti'); ?>">Data Penghuni Panti</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('auth'); ?>">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>