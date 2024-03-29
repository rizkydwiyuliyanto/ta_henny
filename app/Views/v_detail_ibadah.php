<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_setting')->get()->getRowArray();
?>
<!-- <div class="container-fluid position-relative p-0" id="home">

    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url('front') ?>/img/b.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Detail Kegiatan</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
                        <a href="<?= base_url('Home') ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->


<!-- Navbar & Carousel Start -->
<div class="container-fluid position-relative p-0" id="home">
    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
        <a href="<?= base_url('home') ?>" class="navbar-brand p-0">
            <h3 class="m-0"><i class="fa fa-home"></i> <?= $web['nama_masjid'] ?></h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="<?= base_url('Home') ?>" class="nav-item nav-link">Home</a>
                <a href="#kegiatan" class="nav-item nav-link">Kegiatan</a>
                <a href="#ibadah" class="nav-item nav-link">Ibadah</a>
                <a href="#wilayah" class="nav-item nav-link">Wilayah</a>
                <a href="#kerukunan" class="nav-item nav-link">Kerukunan</a>
                <a href="<?= base_url('Home/Donasi') ?>" class="nav-item nav-link">Donasi</a>
                <a href="#contact" class="nav-item nav-link">Contact</a>
            </div>
            <a href="<?= base_url('login') ?>" class="btn btn-primary py-2 px-4 ms-3" target="_blank">Login</a>
        </div>
    </nav>
</div>
<!-- Navbar & Carousel End -->


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                    <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Full Screen Search End -->


<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-8">
                <!-- Blog Detail Start -->
                <div class="mb-5">
                    <center>
                        <img class="img-fluid w-50 rounded mb-5" src="<?= base_url('fotoibadah/' . $ibadah['foto_ibadah']) ?>">
                    </center>
                    <h1 class="mb-4"><?= $ibadah['nama_ibadah'] ?></h1>
                    <p><?= $ibadah['isi_ibadah'] ?></p>
                </div>
                <!-- Blog Detail End -->

            </div>

            <!-- Sidebar Start -->
            <div class="col-lg-4">
                <!-- Recent Post Start -->
                <div class="mb-5 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Kegiatan Terbaru</h3>
                    </div>

                    <?php foreach ($ibadahbaru as $key => $ib) { ?>
                        <div class="d-flex rounded overflow-hidden mb-3">
                            <img class="img-fluid" src="<?= base_url('fotoibadah/' . $ib['foto_ibadah']) ?>" style="width: 100px; height: 100px; object-fit: cover;" alt="">
                            <a href="<?= base_url('Home/ViewIbadah/' . $ib['slug_ibadah']) ?>" class="h5 fw-semi-bold d-flex align-items-center bg-light px-3 mb-0"><?= $ib['nama_ibadah'] ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <!-- Recent Post End -->

                <!-- Plain Text Start -->
                <!-- <div class="wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title section-title-sm position-relative pb-3 mb-4">
                        <h3 class="mb-0">Plain Text</h3>
                    </div>
                    <div class="bg-light text-center" style="padding: 30px;">
                        <p>Vero sea et accusam justo dolor accusam lorem consetetur, dolores sit amet sit dolor clita kasd justo, diam accusam no sea ut tempor magna takimata, amet sit et diam dolor ipsum amet diam</p>
                        <a href="" class="btn btn-primary py-2 px-4">Read More</a>
                    </div>
                </div> -->
                <!-- Plain Text End -->
            </div>
            <!-- Sidebar End -->
        </div>
    </div>
</div>
<!-- Blog End -->