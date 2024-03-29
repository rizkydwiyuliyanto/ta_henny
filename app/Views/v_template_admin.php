<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I K T | <?= $judul ?></title>

    <!-- Favicon -->
    <link href="<?= base_url('front') ?>/img/home.png" rel="icon">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">

    <!-- summernote -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/summernote/summernote-bs4.min.css">


    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/select2/js/select2.full.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>

    <!-- Summernote -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/summernote/summernote-bs4.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <?php
    $db = \Config\Database::connect();
    $web = $db->table('tbl_setting')->get()->getRowArray();
    ?>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h4 class="nav-link"><b><?= $web['nama_masjid'] ?></b></h4>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Login/Logout') ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('Admin') ?>" class="brand-link text-center">
                <i class="fas fa-home text-primary fa-3x"></i>
                <h2><b>I K T</b></h2>
            </a>
            -
            <?php
            if (session()->get('level') == 1) { ?>
                <a class="brand-link text-center text-primary">
                    <b>Sekretaris</b>
                </a>
            <?php } else { ?>
                <a class="brand-link text-center text-primary">
                    <b>Bendahara</b>
                </a>
            <?php } ?>
            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <?php
                        if (session()->get('level') == 1) { ?>

                            <li class="nav-item">
                                <a href="<?= base_url('Admin') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Agenda') ?>" class="nav-link <?= $menu == 'kegiatan' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>
                                        Agenda
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Ibadah') ?>" class="nav-link <?= $menu == 'ibadah' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-calendar-alt"></i>
                                    <p>
                                        Ibadah
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Thn') ?>" class="nav-link <?= $submenu == 'thn' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>Tahun</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('DataWilayah') ?>" class="nav-link <?= $menu == 'data-wilayah' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Wilayah
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('DataKerukunan') ?>" class="nav-link <?= $menu == 'data-kerukunan' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>
                                        Kerukunan
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item <?= $menu == 'kas-ikt' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'kas-ikt' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-money-bill-wave"></i>
                                    <p>
                                        Kas Rumah Tongkonan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Kas Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Kas Keluar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-success"></i>
                                            <p>Rekap Kas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $menu == 'kas-im' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'kas-im' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-money-bill-wave"></i>
                                    <p>
                                        Kas Ibadah Mingguan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Kas Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Kas Keluar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-success"></i>
                                            <p>Rekap Kas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $menu == 'kas-ibadah' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'kas-ibadah' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-money-bill-wave"></i>
                                    <p>
                                        Kas Ibadah
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Kas Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Kas Keluar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-success"></i>
                                            <p>Rekap Kas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $menu == 'laporan-kas' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'laporan-kas' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                    <p>
                                        Laporan Kas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-ikt' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Laporan Kas Rumah Tongkonan</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-ibadah' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Laporan Kas Ibadah</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-im' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-success"></i>
                                            <p>Laporan Kas Ibadah Mingguan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Rekening') ?>" class="nav-link <?= $menu == 'rekening' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-money-check"></i>
                                    <p>
                                        Rekening
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Admin/DonasiMasuk') ?>" class="nav-link <?= $menu == 'donasi' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                                    <p>
                                        Donasi Masuk
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('User') ?>" class="nav-link <?= $menu == 'user' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        User
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Admin/Setting') ?>" class="nav-link <?= $menu == 'setting' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-cog"></i>
                                    <p>
                                        Setting
                                    </p>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a href="<?= base_url('Bendahara') ?>" class="nav-link <?= $menu == 'dashboard' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url('Bendahara/DonasiMasuk') ?>" class="nav-link <?= $menu == 'donasi' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-hand-holding-usd"></i>
                                    <p>
                                        Donasi Masuk
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item <?= $menu == 'kas-ikt' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'kas-ikt' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-money-bill-wave"></i>
                                    <p>
                                        Kas Rumah Tongkonan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Kas Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Kas Keluar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Rekap Kas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $menu == 'kas-ibadah' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'kas-ibadah' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-money-bill-wave"></i>
                                    <p>
                                        Kas Ibadah
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Kas Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Kas Keluar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-success"></i>
                                            <p>Rekap Kas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $menu == 'kas-im' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'kas-im' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-money-bill-wave"></i>
                                    <p>
                                        Kas Ibadah Mingguan
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Kas Masuk</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Kas Keluar</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-success"></i>
                                            <p>Rekap Kas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item <?= $menu == 'laporan-kas' ? 'menu-open' : '' ?>">
                                <a href="#" class="nav-link <?= $menu == 'laporan-kas' ? 'active' : '' ?>">
                                    <i class="nav-icon fas fa-file-invoice-dollar"></i>
                                    <p>
                                        Laporan Kas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIkt/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-ikt' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-primary"></i>
                                            <p>Laporan Kas Rumah Tongkonan</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIbadah/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-ibadah' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-danger"></i>
                                            <p>Laporan Kas Ibadah</p>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?= base_url('KasIm/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-im' ? 'active' : '' ?>">
                                            <i class="far fa-circle nav-icon text-success"></i>
                                            <p>Laporan Kas Ibadah Mingguan</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        <?php } ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $judul ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">

                        <?php
                        if ($page) {
                            echo view($page);
                        }

                        ?>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Design-by | Damar-Agung 😎
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <?= date('Y') ?> <a href="#"><?= $web['nama_masjid'] ?></a>.</strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- Page specific script -->
    <script>
        $(function() {
            // Summernote
            $('#summernote').summernote()
        })
    </script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>