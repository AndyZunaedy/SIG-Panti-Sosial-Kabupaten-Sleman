<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/71cb2b530f.js" crossorigin="anonymous"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/elegant-icons.css" type="text/css">
    <link rel="icon" href="<?= base_url('application/'); ?>upload/logo/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>home/css/style16.css" type="text/css">

   

    <script src="<?= base_url('assets/'); ?>js/script.js"></script>
    <script>
        var default_lat = -7.71556;
        var default_lng = 110.35556;
        var default_zoom = 11;
    </script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDn79GaITKVE8ZD24g9YYwIjFpDQjAedug&language=id&region=ID"></script>


</head>
<!-- <style type="text/css">
    #map {
        height: 662px;
    }
</style> -->

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                   
                    <div class="phone-service">
                       
                      
                    </div>
                </div>
                <div class="ht-right">
                   


                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li><img class="mb-1 mr-3" src="<?= base_url('application/'); ?>upload/logo/logojadi1.png" width="225px" height="45px" alt=""></li>
                        <li><a href="<?= base_url('Dashboard'); ?>">Home</a></li>
                        <li><a href="<?= base_url('Dashboard/lokasi'); ?>">Lokasi</a></li>
                        <li><a href="<?= base_url('Dashboard/kegiatan'); ?>">Kegiatan</a></li>
                        <li> <a href="<?= base_url('Auth/'); ?>" class="login-panel"><i class="fa fa-user"></i> Login</a></li>

                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="assets/home/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="assets/home/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Hero Section End -->