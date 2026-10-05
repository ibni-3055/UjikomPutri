<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $berita->judul }} - SMKN 4 Kota Bogor</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- CSS -->
    @vite([
        'resources/css/app.css',
        'resources/css/berita-show.css'
    ])
</head>


<body class="news-detail-page">

    <!-- =====================================================
         NAVBAR
    ====================================================== -->

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 fixed-top">

        <div class="container">

            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold"
               href="{{ url('/') }}">

                <img
                    src="{{ asset('images/logo-smkn4.svg') }}"
                    alt="Logo SMKN 4 Bogor"
                    height="40">

                <div
                    class="border-end border-white opacity-50 my-1"
                    style="height: 24px;">
                </div>

                <img
                    src="{{ asset('images/LogoFrame.png') }}"
                    alt="Logo FrameProject"
                    height="35">

            </a>


            <!-- Mobile Toggle -->
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

                <span class="navbar-toggler-icon"></span>

            </button>


            <div
                class="collapse navbar-collapse"
                id="navbarNav">


                <!-- Navigation -->
                <ul class="navbar-nav position-absolute start-50 translate-middle-x">

                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}#Beranda">

                            Beranda

                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('berita*') ? 'active' : '' }}"
                            href="{{ url('/berita') }}">

                            Berita

                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('jurusan*') ? 'active' : '' }}"
                            href="{{ url('/jurusan') }}">

                            Jurusan

                        </a>

                    </li>


                    <li class="nav-item">

                        <a
                            class="nav-link mx-3 {{ request()->is('galeri*') ? 'active' : '' }}"
                            href="{{ url('/galeri') }}">

                            Galeri

                        </a>

                    </li>

                </ul>


                <!-- Login -->
                <div class="ms-auto">

                    @if (Route::has('login'))

                        @auth

                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="btn btn-purple border-0 fw-semibold">

                                <i class="bi bi-speedometer2 me-1"></i>
                                Dashboard

                            </a>

                        @else

                            <a
                                href="{{ route('login') }}"
                                class="btn btn-purple border-0 fw-semibold">

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
    ====================================================== -->

    <main class="news-detail-main">

        <div class="container">

            <!-- Breadcrumb -->
            <div class="news-breadcrumb">

                <a href="{{ url('/') }}">
                    Beranda
                </a>

                <i class="bi bi-chevron-right"></i>

                <a href="{{ url('/berita') }}">
                    Berita
                </a>

                <i class="bi bi-chevron-right"></i>

                <span>
                    Detail
                </span>

            </div>


            <!-- =================================================
                 ARTICLE HEADER
            ================================================== -->

            <header class="news-detail-header">

                <div class="news-category">

                    <span class="news-category-line"></span>

                    <span>
                        BERITA SEKOLAH
                    </span>

                </div>


                <h1 class="news-detail-title">
                    {{ $berita->judul }}
                </h1>


                <div class="news-detail-meta">

                    <div class="news-meta-item">

                        <div class="news-meta-icon">
                            <i class="bi bi-calendar3"></i>
                        </div>

                        <div>

                            <span class="news-meta-label">
                                DIPUBLIKASIKAN
                            </span>

                            <strong>

                                {{ isset($berita->tanggal_upload)
                                    ? \Carbon\Carbon::parse($berita->tanggal_upload)->format('d F Y')
                                    : $berita->created_at->format('d F Y')
                                }}

                            </strong>

                        </div>

                    </div>


                    <div class="news-meta-divider"></div>


                    <div class="news-meta-item">

                        <div class="news-meta-icon">
                            <i class="bi bi-person"></i>
                        </div>

                        <div>

                            <span class="news-meta-label">
                                PENULIS
                            </span>

                            <strong>
                                Admin SMKN 4
                            </strong>

                        </div>

                    </div>

                </div>

            </header>



            <!-- =================================================
                 FEATURE IMAGE
            ================================================== -->

            @php
    $fotoPath = $berita->foto ?? $berita->gambar ?? $berita->image ?? null;
@endphp

<div class="article-main-image">
    @if($fotoPath)
        <img 
            src="{{ asset('storage/' . $fotoPath) }}" 
            alt="{{ $berita->judul }}"
        >
    @else
        <img 
            src="{{ asset('images/hero-sekolah.jpg') }}" 
            alt="{{ $berita->judul }}"
        >
    @endif
</div>



            <!-- =================================================
                 ARTICLE CONTENT
            ================================================== -->

            <div class="news-content-layout">


                <!-- Article -->
                <article class="news-article">

                    <div class="news-article-heading">

                        <span>
                            INFORMASI
                        </span>

                        <h2>
                            {{ $berita->judul }}
                        </h2>

                    </div>


                    <div class="article-content">

                        {!! e(
                            $berita->deskripsi
                            ?? $berita->isi
                            ?? $berita->ringkasan
                        ) !!}

                    </div>


                    <!-- Article Footer -->
                    <div class="news-article-footer">

                        <div class="news-share-label">

                            <span>
                                BERITA SMKN 4 BOGOR
                            </span>

                            <strong>
                                Terima kasih telah membaca.
                            </strong>

                        </div>

                        <div class="news-share-icon">
                            <i class="bi bi-newspaper"></i>
                        </div>

                    </div>

                </article>


                <!-- Sidebar -->
                <aside class="news-detail-sidebar">

                    <div class="news-sidebar-card">

                        <div class="news-sidebar-icon">

                            <i class="bi bi-info-lg"></i>

                        </div>

                        <span>
                            TENTANG BERITA
                        </span>

                        <h3>
                            Informasi sekolah dalam satu tempat.
                        </h3>

                        <p>
                            Ikuti berbagai informasi, kegiatan,
                            prestasi, dan kabar terbaru dari
                            SMK Negeri 4 Kota Bogor.
                        </p>

                    </div>


                    <a
                        href="{{ url('/berita') }}"
                        class="news-back-card">

                        <div>

                            <span>
                                KEMBALI KE
                            </span>

                            <strong>
                                Semua Berita
                            </strong>

                        </div>

                        <i class="bi bi-arrow-up-right"></i>

                    </a>

                </aside>

            </div>



            <!-- =================================================
                 BACK BUTTON
            ================================================== -->

            <div class="news-bottom-navigation">

                <a
                    href="{{ url('/berita') }}"
                    class="news-back-button">

                    <i class="bi bi-arrow-left"></i>

                    <span>
                        Kembali ke Berita
                    </span>

                </a>

            </div>

        </div>

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
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>