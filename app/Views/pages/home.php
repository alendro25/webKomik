<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Get Work Done <span>Faster</span><br> and <span>Better</span> With Us</h1>
            <a href="#" class="btn btn-primary tombol">Our Work</a>
        </div>
    </div>

    <!-- Container -->
    <div class="container">

        <!-- Info Panel -->
        <div class="row justify-content-center">
            <div class="col-10 info-panel">
                <div class="row">
                    <div class="col-lg">
                        <img src="/img/employee.png" alt="employee" class="float-left">
                        <h4>24 Hours</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="col-lg">
                        <img src="/img/hires.png" alt="hires" class="float-left">
                        <h4>High-Res</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                    <div class="col-lg">
                        <img src="/img/security.png" alt="security" class="float-left">
                        <h4>Security</h4>
                        <p>Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Akhir info -->

        <!-- Working Space -->
        <div class="row workingspace">
            <div class="col-lg-6">
                <img src="/img/workingspace.png" alt="workingspace" class="img-fluid">
            </div>
            <div class="col-lg-4">
                <h3>You <span>Like</span> at <span>Home</span></h3>
                <p>Bekerja dengan suasana hati yang lebih asik dan mempelajari hal baru setiap harinya.</p>
                <a href="#" class="btn btn-primary tombol">Gallery</a>
            </div>
        </div>
        <!-- Akhir Working Space -->

        <!-- Testimonial -->
        <section class="testimonial">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h5>"Bekerja dengan susana hati yang lebuh asik dan mempelajari hal baru setiap harinya"</h5>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-lg-6 justify-content-center d-flex">
                    <figure class="figure">
                        <img src="/img/img1.png" class="figure-img img-fluid rounded rounded-circle" alt="Testi 2">
                    </figure>
                    <figure class="figure">
                        <img src="/img/img2.png" class="figure-img img-fluid rounded rounded-circle utama" alt="Testi 1">
                        <figcaption class="figure-caption">
                            <h5>Sunny Ye</h5>
                            <p>Designer</p>
                        </figcaption>
                    </figure>
                    <figure class="figure">
                        <img src="/img/img3.png" class="figure-img img-fluid rounded rounded-circle" alt="Testi 3">
                    </figure>
                </div>
            </div>

        </section>
        <!-- Akhir Testimonial -->
    </div>

    <!-- Footer -->
    <footer class="page-footer bg-dark">

        <div class="bg-primary">
            <div class="container">
                <div class="row py-4 d-flex align-item-center">

                    <div class="col-md-12 text-center">
                        <a href=""><i class="fab fa-facebook-square ml-3"></i> </a>
                        <a href=""><i class="fab fa-twitter ml-3"></i> </a>
                        <a href=""><i class="fab fa-google ml-3"></i> </a>
                        <a href=""><i class="fab fa-instagram ml-3"></i> </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container text-center text-md-left mt-5">
            <div class="row">

                <div class="col-mb-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weigh-bold">Gerald</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; height: 2px;">
                    <p class="mt-2">Mahasiswa unitomo prodi informatika<br>dengan nim 2018420126</p>
                </div>

                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weigh-bold">Material</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 75px; height: 2px;">

                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#">HTML 5</a></li>
                        <li class="my-2"><a href="#">PHP</a></li>
                        <li class="my-2"><a href="#">CSS</a></li>
                        <li class="my-2"><a href="#">JavaScript</a></li>
                    </ul>
                </div>

                <div class="col-md-2 mx-auto mb-4">
                    <h6 class="text-uppercase font-weigh-bold">Usefull Link</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 110px; height: 2px;">

                    <ul class="list-unstyled">
                        <li class="my-2"><a href="#">Home</a></li>
                        <li class="my-2"><a href="#">About</a></li>
                        <li class="my-2"><a href="#">Services</a></li>
                        <li class="my-2"><a href="#">Contact</a></li>
                    </ul>
                </div>

                <div class="col-md-3 mx-auto mb-4">
                    <h6 class="text-uppercase font-weigh-bold">Contact</h6>
                    <hr class="bg-primary mb-4 mt-0 d-inline-block mx-auto" style="width: 110px; height: 2px;">

                    <ul class="list-unstyled">
                        <li class="my-2"><i class="fas fa-home"></i> Griya Kebraon Timur FA/30</li>
                        <li class="my-2"><i class="fas fa-envelope"></i> alendro25@gmail.com</li>
                        <li class="my-2"><i class="fas fa-phone"></i> 0838-3114-4432</li>
                        <li class="my-2"><i class="fas fa-print"></i> (031)7667262</li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="footer-copyright text-center py-3">
            <p>&copy;Copyright
                <a href="#">gerald.com</a>
            </p>
            <p>Designed by Me</p>
        </div>

    </footer>
    <!-- Akhir Footer -->

    <?= $this->endSection(); ?>