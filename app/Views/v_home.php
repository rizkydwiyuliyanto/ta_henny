<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_setting')->get()->getRowArray();
?>
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
                <a href="#home" class="nav-item nav-link">Home</a>
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
<div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="w-100" src="<?= base_url('front') ?>/img/b.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 900px;">
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">Website resmi I K T</h5>
                    <h1 class="display-8 text-white mb-md-4 animated zoomIn">Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
                    <a href="<?= base_url('Home/Donasi') ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft"> Donasi</a>
                    <!-- <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a> -->
                </div>
            </div>
        </div>
        <!-- <div class="carousel-item">
            <img class="w-100" src="<?= base_url('front') ?>/img/carousel-2.jpg" alt="Image">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                <div class="p-3" style="max-width: 900px;">
                    <h5 class="text-white text-uppercase mb-3 animated slideInDown">Creative & Innovative</h5>
                    <h1 class="display-1 text-white mb-md-4 animated zoomIn">Creative & Innovative Digital Solution</h1>
                    <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Free Quote</a>
                    <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                </div>
            </div>
        </div> -->
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button> -->
</div>
<!-- Facts Start -->
<!-- <div class="container-fluid facts py-5 pt-lg-0" id="kasikt">
    <div class="container py-5 pt-lg-0">
        <div class="row gx-0">
            <?php
            if ($kas_i == null) {
                $pemasukan_m[] = 0;
                $pengeluaran_m[] = 0;
            } else {
                foreach ($kas_i as $key => $value) {
                    $pemasukan_m[] = $value['kas_masuk'];
                    $pengeluaran_m[] = $value['kas_keluar'];
                }
            }
            $saldo_i = array_sum($pemasukan_m) - array_sum($pengeluaran_m);

            ?>
            <div class="col-lg-6 wow zoomIn" data-wow-delay="0.3s">
                <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fas fa-file-invoice-dollar text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h1 class="text-primary mb-0">Total Kas</h1>
                        <h1 class="text-primary mb-0">Rp. <?= number_format($saldo_i, 0) ?></h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 wow zoomIn" data-wow-delay="0.6s">
                <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                    <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                        <i class="fas fa-reply text-primary"></i>
                    </div>
                    <div class="ps-4">
                        <h1 class="text-white mb-0">Kas Keluar</h1>
                        <h1 class="text-white mb-0">Rp. <?= number_format($value['kas_keluar'], 0) ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Facts Start -->


<!-- About Start -->
<!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                    <h1 class="mb-0">The Best IT Solution With 10 Years of Experience</h1>
                </div>
                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo et tempor eirmod magna dolore erat amet</p>
                <div class="row g-0 mb-3">
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Award Winning</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Professional Staff</h5>
                    </div>
                    <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>24/7 Support</h5>
                        <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Fair Prices</h5>
                    </div>
                </div>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Call to ask any question</h5>
                        <h4 class="text-primary mb-0">+012 345 6789</h4>
                    </div>
                </div>
                <a href="quote.html" class="btn btn-primary py-3 px-5 mt-3 wow zoomIn" data-wow-delay="0.9s">Request A Quote</a>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?= base_url('front') ?>/img/about.jpg" style="object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- About End -->


<!-- Features Start -->
<!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Why Choose Us</h5>
            <h1 class="mb-0">We Are Here to Grow Your Business Exponentially</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.2s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-cubes text-white"></i>
                        </div>
                        <h4>Best In Industry</h4>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                    </div>
                    <div class="col-12 wow zoomIn" data-wow-delay="0.6s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-award text-white"></i>
                        </div>
                        <h4>Award Winning</h4>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4  wow zoomIn" data-wow-delay="0.9s" style="min-height: 350px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.1s" src="<?= base_url('front') ?>/img/feature.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-5">
                    <div class="col-12 wow zoomIn" data-wow-delay="0.4s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-users-cog text-white"></i>
                        </div>
                        <h4>Professional Staff</h4>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                    </div>
                    <div class="col-12 wow zoomIn" data-wow-delay="0.8s">
                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt text-white"></i>
                        </div>
                        <h4>24/7 Support</h4>
                        <p class="mb-0">Magna sea eos sit dolor, ipsum amet lorem diam dolor eos et diam dolor</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Features Start -->


