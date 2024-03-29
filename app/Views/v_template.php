<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>I K T | <?= $judul ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Favicon -->
    <link href="<?= base_url('front') ?>/img/home.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('front') ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url('front') ?>/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('front') ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('front') ?>/css/style.css" rel="stylesheet">
    <?php if ($page && $page == "front-end/v_donasi") { ?>
        <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-iVcJuiiwu63zng6r"></script>
    <?php } ?>
</head>

<body>
    <?php
    $db = \Config\Database::connect();
    $web = $db->table('tbl_setting')->get()->getRowArray();
    ?>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i><?= $web['alamat'] ?></small>
                    <small class="me-3 text-light"><i class="fa fa-phone-alt me-2"></i><?= $web['no_telpon'] ?></small>
                    <small class="text-light"><i class="fa fa-envelope me-2"></i><?= $web['email'] ?></small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-whatsapp fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                    <!-- <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a> -->
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->



    <?php
    if ($page) {
        echo view($page);
    }

    ?>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            <h4 class="m-0 text-white"><i class="fa fa-home"></i> <?= $web['nama_masjid'] ?></h4>
                        </a>
                        <p class="mt-3 mb-4">Ikatan Keluarga Toraja Kabupaten Jayapura Provinsi Papua !</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-6 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Hubungi Kami</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0"><?= $web['alamat'] ?></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope text-primary me-2"></i>
                                <p class="mb-0"><?= $web['email'] ?></p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0"><?= $web['no_telpon'] ?></p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-whatsapp fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-youtube fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Quick Links</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start">
                                <a class="text-light mb-2" href="#home"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                                <!-- <a class="text-light mb-2" href="#kasikt"><i class="bi bi-arrow-right text-primary me-2"></i>Kas Ikt</a> -->
                                <a class="text-light mb-2" href="#kegiatan"><i class="bi bi-arrow-right text-primary me-2"></i>Kegiatan</a>
                                <a class="text-light mb-2" href="#wilayah"><i class="bi bi-arrow-right text-primary me-2"></i>Wilayah</a>
                                <a class="text-light mb-2" href="#kerukunan"><i class="bi bi-arrow-right text-primary me-2"></i>Kerukunan</a>
                                <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Donasi</a>
                                <a class="text-light" href="#contact"><i class="bi bi-arrow-right text-primary me-2"></i>Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">

                        <?= date('Y') ?>
                        <p class="mb-0"> &copy;
                            <a class="text-white border-bottom" href="#">
                                <?= $web['nama_masjid'] ?>
                            </a>
                            |
                            Designed by <a class="text-white border-bottom" href="https://htmlcodex.com">D.A</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('front') ?>/lib/wow/wow.min.js"></script>
    <script src="<?= base_url('front') ?>/lib/easing/easing.min.js"></script>
    <script src="<?= base_url('front') ?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('front') ?>/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url('front') ?>/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('front') ?>/js/main.js"></script>
    <?php if ($page && $page == "front-end/v_donasi") { ?>
        <script>
            const btnSubmit = document.getElementById("btn-submit");
            const formSubmit = document.getElementById("form-submit");
            console.log(formSubmit.elements.length);
            let count = formSubmit.elements.length;
            for (let i = 0; i < formSubmit.elements.length; i++) {
                formSubmit.elements[i].onblur = (e) => {
                    if (e.target.value !== "") {
                        count -= 1;
                    } else {
                        count += 1;
                    }
                    if (count === 0) {
                        console.log("undisabled")
                        btnSubmit.removeAttribute("disabled");
                    } else {
                        btnSubmit.setAttribute("disabled", "")
                    }
                }
            }
            btnSubmit.onclick = async (e) => {
                e.preventDefault();
                let formData = new FormData(formSubmit);
                const data = new URLSearchParams(formData);
                const objData = Object.fromEntries(data);
                try {
                    const response = await fetch("<?php echo base_url("php/placeOrder.php") ?>", {
                        method: "POST",
                        body: data
                    });
                    const token = await response.text();
                    // console.log(token);
                    snap.pay(token, {
                        onSuccess:function(result) {
                            fetch("<?php echo base_url("Home/KirimDonasi2")?>", {
                                "method":"POST",
                                "body":formData
                            }).then(response => {
                                response.text().then(e => {
                                    window.location.reload();
                                })
                            }).catch(err => {
                                console.log(err);
                            })
                            // console.log("Success");
                        },
                        onPending: function(result) {
                            console.log("Pending")
                        },
                        onError: function(result){
                            console.log("Error");
                        }
                    });
                } catch (err) {
                    console.log(err)
                }
            }
        </script>
    <?php } ?>
    <!-- boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>