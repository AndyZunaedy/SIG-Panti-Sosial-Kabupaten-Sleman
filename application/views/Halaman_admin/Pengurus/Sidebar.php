<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <nav class="navbar header-navbar pcoded-header">
            <div class="navbar-wrapper">

                <div class="navbar-logo">
                    <a class="mobile-menu" id="mobile-collapse" href="#!">
                        <i class="ti-menu"></i>
                    </a>
                    <a class="mobile-search morphsearch-search" href="#">
                        <i class="ti-search"></i>
                    </a>
                  <a href="<?= base_url('Admin'); ?>">
                        <img class="img-fluid" src="<?= base_url('application/'); ?>upload/logo/logojadi.png" width="200px" height="50px" alt="Theme-Logo">
                    </a>
                    <a class="mobile-options">
                        <i class="ti-more"></i>
                    </a>
                </div>

                <div class="navbar-container container-fluid">
                    <ul class="nav-left">
                        <li>
                            <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile header-notification">
                            <a href="#!">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Hai, <?= $admin['name']; ?></span>

                                <img src="<?= base_url() ?>application/upload/admin/<?= $admin['foto']; ?>" class="img-radius">

                                <i class="ti-angle-down"></i>
                            </a>
                            <ul class="show-notification profile-notification">

                                <li>
                                    <a href="<?= base_url('admin/edit_profil_admin'); ?>">
                                        <i class="ti-user"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin/ubah_password'); ?>">
                                        <i class="ti-user"></i> Ubah Password
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="ti-layout-sidebar-left"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">
                <nav class="pcoded-navbar">
                    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                    <div class="pcoded-inner-navbar main-menu">

                        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Layout</div>
                        <ul class="pcoded-item pcoded-left-item">
                            <li>
                                <a href="<?= base_url('admin/index'); ?>">
                                    <span class=" pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/profil_panti'); ?>">
                                    <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                                    <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Profil Panti</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>



                            <li>
                                <a href="<?= base_url('admin/galeri'); ?>">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Galeri Panti</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/penghuni'); ?>">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Penghuni Panti</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/kegiatan'); ?>">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kegiatan Panti</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url('admin/komentar'); ?>">
                                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Komentar</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>