<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="kegiatan">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Kegiatan I K T</h5>
            <h1 class="mb-0">Kegiatan Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
        </div>
        <div class="row g-5">
            <?php foreach ($agenda as $key => $value) { ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">

                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <!-- <img class="img-fluid" src="<?= base_url('front') ?>/img/blog-1.jpg" alt=""> -->
                            <img class="img-fluid" src="<?= base_url('fotokegiatan/' . $value['foto_kegiatan']) ?>">
                            <!-- <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a> -->
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-1"><i class="far fa-building text-primary me-2"></i><?= $value['tempat_kegiatan'] ?></small>
                                <small class="me-1"><i class="far fa-calendar-alt text-primary me-2"></i><?= $value['tanggal'] ?></small>
                                <small class="me-1"><i class="far fa-clock text-primary me-2"></i><?= $value['jam'] ?> - selesai</small>
                            </div>
                            <h4 class="mb-3"><?= $value['nama_kegiatan'] ?></h4>
                            <a class="text-uppercase" href="<?= base_url('Home/ViewAgenda/' . $value['slug_kegiatan']) ?>">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Blog Start -->

<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="ibadah">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Ibadah I K T</h5>
            <h1 class="mb-0">Ibadah Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
        </div>
        <div class="row g-5">
            <?php foreach ($ibadah as $key => $value) { ?>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">

                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            <!-- <img class="img-fluid" src="<?= base_url('front') ?>/img/blog-1.jpg" alt=""> -->
                            <img class="img-fluid" src="<?= base_url('fotoibadah/' . $value['foto_ibadah']) ?>">
                            <!-- <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Web Design</a> -->
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small class="me-1"><i class="far fa-building text-primary me-2"></i><?= $value['tempat_ibadah'] ?></small>
                                <small class="me-1"><i class="far fa-calendar-alt text-primary me-2"></i><?= $value['tanggal'] ?></small>
                                <small class="me-1"><i class="far fa-clock text-primary me-2"></i><?= $value['jam'] ?> - selesai</small>
                            </div>
                            <h4 class="mb-3"><?= $value['nama_ibadah'] ?></h4>
                            <h6 class="mb-3">Pemimpin Ibadah : <?= $value['pemimpin_ibadah'] ?></h6>
                            <a class="text-uppercase" href="<?= base_url('Home/ViewIbadah/' . $value['slug_ibadah']) ?>">Selengkapnya <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Blog Start -->

<!-- Pricing Plan Start -->
<!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Pricing Plans</h5>
            <h1 class="mb-0">We are Offering Competitive Prices for Our Clients</h1>
        </div>
        <div class="row g-0">
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="bg-light rounded">
                    <div class="border-bottom py-4 px-5 mb-4">
                        <h4 class="text-primary mb-1">Basic Plan</h4>
                        <small class="text-uppercase">For Small Size Business</small>
                    </div>
                    <div class="p-5 pt-0">
                        <h1 class="display-5 mb-3">
                            <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>49.00<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                        </h1>
                        <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-times text-danger pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-times text-danger pt-1"></i></div>
                        <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                    <div class="border-bottom py-4 px-5 mb-4">
                        <h4 class="text-primary mb-1">Standard Plan</h4>
                        <small class="text-uppercase">For Medium Size Business</small>
                    </div>
                    <div class="p-5 pt-0">
                        <h1 class="display-5 mb-3">
                            <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99.00<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                        </h1>
                        <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-times text-danger pt-1"></i></div>
                        <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                <div class="bg-light rounded">
                    <div class="border-bottom py-4 px-5 mb-4">
                        <h4 class="text-primary mb-1">Advanced Plan</h4>
                        <small class="text-uppercase">For Large Size Business</small>
                    </div>
                    <div class="p-5 pt-0">
                        <h1 class="display-5 mb-3">
                            <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149.00<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Month</small>
                        </h1>
                        <div class="d-flex justify-content-between mb-3"><span>HTML5 & CSS3</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-3"><span>Bootstrap v5</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-3"><span>Responsive Layout</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <div class="d-flex justify-content-between mb-2"><span>Cross-browser Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                        <a href="" class="btn btn-primary py-2 px-4 mt-4">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Pricing Plan End -->


<!-- Data Wilayah -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="wilayah">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Data Wilayah</h5>
                    <h1 class="mb-0">Data Wilayah Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
                </div>
                <div class="col-lg-24">
                    <div class="rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <div class="row">
                            <?php foreach ($wilayah as $key => $value) { ?>
                                <div class="col-md-6">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?= $value['nama_wilayah'] ?></h3>
                                    </div>
                                    <div class="card card-outline card-primary">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Anggota</th>
                                                    <th>Jabatan</th>
                                                </tr>
                                                <?php
                                                $db = \Config\Database::connect();
                                                $anggota = $db->table('tbl_anggota_wilayah')
                                                    ->where('id_wilayah', $value['id_wilayah'])
                                                    ->get()->getResultArray();
                                                $no = 1;

                                                foreach ($anggota as $key => $anggota) {
                                                    $jabatan = $db->table('tbl_anggota_wilayah')
                                                        ->where('id_wilayah', $anggota['id_wilayah'])
                                                        ->select('tbl_anggota_wilayah.id_wilayah')
                                                        ->get()->getRowArray();
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $anggota['nama_anggota'] ?></td>
                                                        <td><?= $anggota['jabatan'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Data Wilayah -->

<!-- Data Kerukunan -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="kerukunan">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-12">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Data Kerukunan</h5>
                    <h1 class="mb-0">Data Kerukunan Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
                </div>
                <div class="col-lg-24">
                    <div class="rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                        <div class="row">
                            <?php foreach ($kerukunan as $key => $value) { ?>
                                <div class="col-md-6">
                                    <div class="card-header bg-primary">
                                        <h3 class="card-title text-white"><?= $value['nama_kerukunan'] ?></h3>
                                    </div>
                                    <div class="card card-outline card-primary">
                                        <div class="card-body">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Anggota</th>
                                                    <th>Jabatan</th>
                                                </tr>
                                                <?php
                                                $db = \Config\Database::connect();
                                                $anggota = $db->table('tbl_anggota_kerukunan')
                                                    ->where('id_kerukunan', $value['id_kerukunan'])
                                                    ->get()->getResultArray();
                                                $no = 1;

                                                foreach ($anggota as $key => $anggota) {
                                                    $jabatan = $db->table('tbl_anggota_kerukunan')
                                                        ->where('id_kerukunan', $anggota['id_kerukunan'])
                                                        ->select('tbl_anggota_kerukunan.id_kerukunan')
                                                        ->get()->getRowArray();
                                                ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $anggota['nama_anggota'] ?></td>
                                                        <td><?= $anggota['jabatan'] ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            <?php  } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Data Kerukunan -->


<!-- Testimonial Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Pengurus IKT</h5>
            <h1 class="mb-0">Pengurus Ikatan Keluarga Toraja Kabupaten Jayapura Tahun <?= date('Y') ?></h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            <div class="testimonial-item bg-light my-4">
                <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    <img class="img-fluid rounded" src="<?= base_url('front') ?>/img/testimonial-1.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-4">
                        <h4 class="text-primary mb-1">Eben Heiser Rante Pasang</h4>
                        <small class="text-uppercase">Ketua | I K T</small>
                    </div>
                </div>
                <div class="pt-4 pb-5 px-5">
                    Menjabat selama masa periode tahun <?= date('Y') ?> - pergantian masa jabatan selanjutnya.
                </div>
            </div>
            <div class="testimonial-item bg-light my-4">
                <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    <img class="img-fluid rounded" src="<?= base_url('front') ?>/img/testimonial-2.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-4">
                        <h4 class="text-primary mb-1">Pri Utomo Damar Agung</h4>
                        <small class="text-uppercase">Sekretaris | I K T</small>
                    </div>
                </div>
                <div class="pt-4 pb-5 px-5">
                    Menjabat selama masa periode tahun <?= date('Y') ?> - pergantian masa jabatan selanjutnya.
                </div>
            </div>
            <div class="testimonial-item bg-light my-4">
                <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    <img class="img-fluid rounded" src="<?= base_url('front') ?>/img/testimonial-3.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-4">
                        <h4 class="text-primary mb-1">Rusman Hasan</h4>
                        <small class="text-uppercase">Ketua Wilayah 1 | I K T</small>
                    </div>
                </div>
                <div class="pt-4 pb-5 px-5">
                    Menjabat selama masa periode tahun <?= date('Y') ?> - pergantian masa jabatan selanjutnya.
                </div>
            </div>
            <div class="testimonial-item bg-light my-4">
                <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                    <img class="img-fluid rounded" src="<?= base_url('front') ?>/img/testimonial-4.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-4">
                        <h4 class="text-primary mb-1">Andyka Syahputra Junaedi</h4>
                        <small class="text-uppercase">Ketua Kerukunan 1 | I K T</small>
                    </div>
                </div>
                <div class="pt-4 pb-5 px-5">
                    Menjabat selama masa periode tahun <?= date('Y') ?> - pergantian masa jabatan selanjutnya.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Contact Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="contact">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Hubungi Kami</h5>
            <h1 class="mb-0"></h1>
        </div>
        <div class="row g-5 mb-5">
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-phone-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Nomor Telpon</h5>
                        <h4 class="text-primary mb-0"><?= $web['no_telpon'] ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.4s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-envelope text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Email</h5>
                        <h4 class="text-primary mb-0"><?= $web['email'] ?></h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.8s">
                    <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                        <i class="fa fa-map-marker-alt text-white"></i>
                    </div>
                    <div class="ps-4">
                        <h5 class="mb-2">Alamat</h5>
                        <h4 class="text-primary mb-0"><?= $web['alamat'] ?></h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <!-- <div class="col-lg-6 wow slideInUp" data-wow-delay="0.3s">
                <form>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name" style="height: 55px;">
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" style="height: 55px;">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control border-0 bg-light px-4 py-3" rows="4" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div> -->
            <div class="col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                <iframe class="position-relative rounded w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127546.0106261498!2d140.4357908545363!3d-2.567586849260925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686cf1e38dd8bd6d%3A0x99d2c17b085dc64d!2sKec.%20Sentani%2C%20Kabupaten%20Jayapura%2C%20Papua!5e0!3m2!1sid!2sid!4v1697936224438!5m2!1sid!2sid" frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->


<!-- Team Start -->
<!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Team Members</h5>
            <h1 class="mb-0">Professional Stuffs Ready to Help Your Business</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= base_url('front') ?>/img/team-1.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h4 class="text-primary">Full Name</h4>
                        <p class="text-uppercase m-0">Designation</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= base_url('front') ?>/img/team-2.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h4 class="text-primary">Full Name</h4>
                        <p class="text-uppercase m-0">Designation</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                <div class="team-item bg-light rounded overflow-hidden">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="<?= base_url('front') ?>/img/team-3.jpg" alt="">
                        <div class="team-social">
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-twitter fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-instagram fw-normal"></i></a>
                            <a class="btn btn-lg btn-primary btn-lg-square rounded" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h4 class="text-primary">Full Name</h4>
                        <p class="text-uppercase m-0">Designation</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Team End -->


<!-- Vendor Start -->
<!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5 mb-5">
        <div class="bg-white">
            <div class="owl-carousel vendor-carousel">
                <img src="<?= base_url('front') ?>/img/vendor-1.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-2.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-3.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-4.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-5.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-6.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-7.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-8.jpg" alt="">
                <img src="<?= base_url('front') ?>/img/vendor-9.jpg" alt="">
            </div>
        </div>
    </div>
</div> -->
<!-- Vendor End -->