<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Program Keahlian - SMK Negeri 4 Kota Bogor</title>


    <!-- Google Fonts -->

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    >


    <!-- Laravel Vite -->

    @vite([
        'resources/css/app.css',
        'resources/css/jurusan.css'
    ])

</head>


<body class="d-flex flex-column min-vh-100">


    <!-- =====================================================
         NAVBAR
         ===================================================== -->

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 fixed-top">

        <div class="container">


            <!-- LOGO -->

            <a
                class="navbar-brand d-flex align-items-center gap-2 fw-bold"
                href="{{ url('/') }}"
            >

                <img
                    src="{{ asset('images/logo-smkn4.svg') }}"
                    alt="Logo SMKN 4 Bogor"
                    height="40"
                >


                <div
                    class="border-end border-white opacity-50 my-1"
                    style="height: 24px;"
                ></div>


                <img
                    src="{{ asset('images/logo-baru.png') }}"
                    alt="Logo FrameProject"
                    height="35"
                >

            </a>


            <!-- MOBILE BUTTON -->

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >

                <span class="navbar-toggler-icon"></span>

            </button>


            <!-- NAVIGATION -->

            <div
                class="collapse navbar-collapse"
                id="navbarNav"
            >


                <ul class="navbar-nav position-absolute start-50 translate-middle-x">


                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}#Beranda"
                        >
                            Beranda
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('berita*') ? 'active' : '' }}"
                            href="{{ url('/berita') }}"
                        >
                            Berita
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('jurusan*') ? 'active' : '' }}"
                            href="{{ url('/jurusan') }}"
                        >
                            Jurusan
                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('galeri*') ? 'active' : '' }}"
                            href="{{ url('/galeri') }}"
                        >
                            Galeri
                        </a>

                    </li>


                </ul>


                <!-- LOGIN -->

                <div class="ms-auto">

                    @if (Route::has('login'))

                        @auth

                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="btn btn-purple border-0 fw-semibold"
                            >

                                <i class="bi bi-speedometer2 me-1"></i>

                                Dashboard

                            </a>

                        @else

                            <a
                                href="{{ route('login') }}"
                                class="btn btn-purple border-0 fw-semibold"
                            >

                                <i class="bi bi-box-arrow-in-right me-1"></i>

                                Masuk

                            </a>

                        @endauth

                    @endif

                </div>


            </div>

        </div>

    </nav>



    <!-- =====================================================
         MAIN
         ===================================================== -->

    <main class="major-page flex-grow-1">


        <!-- =================================================
             HERO
             ================================================= -->

        <section class="major-hero">

            <div class="container">

                <div class="major-hero-content">


                    <div class="major-hero-label">

                        <span></span>

                        PROGRAM KEAHLIAN

                    </div>


                    <h1>

                        Pilih bidang,
                        <span>bangun masa depan.</span>

                    </h1>


                    <p>

                        SMK Negeri 4 Kota Bogor menyediakan program
                        keahlian yang dirancang untuk membekali siswa
                        dengan keterampilan, pengetahuan, dan pengalaman
                        yang relevan dengan kebutuhan dunia kerja.

                    </p>


                </div>

            </div>

        </section>



        <!-- =================================================
             MAJOR MAIN
             ================================================= -->

        <section class="major-main">

            <div class="container">


                <!-- SECTION HEADER -->

                <div class="major-section-header">

                    <div>

                        <span class="major-section-label">

                            KEAHLIAN SMKN 4 BOGOR

                        </span>


                        <h2>

                            Program keahlian unggulan

                        </h2>

                    </div>


                    <p>

                        Kenali berbagai bidang keahlian yang tersedia
                        dan temukan program yang sesuai dengan minat
                        serta potensi kamu.

                    </p>

                </div>



                <!-- =================================================
                     GRID JURUSAN
                     ================================================= -->

                <div class="major-grid">


                    <!-- =================================================
                         PPLG
                         ================================================= -->

                    <article class="major-card">


                        <div class="major-card-number">
                            01
                        </div>


                        <div class="major-card-top">

                            <div class="major-icon">

                                <i class="bi bi-code-slash"></i>

                            </div>


                            <span class="major-number-small">

                                PROGRAM 01

                            </span>

                        </div>


                        <div class="major-card-content">

                            <h3>
                                PPLG
                            </h3>


                            <span class="major-card-subtitle">

                                Pengembangan Perangkat Lunak & Gim

                            </span>


                            <p>

                                Siswa dibekali dengan pemahaman mendalam
                                tentang pengembangan perangkat lunak,
                                pembuatan aplikasi berbasis web dan mobile,
                                perancangan gim interaktif, hingga manajemen
                                basis data modern.

                            </p>

                        </div>


                    </article>



                    <!-- =================================================
                         TKT
                         ================================================= -->

                    <article class="major-card">


                        <div class="major-card-number">
                            02
                        </div>


                        <div class="major-card-top">

                            <div class="major-icon">

                                <i class="bi bi-diagram-3"></i>

                            </div>


                            <span class="major-number-small">

                                PROGRAM 02

                            </span>

                        </div>


                        <div class="major-card-content">

                            <h3>
                                TKT
                            </h3>


                            <span class="major-card-subtitle">

                                Teknik Jaringan Komputer & Telekomunikasi

                            </span>


                            <p>

                                Mempelajari sistem jaringan komputer,
                                administrasi server, teknologi wireless,
                                serat optik (fiber optic), serta dasar-dasar
                                keamanan siber (cybersecurity).

                            </p>

                        </div>


                    </article>



                    <!-- =================================================
                         TO
                         ================================================= -->

                    <article class="major-card">


                        <div class="major-card-number">
                            03
                        </div>


                        <div class="major-card-top">

                            <div class="major-icon">

                                <i class="bi bi-gear-wide-connected"></i>

                            </div>


                            <span class="major-number-small">

                                PROGRAM 03

                            </span>

                        </div>


                        <div class="major-card-content">

                            <h3>
                                TO
                            </h3>


                            <span class="major-card-subtitle">

                                Teknik Otomotif

                            </span>


                            <p>

                                Berfokus pada pemeliharaan dan perbaikan
                                mesin kendaraan bermotor, kelistrikan
                                otomotif, serta perbaikan sistem sasis
                                dan pemindahan tenaga sesuai standar industri.

                            </p>

                        </div>


                    </article>



                    <!-- =================================================
                         TP
                         ================================================= -->

                    <article class="major-card">


                        <div class="major-card-number">
                            04
                        </div>


                        <div class="major-card-top">

                            <div class="major-icon">

                                <i class="bi bi-tools"></i>

                            </div>


                            <span class="major-number-small">

                                PROGRAM 04

                            </span>

                        </div>


                        <div class="major-card-content">

                            <h3>
                                TP
                            </h3>


                            <span class="major-card-subtitle">

                                Teknik Pengelasan

                            </span>


                            <p>

                                Mempelajari teknik penyambungan logam
                                menggunakan berbagai teknik pengelasan
                                (SMAW, GMAW, GTAW), membaca cetak biru
                                industri, serta prosedur keselamatan kerja
                                manufaktur.

                            </p>

                        </div>


                    </article>


                </div>



                <!-- =================================================
                     INFO
                     ================================================= -->

                <div class="major-info">


                    <div class="major-info-icon">

                        <i class="bi bi-lightbulb"></i>

                    </div>


                    <div>

                        <h4>

                            Bekali diri dengan keterampilan masa depan

                        </h4>


                        <p>

                            Setiap program keahlian dirancang untuk
                            mengembangkan kemampuan siswa melalui
                            pembelajaran teori dan praktik yang relevan
                            dengan kebutuhan industri.

                        </p>

                    </div>


                </div>


            </div>

        </section>


    </main>



    <!-- =====================================================
         FOOTER
         ===================================================== -->
    <footer class="footer-modern">

        <div class="container">

            <div class="footer-modern-main">

                <!-- Brand -->
                <div class="footer-brand-modern">

                    <div class="footer-brand-logo">

                        <img src="{{ asset('images/logo-smkn4.svg') }}"
                            alt="Logo SMKN 4 Bogor">

                        <div>

                            <h5>
                                SMKN 4 KOTA BOGOR
                            </h5>

                            <span>
                                Pendidikan kejuruan masa depan.
                            </span>

                        </div>

                    </div>


                    <p>
                        Mencetak generasi unggul dalam teknologi,
                        berkarakter, dan siap bersaing di masa depan
                        melalui pendidikan kejuruan yang berkualitas.
                    </p>


                    <div class="footer-social-modern">

                        <a href="https://www.facebook.com/smknegeri4bogor/?locale=id_ID"
                            target="_blank"
                            aria-label="Facebook">

                            <i class="bi bi-facebook"></i>

                        </a>

                        <a href="https://www.instagram.com/smkn4kotabogor/"
                            target="_blank"
                            aria-label="Instagram">

                            <i class="bi bi-instagram"></i>

                        </a>

                        <a href="https://www.youtube.com/@smknegeri4bogor905"
                            target="_blank"
                            aria-label="YouTube">

                            <i class="bi bi-youtube"></i>

                        </a>

                    </div>

                </div>


                <!-- Navigation -->
                <div class="footer-column-modern">

                    <h6>
                        Navigasi
                    </h6>

                    <a href="{{ url('/') }}#Beranda">
                        Beranda
                    </a>

                    <a href="{{ url('/') }}#tentang">
                        Tentang Sekolah
                    </a>

                    <a href="{{ url('/berita') }}">
                        Berita
                    </a>

                    <a href="{{ url('/jurusan') }}">
                        Program Keahlian
                    </a>

                    <a href="{{ url('/galeri') }}">
                        Galeri
                    </a>

                </div>


                <!-- Jurusan -->
                <div class="footer-column-modern">

                    <h6>
                        Program Keahlian
                    </h6>

                    <span>PPLG</span>
                    <span>TJKT</span>
                    <span>TO</span>
                    <span>TP</span>

                </div>


                <!-- Contact -->
                <div class="footer-column-modern footer-contact-modern">

                    <h6>
                        Hubungi Kami
                    </h6>

                    <div class="footer-contact-item">

                        <i class="bi bi-geo-alt-fill"></i>

                        <span>
                            Jl. Raya Tajur, Kp. Muara,
                            RT.03/RW.04, Sindangrasa,
                            Bogor Timur, Kota Bogor
                        </span>

                    </div>


                    <div class="footer-contact-item">

                        <i class="bi bi-telephone-fill"></i>

                        <span>
                            +62 0858 9021 3624
                        </span>

                    </div>


                    <div class="footer-contact-item">

                        <i class="bi bi-envelope-fill"></i>

                        <span>
                            info@smkn4bogor.sch.id
                        </span>

                    </div>

                </div>

            </div>


            <!-- Footer Bottom -->
            <div class="footer-bottom-modern">

                <span>
                    © {{ date('Y') }} SMKN 4 Kota Bogor
                </span>

                <span class="footer-credit">
                    Dikembangkan oleh
                    <strong>
                        Tim GaleriEdukasiDigital
                    </strong>
                </span>

            </div>

        </div>

    </footer>



    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    ></script>


</body>

</html>