<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Galeri - SMK Negeri 4 Kota Bogor</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/css/galeri.css'])
</head>

<body class="gallery-page">

    <!-- =====================================================
         NAVBAR
         ===================================================== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3 fixed-top">

        <div class="container">

            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold"
                href="{{ url('/') }}">

                <img src="{{ asset('images/logo-smkn4.svg') }}"
                    alt="Logo SMKN 4 Bogor"
                    height="40">

                <div class="border-end border-white opacity-50 my-1"
                    style="height: 24px;">
                </div>

                <img src="{{ asset('images/logo-baru.png') }}"
                    alt="Logo FrameProject"
                    height="35">
            </a>


            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav position-absolute start-50 translate-middle-x">

                    <li class="nav-item">
                        <a class="nav-link mx-3 {{ request()->is('/') ? 'active' : '' }}"
                            href="{{ url('/') }}#Beranda">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3 {{ request()->is('berita*') ? 'active' : '' }}"
                            href="{{ url('/berita') }}">
                            Berita
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3 {{ request()->is('jurusan*') ? 'active' : '' }}"
                            href="{{ url('/jurusan') }}">
                            Jurusan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-3 {{ request()->is('galeri*') ? 'active' : '' }}"
                            href="{{ url('/galeri') }}">
                            Galeri
                        </a>
                    </li>

                </ul>


                <div class="ms-auto">

                    @if (Route::has('login'))

                        @auth

                            <a href="{{ route('admin.dashboard') }}"
                                class="btn btn-purple border-0 fw-semibold">

                                <i class="bi bi-speedometer2 me-1"></i>
                                Dashboard

                            </a>

                        @else

                            <a href="{{ route('login') }}"
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
         HERO GALERI
         ===================================================== -->
    <section class="gallery-hero">

        <div class="container">

            <div class="gallery-hero-content">

                <div class="gallery-hero-label">
                    <span></span>
                    DOKUMENTASI SEKOLAH
                </div>

                <h1>
                    Momen dan cerita
                    <br>
                    <span>SMKN 4 Bogor.</span>
                </h1>

                <p>
                    Jelajahi berbagai kegiatan, aktivitas, dan momen
                    yang menjadi bagian dari perjalanan SMK Negeri 4 Kota Bogor.
                </p>

            </div>

        </div>

    </section>


    <!-- =====================================================
         GALERI
         ===================================================== -->
    <main class="gallery-main">

        <div class="container">

            <!-- Header Section -->
            <div class="gallery-section-header">

                <div>
                    <span class="gallery-section-label">
                        GALERI SEKOLAH
                    </span>

                    <h2>
                        Dokumentasi kegiatan
                    </h2>
                </div>

                <div class="gallery-count">
                    <strong>{{ count($galeris ?? $galeri ?? []) }}</strong>
                    <span>Foto</span>
                </div>

            </div>


            <!-- Grid -->
            <div class="gallery-modern-grid">

                @forelse($galeris ?? $galeri ?? [] as $g)

                    <article class="gallery-modern-card">

                        <button type="button"
                            class="gallery-modern-image"
                            data-bs-toggle="modal"
                            data-bs-target="#galleryModal"

                            data-image="{{ asset('storage/' . $g->foto) }}"

                            data-title="{{ $g->nama_tempat }}"

                            data-date="{{ $g->created_at ? $g->created_at->format('d F Y') : '-' }}"

                            aria-label="Lihat {{ $g->nama_tempat }}">

                            <img src="{{ asset('storage/' . $g->foto) }}"
                                alt="{{ $g->nama_tempat }}">

                            <div class="gallery-modern-overlay">

                                <div class="gallery-view-button">
                                    <i class="bi bi-arrows-fullscreen"></i>
                                </div>

                                <span>
                                    Lihat Foto
                                </span>

                            </div>

                        </button>


                        <!-- Card Information -->
                        <div class="gallery-modern-info">

                            <div>

                                <span class="gallery-modern-category">
                                    KEGIATAN SEKOLAH
                                </span>

                                <h3>
                                    {{ $g->nama_tempat }}
                                </h3>

                            </div>

                            <div class="gallery-modern-date">

                                <i class="bi bi-calendar3"></i>

                                <span>
                                    {{ $g->created_at ? $g->created_at->format('d F Y') : '-' }}
                                </span>

                            </div>

                        </div>

                    </article>

                @empty

                    <div class="gallery-empty">

                        <div class="gallery-empty-icon">
                            <i class="bi bi-images"></i>
                        </div>

                        <h3>
                            Belum ada dokumentasi
                        </h3>

                        <p>
                            Foto kegiatan sekolah akan ditampilkan
                            di halaman ini.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </main>


    <!-- =====================================================
         MODAL GALERI
         ===================================================== -->
    <div class="modal fade gallery-popup-modal"
        id="galleryModal"
        tabindex="-1"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered gallery-popup-dialog">

            <div class="modal-content gallery-popup-content">

                <div class="gallery-popup">

                    <!-- Image -->
                    <img src=""
                        id="modalGalleryImage"
                        class="gallery-popup-image"
                        alt="Foto galeri">

                    <!-- Overlay -->
                    <div class="gallery-popup-overlay"></div>


                    <!-- Close -->
                    <button type="button"
                        class="gallery-popup-close"
                        data-bs-dismiss="modal"
                        aria-label="Tutup">

                        <i class="bi bi-x-lg"></i>

                    </button>


                    <!-- Brand -->
                    <div class="gallery-popup-top">

                        <div class="gallery-popup-brand">

                            <img src="{{ asset('images/logo-smkn4.svg') }}"
                                alt="Logo SMKN 4 Bogor">

                            <div>

                                <strong>
                                    SMKN 4 BOGOR
                                </strong>

                                <span>
                                    GALERI SEKOLAH
                                </span>

                            </div>

                        </div>

                    </div>


                    <!-- Information -->
                    <div class="gallery-popup-info">

                        <div class="gallery-popup-meta">

                            <span>
                                <i class="bi bi-images"></i>
                                Dokumentasi
                            </span>

                            <span>

                                <i class="bi bi-calendar3"></i>

                                <span id="modalGalleryDate"></span>

                            </span>

                        </div>


                        <h3 id="modalGalleryTitle"
                            class="gallery-popup-title">
                        </h3>


                        <div class="gallery-popup-description">

                            <div class="gallery-popup-line"></div>

                            <p>
                                SMK Negeri 4 Kota Bogor
                                <br>
                                Pendidikan • Kompetensi • Karakter
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">
    </script>


    <!-- Gallery Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const galleryModal = document.getElementById('galleryModal');

            if (!galleryModal) return;


            galleryModal.addEventListener('show.bs.modal', function (event) {

                const button = event.relatedTarget;

                if (!button) return;


                const image = button.getAttribute('data-image');
                const title = button.getAttribute('data-title');
                const date = button.getAttribute('data-date');


                document.getElementById('modalGalleryImage').src = image;

                document.getElementById('modalGalleryTitle').textContent = title;

                document.getElementById('modalGalleryDate').textContent = date;

            });


            galleryModal.addEventListener('hidden.bs.modal', function () {

                document.getElementById('modalGalleryImage').src = '';

            });

        });
    </script>

</body>

</html>