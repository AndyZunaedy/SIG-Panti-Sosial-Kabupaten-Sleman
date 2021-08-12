<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Site Metas -->
<title><?= $title; ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">

<!-- Site Icons -->
<link rel="shortcut icon" href="<?= base_url('assets/'); ?>user/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?= base_url('assets/'); ?>user/images/apple-touch-icon.png">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>user/css/bootstrap.min.css">
<!-- Site CSS -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>user/style8.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>user/css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url('assets/'); ?>user/css/custom.css">

<!-- Modernizer for Portfolio -->
<script href="<?= base_url('assets/'); ?>user/js/modernizer.js"></script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<link href="<?= base_url('assets/'); ?>leaflet/leaflet.css" rel="stylesheet">
<script src="<?= base_url('assets/'); ?>leaflet/leaflet.js"></script>
</head>
<style type="text/css">
    #mapid {
        height: 662px;
    }
</style>

<body>

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__bar"></div>
            <div class="loader__ball"></div>
        </div>
    </div><!-- end loader -->
    <!-- END LOADER -->

    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="right-top">
                        <div class="social-box">
                            <ul>
                                <li><a href="#"><i></i></a></li>
                                <li><a href="#"><i></i></a></li>
                                <li><a href="#"><i></i></a></li>
                                <li><a href="#"><i></i></a></li>
                                <li><a href="#"><i></i></a></li>
                                <ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="left-top">
                        <div class="email-box">
                            <a href="#"><i></i> </a>
                        </div>
                        <div class="phone-box">
                            <a><i></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <header class="header header_style_01">
        <nav class="megamenu navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"><img src="images/logos/logo.png" alt="image"></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ml-auto">
                        <li><a class="nav-link" href="<?= base_url('Dashboard'); ?>">Home</a></li>
                        <li><a href="<?= base_url('Dashboard/lokasi'); ?>" class="nav-link">Lokasi</a></li>
                        <li><a href="<?= base_url('Dashboard/kegiatan'); ?>" class="nav-link">Kegiatan</a></li>
                        <li><a class="nav-link" href="<?= base_url('dashboard/data_orang_panti'); ?>">Data Penghuni Panti</a></li>
                        <li><a class="nav-link" href="<?= base_url('auth'); ?>">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>