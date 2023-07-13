@extends('landing-page.layouts.main')

@section('content')
<main id="main">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>AUDIT SYSTEM</h1>
                    {{-- <h2>Universitas Sebelas Maret</h2> --}}
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <a href="/login" class="btn-login scrollto">LOGIN</a>
                        <!-- <a href="#" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="landing-assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->

    <!-- ======= About Us Section ======= -->
    <section id="why-us" class="why-us section-bg">
        <div class="container-fluid" data-aos="fade-up">

            <div class="section-title">
                <h2>About Us</h2>
            </div>

            <div class="row">

                <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

                    <div class="content">
                        <p>
                            Tim audit kami terdiri dari sekelompok profesional berpengalaman yang memiliki keahlian
                            dalam melakukan audit sistem informasi dan keamanan data di lingkungan pendidikan.
                        </p>
                    </div>

                    <div class="accordion-list">
                        <ul>
                            <li>
                                <a data-bs-toggle="collapse" class="collapse"
                                    data-bs-target="#accordion-list-1"><span>01</span> Dedikasi <i
                                        class="bx bx-chevron-down icon-show"></i><i
                                        class="bx bx-chevron-up icon-close"></i></a>
                                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                    <p>
                                        Kami sangat berdedikasi untuk menjaga keamanan, integritas, dan efisiensi sistem
                                        di kampus. Kami mengutamakan kepentingan kampus dan berkomitmen untuk memberikan
                                        hasil audit yang akurat dan bermanfaat.
                                    </p>
                                </div>
                            </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Pengalaman <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Dengan pengalaman yang luas dalam melakukan audit sistem di berbagai institusi pendidikan, tim kami telah berhasil mengidentifikasi risiko, menemukan kelemahan, dan memberikan rekomendasi perbaikan yang efektif.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>03</span> Kualitas <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Kami memastikan bahwa setiap audit yang kami lakukan mengikuti standar tertinggi dalam industri ini. Kami menjaga kualitas audit kami melalui metodologi yang teruji, pemahaman mendalam tentang teknologi terbaru, dan pembaruan terhadap kebijakan dan regulasi terkini.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>04</span> Kerahasiaan <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Kami sangat menghargai kerahasiaan dan privasi data kampus. Tim audit kami mematuhi standar etika yang tinggi dan menjaga kerahasiaan semua informasi yang diberikan kepada kami selama proses audit.
                    </p>
                  </div>
                </li>

                <li>
                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>05</span> Misi Kami <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                    <p>
                      Misi tim audit kampus kami adalah untuk meningkatkan keamanan, efisiensi, dan integritas sistem informasi di kampus. Kami berkomitmen untuk menjadi mitra yang andal dalam mendukung pencapaian tujuan strategis kampus melalui audit sistem yang terpercaya.
                    </p>
                  </div>
                </li>

                        </ul>
                    </div>

                </div>

                <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                    style='background-image: url("landing-assets/img/why-us.png");' data-aos="zoom-in"
                    data-aos-delay="150">&nbsp;</div>
            </div>

        </div>
    </section>
    <!-- End About Us Section -->

</main>
<!-- End #main -->
@endsection