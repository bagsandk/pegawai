<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title><?= $tittle; ?> </title>
    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>/assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/assets/css/bootstrap/bootstrap.min.css" type="text/css"> -->
</head>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img src="<?= base_url() ?>/assets/img/brand/ptpn7.png" class="navbar-brand-img" alt="...">
                </a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <?php if ($this->session->userdata('role') == 'user') { ?>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(2) == "profil" ? "active" : ""  ?> href=" <?= base_url('user/profil') ?>">
                                    <i class="ni ni-single-02 text-primary"></i>
                                    <span class="nav-link-text">Profil</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($this->session->userdata('verif') == true && $this->session->userdata('role') == 'admin') { ?>
                            <li class="nav-item ">
                                <a class="nav-link  <?= $this->uri->segment(1) == "dashboard" ? "active" : ""  ?> " href=" <?= base_url('dashboard') ?>">
                                    <i class="ni ni-tv-2 text-primary"></i>
                                    <span class="nav-link-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(1) == "user" && $this->uri->segment(2) == null ? "active" : ""  ?> " href=" <?= base_url('user') ?>">
                                    <i class="ni ni-single-02 text-orange"></i>
                                    <span class="nav-link-text">User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(2) == "verif" && $this->uri->segment(2) == "verif" ? "active" : ""  ?> " href=" <?= base_url('user/verif') ?>">
                                    <i class="ni ni-user-run text-green"></i>
                                    <span class="nav-link-text">Verifikasi User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(1) == "karyawan" ? "active" : ""  ?> " href=" <?= base_url('karyawan') ?>">
                                    <i class="ni ni-badge text-yellow"></i>
                                    <span class="nav-link-text">Karyawan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(1) == "posisi" ? "active" : ""  ?>" href="<?= base_url('posisi') ?>">
                                    <i class="ni ni-square-pin text-blue"></i>
                                    <span class="nav-link-text">posisi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(1) == "unit" ? "active" : ""  ?>" href="<?= base_url('unit') ?>">
                                    <i class="ni ni-square-pin text-green"></i>
                                    <span class="nav-link-text">Unit</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(1) == "grup" ? "active" : ""  ?> " href=" <?= base_url('grup') ?>">
                                    <i class="ni ni-ungroup text-purple"></i>
                                    <span class="nav-link-text">grup</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $this->uri->segment(1) == "strata" ? "active" : ""  ?>" href="<?= base_url('strata') ?>">
                                    <i class="ni ni-ui-04 text-orange"></i>
                                    <span class="nav-link-text">Strata</span>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-gradient-primary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto ">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="<?= base_url() ?>/assets/img/default.png">
                                    </span>
                                    <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?= $this->session->userdata('name'); ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu  dropdown-menu-right ">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="<?= base_url('user/profil') ?>" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <!-- Header -->
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        </div>
        <!-- Page content -->
        <div class="container-fluid mt--8">
            <div class="row justify-content-center">
                <div class=" col ">
                    <?php
                    if (isset($_view) && $_view)
                        $this->load->view($_view);
                    ?>
                </div>
            </div>
            <!-- Footer -->
            <footer class="footer pt-0">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6">
                        <div class="copyright text-center  text-lg-left  text-muted">
                            &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">sysyndev</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="<?= base_url() ?>/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="<?= base_url() ?>/assets/vendor/clipboard/dist/clipboard.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/datatables-demo.js"></script>
    <!-- Argon JS -->
    <script src="<?= base_url() ?>/assets/js/argon.js?v=1.2.0"></script>
    <!-- <script src="<?= base_url() ?>/assets/js/argon.min.js"></script> -->
</body>

</html>