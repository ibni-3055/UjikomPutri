<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Berita & Informasi - SMK Negeri 4 Kota Bogor</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Laravel Vite -->
    @vite([
        'resources/css/app.css',
        'resources/css/berita.css'
    ])

</head>


<body class="d-flex flex-column min-vh-100">


    <!-- =====================================================
         NAVBAR
         ===================================================== -->

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 fixed-top">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold"
               href="{{ url('/') }}">

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


            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">

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
         HERO BERITA
         ===================================================== -->

    <main class="news-page">

        <section class="news-hero">

            <div class="container">

                <div class="news-hero-content">

                    <div class="news-hero-label">

                        <span></span>

                        INFORMASI SEKOLAH

                    </div>


                    <h1>

                        Berita dan informasi
                        <span>SMKN 4 Bogor.</span>

                    </h1>


                    <p>

                        Temukan informasi terbaru mengenai kegiatan,
                        prestasi, agenda, pengumuman, dan berbagai kabar
                        dari SMK Negeri 4 Kota Bogor.

                    </p>

                </div>

            </div>

        </section>



        <!-- =================================================
             NEWS MAIN
             ================================================= -->

        <section
            id="Berita"
            class="news-main"
        >

            <div class="container">


                <!-- HEADER -->

                <div class="news-section-header">

                    <div>

                        <span class="news-section-label">
                            BERITA TERBARU
                        </span>

                        <h2>
                            Kabar terbaru sekolah
                        </h2>

                    </div>


                    <div class="news-count">

                        <strong>
                            {{ $beritas->count() }}
                        </strong>

                        berita

                    </div>

                </div>



                <!-- GRID -->

                <div class="news-modern-grid">


                    @forelse ($beritas as $item)


                        @php

                            $fotoPath =
                                $item->foto
                                ?? $item->gambar
                                ?? $item->image
                                ?? null;

                            $isiBerita =
                                $item->isi
                                ?? $item->ringkasan
                                ?? $item->deskripsi
                                ?? '';

                            $beritaUrl =
                                url('/berita/' . ($item->slug ?? $item->id));

                        @endphp



                        <!-- CARD -->

                        <article class="news-modern-card">


                            <!-- IMAGE -->

                            <div class="news-modern-image">


                                @if ($fotoPath)

                                    <img
                                        src="{{ asset('storage/' . $fotoPath) }}"
                                        alt="{{ $item->judul }}"
                                    >

                                @else

                                    <img
                                        src="{{ asset('images/hero-sekolah.jpg') }}"
                                        alt="{{ $item->judul }}"
                                    >

                                @endif


                                <!-- CATEGORY -->

                                <div class="news-category">

                                    BERITA SEKOLAH

                                </div>


                                <!-- HOVER -->

                                <a
                                    href="{{ $beritaUrl }}"
                                    class="news-modern-overlay text-decoration-none"
                                    aria-label="Baca {{ $item->judul }}"
                                >

                                    <div class="news-read-icon">

                                        <i class="bi bi-arrow-up-right"></i>

                                    </div>

                                </a>


                            </div>



                            <!-- INFORMATION -->

                            <div class="news-modern-info">


                                <!-- DATE -->

                                <div class="news-modern-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ $item->created_at->format('d F Y') }}

                                </div>


                                <!-- TITLE -->

                                <h3>

                                    {{ $item->judul }}

                                </h3>


                                <!-- DESCRIPTION -->

                                <p class="news-modern-description">

                                    {{ Str::limit(strip_tags($isiBerita), 130) }}

                                </p>


                            </div>

                        </article>


                    @empty


                        <!-- EMPTY STATE -->

                        <div class="news-empty">

                            <div class="news-empty-icon">

                                <i class="bi bi-newspaper"></i>

                            </div>


                            <h3>
                                Belum ada berita
                            </h3>


                            <p>
                                Belum ada berita terbaru yang
                                diunggah oleh pihak sekolah.
                            </p>

                        </div>


                    @endforelse


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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>