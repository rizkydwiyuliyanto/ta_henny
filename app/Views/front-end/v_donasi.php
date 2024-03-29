<?php
$db = \Config\Database::connect();
$web = $db->table('tbl_setting')->get()->getRowArray();
?>
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
<br>
<br>
<br>
<br>
<br>
<br>
<!-- <div class="container-fluid position-relative p-0" id="home">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="<?= base_url('front') ?>/img/b.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h5 class="text-white text-uppercase mb-3 animated slideInDown">Website resmi I K T</h5>
                        <h1 class="display-1 text-white mb-md-4 animated zoomIn">Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
                        <a href="<?= base_url('Home') ?>" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- Quote Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="donasi">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Konfirmasi Donasi 👉</h5>
                    <h1 class="mb-0">Donasi Ikatan Keluarga Toraja Kabupaten Jayapura</h1>
                </div>
                <p class="mb-4">Website resmi Donasi I K T Kabupaten Jayapura Provinsi Papua !</p>
                <div class="card">
                    <h5 class="card-header bg-primary text-white">Rekening | I K T</h5>
                    <div class="media mt-2 ml-2 mb-2">
                        <?php foreach ($rek as $key => $value) { ?>
                            <div class="bg-primary d-flex align-items-center justify-content-center rounded mt-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-money-check fa-2x text-white"></i>
                            </div>
                            <div class="media-body">
                                <h5 class="mt-1 ml-4"><?= $value['nama_bank'] ?></h5>
                                <h5 class="mt-1 ml-4"><?= $value['no_rek'] ?></h5>
                                <h5 class="mt-1 ml-4"><?= $value['atas_nama'] ?></h5>

                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bg-primary rounded h-100 d-flex align-items-center p-5 wow zoomIn" data-wow-delay="0.9s">
                    <br>
                    <div class="row g-3">
                        <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="alert alert-success">';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        }
                        ?>
                        <form method="get" action="" id="form-submit">
                            <!-- <div class="col-xl-12">
                                <label class="text-white">Rekening Tujuan :</label>
                                <select name="id_rekening" aria-label="Default select example" class="form-select bg-light border-0" style="height: 55px;">
                                    <option value="">--Pilih Bank Tujuan--</option>
                                    <?php foreach ($rek as $key => $value) { ?>
                                        <option value="<?= $value['id_rekening'] ?>"><?= $value['nama_bank'] ?> | <?= $value['no_rek'] ?></option>
                                    <?php } ?>
                                </select>
                            </div> -->
                            <div class="col-12">
                                <label class="text-white">Jenis Donasi :</label>
                                <select name="jenis_donasi" aria-label="Default select example" class="form-select bg-light border-0" style="height: 55px;">
                                    <option value="">--Pilih Jenis Donasi--</option>
                                    <option value="Ibadah">Ibadah</option>
                                    <option value="Rumah Tongkonan">Rumah Tongkonan</option>
                                    <option value="Ibadah Mingguan">Ibadah Mingguan</option>
                                </select>
                            </div>
                            <!-- <div class="col-12">
                                <label class="text-white">Nama Bank Pengirim :</label>
                                <input type="text" name="nama_bank" class="form-control bg-light border-0" placeholder="Nama Bank Pengirim" style="height: 55px;">
                            </div> -->
                            <!-- <div class="col-12">
                                <label class="text-white">No Rek Pengirim :</label>
                                <input type="text" name="no_rek" class="form-control bg-light border-0" placeholder="No Rek Pengirim" style="height: 55px;">
                            </div> -->
                            <div class="col-12">
                                <label class="text-white">Nama Pengirim :</label>
                                <input type="text" name="nama_pengirim" class="form-control bg-light border-0" placeholder="Nama Pengirim" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <label class="text-white">No. Telp :</label>
                                <input type="text" name="no_telp" class="form-control bg-light border-0" placeholder="No. Telp" style="height: 55px;">
                            </div>
                            <div class="col-12">
                                <label class="text-white">Jumlah Donasi (Rp.)</label>
                                <input type="number" name="jumlah" class="form-control bg-light border-0" placeholder="Jumlah Donasi" style="height: 55px;">
                            </div>
                            <!-- <div class="col-12">
                                <label class="text-white">Bukti Transfer</label>
                                <input type="file" name="bukti" accept="image/*" class="form-control bg-light border-0" placeholder="Jumlah Donasi" style="height: 55px;">
                            </div> -->
                            <br>
                        </form>
                        <div class="col-12">
                            <button disabled class="btn btn-dark w-100 py-3" id="btn-submit"><i class="fas fa-paper-plane"> Kirim</i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quote End -->


<!-- Contact Start -->
<!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Contact Us</h5>
            <h1 class="mb-0">If You Have Any Query, Feel Free To Contact Us</h1>
        </div>
        <div class="row g-6 mb-5">
            <div class="col-lg-8">
                <div class="d-flex align-items-center wow fadeIn" data-wow-delay="0.1s">
                    <?php foreach ($rek as $key => $value) { ?>
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                            <i class="fa fa-money-check fa-2x text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="mb-2"><?= $value['nama_bank'] ?></h5>
                            <h5 class="mb-2"><?= $value['no_rek'] ?></h5>
                            <h4 class="text-primary mb-0">a.n : <?= $value['atas_nama'] ?></h4>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="row g-6">
            <div class="col-lg-10 wow slideInUp" data-wow-delay="0.3s">
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
            </div>
        </div>
    </div>
</div> -->
<!-- Contact End -->