<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Beranda - SMK Negeri 4 Kota Bogor</title>

    <!-- Favicon -->
<link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-baru.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    @vite([
    'resources/css/app.css',
    'resources/css/galeri.css'
    ])

    <style>
        :root {
            --ink: #15122b;
            --muted: #727086;
            --purple: #5b35d5;
            --purple-dark: #4020ad;
            --purple-soft: #eeeaff;
            --violet: #7c5ce6;
            --surface: #ffffff;
            --soft: #f6f5fb;
            --line: #e9e7f1;
            --radius: 26px;
            --shadow: 0 18px 50px rgba(34, 25, 74, .08);
        }

        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            color: var(--ink);
            background: #fff;
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }
        h1,h2,h3,h4,h5,h6 { font-family: 'Manrope', sans-serif; }
        a { transition: .25s ease; }
        .section-space { padding: 105px 0; }
        .section-soft { background: var(--soft); }
        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 8px 13px;
            border: 1px solid #ddd7f8;
            border-radius: 999px;
            background: #faf9ff;
            color: var(--purple);
            font-size: .78rem;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }
        .eyebrow::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--purple);
        }
        .section-title {
            margin: 15px 0 10px;
            font-size: clamp(2rem, 4vw, 3.2rem);
            font-weight: 800;
            letter-spacing: -.045em;
            line-height: 1.08;
        }
        .section-desc {
            max-width: 680px;
            color: var(--muted);
            line-height: 1.8;
        }
        .btn-purple {
            background: linear-gradient(135deg, var(--purple), #7451df);
            color: #fff !important;
            border: 0;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(91,53,213,.22);
            transition: transform .25s ease, box-shadow .25s ease;
        }
        .btn-purple:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 30px rgba(91,53,213,.30);
        }

        /* NAVBAR */
        .navbar-custom {
            position: fixed;
            top: 18px;
            left: 50%;
            transform: translateX(-50%);
            width: min(1180px, calc(100% - 32px));
            padding: 9px 10px;
            border: 1px solid rgba(255,255,255,.18);
            border-radius: 20px;
            background: rgba(16, 13, 32, .60);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            box-shadow: 0 15px 45px rgba(0,0,0,.15);
            z-index: 1030;
        }
        .brand-divider { width: 1px; height: 28px; background: rgba(255,255,255,.3); }
        .nav-link-custom {
            position: relative;
            color: rgba(255,255,255,.72) !important;
            font-size: .9rem;
            font-weight: 700;
            padding: 10px 13px !important;
            border-radius: 11px;
        }
        .nav-link-custom:hover, .nav-link-custom.active {
            color: #fff !important;
            background: rgba(255,255,255,.10);
        }
        .nav-link-custom.active::after {
            content: "";
            position: absolute;
            left: 13px; right: 13px; bottom: 3px;
            height: 2px; border-radius: 99px;
            background: #b8a5ff;
        }

        /* HERO */
        .hero-header {
            position: relative;
            min-height: 850px;
            height: 100vh;
            max-height: 980px;
            display: flex;
            align-items: center;
            overflow: hidden;
            background:
                linear-gradient(90deg, rgba(12,9,28,.88) 0%, rgba(17,12,37,.68) 42%, rgba(17,12,37,.25) 100%),
                url('{{ asset('images/hero-sekolah.jpg') }}') center/cover no-repeat;
        }
        .hero-header::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 15% 25%, rgba(117,79,225,.35), transparent 34%),
                radial-gradient(circle at 85% 75%, rgba(116,72,221,.18), transparent 30%);
            pointer-events: none;
        }
        .hero-header::after {
            content: "";
            position: absolute;
            left: 0; right: 0; bottom: 0;
            height: 180px;
            background: linear-gradient(transparent, #fff);
            pointer-events: none;
        }
        .hero-content { position: relative; z-index: 2; padding-top: 85px; }
        .hero-kicker {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 13px;
            border-radius: 999px;
            background: rgba(255,255,255,.10);
            border: 1px solid rgba(255,255,255,.18);
            color: #fff;
            font-size: .78rem;
            font-weight: 700;
            backdrop-filter: blur(10px);
        }
        .hero-kicker i { color: #bca9ff; }
        .hero-title {
            max-width: 920px;
            margin: 20px 0 20px;
            color: #fff;
            font-family: 'Manrope', sans-serif !important;
            font-size: clamp(3.7rem, 8vw, 7.6rem);
            font-weight: 800;
            letter-spacing: -.065em;
            line-height: .93;
        }
        .hero-title .accent { color: #c7b8ff; }
        .hero-copy {
            max-width: 620px;
            color: rgba(255,255,255,.74);
            font-size: 1rem;
            line-height: 1.8;
        }
        .hero-actions { display:flex; flex-wrap:wrap; gap:12px; margin-top:28px; }
        .hero-outline {
            color:#fff !important;
            border:1px solid rgba(255,255,255,.28);
            background:rgba(255,255,255,.08);
            border-radius:14px;
            padding:12px 19px;
            backdrop-filter:blur(10px);
        }
        .hero-outline:hover { background:rgba(255,255,255,.15); }
        .hero-stat {
            position: absolute;
            right: 5%;
            bottom: 100px;
            z-index: 3;
            width: 235px;
            padding: 19px;
            color:#fff;
            border:1px solid rgba(255,255,255,.16);
            background:rgba(20,14,42,.48);
            backdrop-filter:blur(16px);
            border-radius:20px;
        }
        .hero-stat-number { font-size:2.3rem; font-weight:800; line-height:1; }
        .hero-stat small { color:rgba(255,255,255,.62); }

        /* ABOUT */
        .about-image-wrap { position:relative; }
        .about-image {
            width:100%; height:520px; object-fit:cover;
            border-radius:32px;
            box-shadow: var(--shadow);
        }
        .about-badge {
            position:absolute; left:-18px; bottom:28px;
            width:190px; padding:17px;
            border-radius:18px;
            background:#fff;
            box-shadow:0 18px 40px rgba(25,18,61,.15);
        }
        .about-badge .icon {
            width:42px;height:42px;border-radius:13px;
            display:grid;place-items:center;
            background:var(--purple-soft);color:var(--purple);
            margin-bottom:10px;
        }
        .value-row { display:grid; grid-template-columns:1fr 1fr; gap:12px; margin-top:25px; }
        .value-card {
            padding:19px;
            border:1px solid var(--line);
            border-radius:18px;
            background:#fff;
        }
        .value-card i { color:var(--purple); font-size:1.35rem; }
        .value-card h6 { margin:9px 0 5px; font-weight:800; }
        .value-card p { margin:0; color:var(--muted); font-size:.84rem; line-height:1.65; }

        /* NEWS */
        .news-card {
            height:100%;
            border:1px solid var(--line);
            border-radius:24px;
            overflow:hidden;
            background:#fff;
            box-shadow:0 8px 28px rgba(30,20,70,.045);
            transition:.3s ease;
        }
        .news-card:hover { transform:translateY(-7px); box-shadow:var(--shadow); border-color:#dcd5fa; }
        .news-image-wrap { height:225px; overflow:hidden; position:relative; }
        .news-image { width:100%;height:100%;object-fit:cover; transition:.5s ease; }
        .news-card:hover .news-image { transform:scale(1.055); }
        .news-date {
            position:absolute; top:14px; left:14px;
            padding:7px 10px; border-radius:10px;
            background:rgba(255,255,255,.92);
            color:var(--purple); font-size:.72rem; font-weight:800;
            backdrop-filter:blur(10px);
        }
        .news-body { padding:22px; }
        .news-body h5 { font-size:1.08rem; line-height:1.4; font-weight:800; }
        .news-body p { color:var(--muted); font-size:.88rem; line-height:1.7; }
        .read-link { color:var(--purple); text-decoration:none; font-size:.85rem; font-weight:800; }
        .read-link:hover { color:var(--purple-dark); }

        /* PROGRAM */
        .program-grid { display:grid; grid-template-columns:repeat(4,1fr); gap:16px; }
        .program-card {
            min-height:310px; padding:25px;
            position:relative; overflow:hidden;
            border:1px solid var(--line);
            border-radius:24px;
            background:#fff;
            transition:.3s ease;
        }
        .program-card::after {
            content:"";
            position:absolute; width:110px;height:110px;
            right:-45px;bottom:-45px;border-radius:50%;
            background:var(--purple-soft); transition:.3s ease;
        }
        .program-card:hover { transform:translateY(-6px); box-shadow:var(--shadow); border-color:#d9d0ff; }
        .program-card:hover::after { transform:scale(1.35); }
        .program-icon {
            width:58px;height:58px;border-radius:17px;
            display:grid;place-items:center;
            background:var(--purple-soft);color:var(--purple);
            font-size:1.5rem;margin-bottom:28px;
        }
        .program-code { color:var(--purple);font-weight:800;font-size:.76rem;letter-spacing:.12em; }
        .program-card h5 { margin:8px 0 10px;font-weight:800; }
        .program-card p { color:var(--muted);font-size:.86rem;line-height:1.7; }

        /* GALLERY */
        .gallery-card-home {
            height:390px; position:relative; overflow:hidden;
            border-radius:26px; background:#eee;
            cursor:pointer; border:0; padding:0;
        }
        .gallery-home-image { width:100%;height:100%;object-fit:cover;transition:.6s ease; }
        .gallery-card-home::after {
            content:""; position:absolute; inset:0;
            background:linear-gradient(180deg,transparent 35%,rgba(11,8,25,.85) 100%);
        }
        .gallery-preview:hover .gallery-home-image { transform:scale(1.07); }
        .gallery-content { position:absolute;z-index:2;left:22px;right:22px;bottom:20px; }
        .gallery-content h5 { color:#fff;font-weight:800;margin-bottom:5px; }
        .gallery-content span { color:rgba(255,255,255,.72);font-size:.8rem; }
        .gallery-zoom-icon {
            position:absolute;z-index:3;right:17px;top:17px;
            width:42px;height:42px;border-radius:13px;
            display:grid;place-items:center;
            color:#fff;background:rgba(17,12,37,.48);
            opacity:0; transform:translateY(-5px); transition:.25s ease;
        }
        .gallery-preview:hover .gallery-zoom-icon { opacity:1;transform:none; }

        /* RATING */
        .rating-section {
            padding:85px 0;
            background:linear-gradient(135deg,#1a1334 0%,#332071 55%,#5b35d5 100%);
            color:#fff;
        }
        .rating-box {
            max-width:760px; margin:auto; padding:40px 25px;
            text-align:center; border:1px solid rgba(255,255,255,.12);
            border-radius:30px; background:rgba(255,255,255,.07);
            backdrop-filter:blur(12px);
        }
        .star-btn { color:#ffd166; cursor:pointer; transition:.18s ease; font-size:2.1rem; }
        .star-btn:hover { transform:scale(1.18) rotate(-4deg); }
        #ratingMessage { max-width:430px; margin:15px auto 0; }

        /* MODAL */
        .gallery-modal-content { border:0;border-radius:26px;overflow:hidden;background:#fff; }
        .gallery-modal-image { width:100%;height:620px;object-fit:contain;background:#0d0b16; }
        .gallery-modal-info { height:100%;padding:28px;display:flex;flex-direction:column; }
        .gallery-modal-title { color:var(--ink);font-size:1.3rem;font-weight:800;overflow-wrap:anywhere; }

        /* FOOTER */
        footer { background:#100d1f; }
        .footer-brand p, footer .text-secondary { color:#9c98ab !important; line-height:1.75; }
        .footer-title { color:#bba8ff;font-size:.72rem;letter-spacing:.12em;font-weight:800;text-transform:uppercase; }
        .footer-link { color:#a7a2b5 !important;text-decoration:none; }
        .footer-link:hover { color:#fff !important; }
        .social-link {
            width:40px;height:40px;border-radius:12px;
            display:grid;place-items:center;
            color:#fff;text-decoration:none;
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.08);
        }
        .social-link:hover { background:var(--purple); transform:translateY(-2px); }

        @media (max-width: 991.98px) {
            .navbar-custom { top:10px; width:calc(100% - 20px); }
            .navbar-collapse { margin-top:9px;padding:12px;border-radius:15px;background:rgba(16,13,32,.96); }
            .hero-header { min-height:780px; }
            .hero-stat { display:none; }
            .program-grid { grid-template-columns:repeat(2,1fr); }
            .about-image { height:430px; }
            .about-badge { left:15px; }
        }
        @media (max-width: 767.98px) {
            .section-space { padding:75px 0; }
            .hero-header { min-height:760px;height:auto;padding-bottom:80px;background-position:62% center; }
            .hero-content { padding-top:150px; }
            .hero-title { font-size:clamp(3.2rem,16vw,5rem); }
            .hero-copy { font-size:.92rem; }
            .hero-actions .btn { width:100%; }
            .program-grid { grid-template-columns:1fr; }
            .value-row { grid-template-columns:1fr; }
            .about-image { height:350px; }
            .about-badge { position:relative; left:0; bottom:auto; margin:-35px 15px 0; width:auto; z-index:2; }
            .gallery-card-home { height:320px; }
            .gallery-modal-image { height:330px; }
            .gallery-modal-info { padding:20px; }
        }
    </style>
</head>

<body>
<header id="Beranda" class="hero-header">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
        <div class="container-fluid px-2 px-md-3">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                <img src="{{ asset('images/logo-smkn4.svg') }}" alt="Logo SMKN 4 Bogor" style="height:40px;width:auto;">
                <span class="brand-divider d-none d-sm-block"></span>
                <img src="{{ asset('images/logo-baru.png') }}" alt="Logo FrameProject" style="height:30px;width:auto;max-width:115px;">
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Buka menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto align-items-lg-center">
                    <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->is('/') ? 'active' : '' }}" href="#Beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->is('berita*') ? 'active' : '' }}" href="{{ url('/berita') }}">Berita</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->is('jurusan*') ? 'active' : '' }}" href="{{ url('/jurusan') }}">Jurusan</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->is('galeri*') ? 'active' : '' }}" href="{{ url('/galeri') }}">Galeri</a></li>
                </ul>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-purple px-4 py-2 fw-bold">
                            <i class="bi bi-grid-1x2-fill me-1"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-purple px-4 py-2 fw-bold">
                            <i class="bi bi-arrow-right-circle me-1"></i> Masuk
                        </a>
                    @endauth
                @endif
            </div>
        </div>
    </nav>

    <div class="container hero-content">
        <div class="row">
            <div class="col-lg-9">
                <div class="hero-kicker">
                    <i class="bi bi-stars"></i>
                    Website Resmi SMK Negeri 4 Kota Bogor
                </div>
                <h1 class="hero-title">
                    Sekolah Kejuruan.<br>
                    <span class="accent">Masa Depan Dimulai.</span>
                </h1>
                <p class="hero-copy">
                    Mencetak generasi unggul dalam teknologi, berkarakter, dan siap bersaing di masa depan melalui pendidikan kejuruan yang relevan dengan perkembangan industri.
                </p>
                <div class="hero-actions">
                    <a href="#tentang" class="btn btn-purple px-4 py-3 fw-bold">
                        Kenali Sekolah Kami <i class="bi bi-arrow-down-short ms-2"></i>
                    </a>
                    <a href="{{ url('/berita') }}" class="btn hero-outline px-4 py-3 fw-bold">
                        Lihat Berita <i class="bi bi-arrow-up-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-stat d-none d-xl-block">
        <div class="d-flex align-items-center gap-2 mb-3">
            <i class="bi bi-mortarboard-fill text-white"></i>
            <small>Pendidikan • Kompetensi • Karakter</small>
        </div>
        <div class="hero-stat-number">SMKN 4</div>
        <small>Kota Bogor</small>
    </div>
</header>

<section id="tentang" class="about-modern section-space">
    <div class="container">

        <div class="about-modern-header">

            <div>
                <div class="about-modern-label">
                    Tentang Sekolah
                </div>

                <h2 class="about-modern-title">
                    Membangun <span>kompetensi</span>, karakter,
                    dan keberanian untuk berkembang.
                </h2>
            </div>

            <p class="about-modern-intro">
                SMK Negeri 4 Kota Bogor hadir untuk membantu siswa
                mengembangkan potensi, kompetensi, dan karakter agar
                siap menghadapi perkembangan teknologi serta dunia kerja.
            </p>

        </div>

        <div class="about-modern-grid">

            <div class="about-modern-visual">

                <div class="about-modern-image-box">

                    <div class="about-modern-number">
                        01
                    </div>

                    <img
                        src="{{ asset('images/hero-sekolah.jpg') }}"
                        alt="Gedung SMKN 4 Bogor"
                        class="about-modern-image"
                    >

                </div>

                <div class="about-modern-school-card">

                    <div class="icon">
                        <i class="bi bi-building"></i>
                    </div>

                    <h6>SMKN 4 Bogor</h6>

                    <p>
                        Pendidikan kejuruan yang berorientasi
                        pada masa depan, kompetensi, dan karakter siswa.
                    </p>

                </div>

            </div>

            <div class="about-modern-content">

                <div class="about-modern-small-title">
                    Mengenal SMKN 4 Bogor
                </div>

                <h3>
                    Tempat untuk belajar, berkembang,
                    dan mempersiapkan masa depan.
                </h3>

                <p>
                    SMK Negeri 4 Kota Bogor merupakan sekolah menengah
                    kejuruan yang berkomitmen mengembangkan potensi siswa
                    melalui pendidikan berkualitas, pembentukan karakter,
                    serta kompetensi yang sesuai dengan kebutuhan dunia
                    kerja dan perkembangan teknologi.
                </p>


                <div class="about-modern-focus">

                    <div class="about-focus-item">
                        <i class="bi bi-cpu"></i>
                        Teknologi
                    </div>

                    <div class="about-focus-item">
                        <i class="bi bi-person-check"></i>
                        Kompetensi
                    </div>

                    <div class="about-focus-item">
                        <i class="bi bi-heart"></i>
                        Karakter
                    </div>

                    <div class="about-focus-item">
                        <i class="bi bi-briefcase"></i>
                        Dunia Kerja
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>

<section id="Berita" class="section-space section-soft">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-5">
            <div>
                <span class="eyebrow">Informasi Terkini</span>
                <h2 class="section-title mb-0">Berita Sekolah</h2>
                <p class="section-desc mt-3 mb-0">Informasi terbaru seputar kegiatan, prestasi, dan pengumuman SMK Negeri 4 Kota Bogor.</p>
            </div>
            @if(isset($beritas) && $beritas->isNotEmpty())
                <a href="{{ url('/berita') }}" class="btn btn-purple px-4 py-2 fw-bold flex-shrink-0">Semua Berita <i class="bi bi-arrow-up-right ms-1"></i></a>
            @endif
        </div>

        <div class="row g-4">
            @forelse ($beritas->take(3) as $item)
                @php $fotoPath = $item->foto ?? $item->gambar ?? $item->image ?? null; @endphp
                <div class="col-md-6 col-lg-4">
                    <article class="news-card">
                        <div class="news-image-wrap">
                            <span class="news-date"><i class="bi bi-calendar3 me-1"></i>{{ $item->created_at->format('d M Y') }}</span>
                            <img src="{{ $fotoPath ? asset('storage/' . $fotoPath) : asset('images/hero-sekolah.jpg') }}" alt="{{ $item->judul }}" class="news-image">
                        </div>
                        <div class="news-body d-flex flex-column">
                            <h5>{{ $item->judul }}</h5>
                            <p>{{ Str::limit(strip_tags($item->isi ?? $item->ringkasan ?? $item->deskripsi), 115) }}</p>
                            <a href="{{ url('/berita/' . ($item->slug ?? $item->id)) }}" class="read-link mt-auto">Baca selengkapnya <i class="bi bi-arrow-right ms-1"></i></a>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted"><i class="bi bi-newspaper fs-1 d-block mb-2"></i>Belum ada berita terbaru yang diunggah.</div>
            @endforelse
        </div>
    </div>
</section>

<section id="jurusan" class="section-space">
    <div class="container">
        <div class="text-center mb-5">
            <span class="eyebrow">Pilih Keahlianmu</span>
            <h2 class="section-title">Program Keahlian</h2>
            <p class="section-desc mx-auto">Pilihan jurusan yang membekali siswa dengan kemampuan praktis dan pengetahuan yang relevan dengan kebutuhan industri modern.</p>
        </div>

        <div class="program-grid">
            <div class="program-card">
                <div class="program-icon"><i class="bi bi-code-slash"></i></div>
                <span class="program-code">01 / PPLG</span>
                <h5>Pengembangan Perangkat Lunak & Gim</h5>
                <p>Fokus pada pemrograman web, aplikasi mobile, pembuatan gim, dan pengelolaan database modern.</p>
            </div>
            <div class="program-card">
                <div class="program-icon"><i class="bi bi-diagram-3"></i></div>
                <span class="program-code">02 / TJKT</span>
                <h5>Teknik Jaringan Komputer & Telekomunikasi</h5>
                <p>Mempelajari infrastruktur jaringan, server, keamanan siber, dan teknologi fiber optik.</p>
            </div>
            <div class="program-card">
                <div class="program-icon"><i class="bi bi-gear-wide-connected"></i></div>
                <span class="program-code">03 / TO</span>
                <h5>Teknik Otomotif</h5>
                <p>Pendalaman seputar pemeliharaan mesin kendaraan, sistem kelistrikan otomotif, dan teknologi kendaraan terkini.</p>
            </div>
            <div class="program-card">
                <div class="program-icon"><i class="bi bi-tools"></i></div>
                <span class="program-code">04 / TP</span>
                <h5>Teknik Pengelasan</h5>
                <p>Menguasai teknik penyambungan logam, fabrikasi struktur baja, dan standar fabrikasi industri.</p>
            </div>
        </div>
    </div>
</section>

<section id="galeri" class="section-space section-soft">
    <div class="container">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-5">
            <div>
                <span class="eyebrow">Dokumentasi</span>
                <h2 class="section-title mb-0">Galeri Sekolah</h2>
                <p class="section-desc mt-3 mb-0">Dokumentasi kegiatan, fasilitas, dan momen berharga di lingkungan SMK Negeri 4 Kota Bogor.</p>
            </div>
            @if(isset($galeris) && $galeris->isNotEmpty())
                <a href="{{ url('/galeri') }}" class="btn btn-purple px-4 py-2 fw-bold flex-shrink-0">Lihat Semua <i class="bi bi-arrow-up-right ms-1"></i></a>
            @endif
        </div>

        <div class="row g-4">
            @forelse ($galeris->take(3) as $item)
                @php
                    $fotoPath = $item->foto ?? $item->gambar ?? $item->image ?? null;
                    $namaFoto = $item->nama_tempat ?? $item->judul ?? $item->nama ?? $item->keterangan ?? 'Dokumentasi Sekolah';
                    $fotoUrl = $fotoPath ? asset('storage/' . $fotoPath) : asset('images/hero-sekolah.jpg');
                    $tanggalFoto = $item->created_at ? $item->created_at->format('d M Y') : '-';
                @endphp
                <div class="col-md-6 col-lg-4">
                    <button type="button" class="gallery-preview w-100 text-start border-0 bg-transparent"
                        data-bs-toggle="modal" data-bs-target="#galleryDetailModal"
                        data-image="{{ $fotoUrl }}" data-title="{{ $namaFoto }}" data-date="{{ $tanggalFoto }}">
                        <div class="gallery-card-home">
                            <img src="{{ $fotoUrl }}" alt="{{ $namaFoto }}" class="gallery-home-image">
                            <div class="gallery-content">
                                <h5>{{ $namaFoto }}</h5>
                                <span><i class="bi bi-calendar3 me-1"></i>{{ $tanggalFoto }}</span>
                            </div>
                            <div class="gallery-zoom-icon"><i class="bi bi-arrows-fullscreen"></i></div>
                        </div>
                    </button>
                </div>
            @empty
                <div class="col-12 text-center py-5 text-muted"><i class="bi bi-images fs-1 d-block mb-2"></i>Belum ada foto galeri yang diunggah.</div>
            @endforelse
        </div>
    </div>
</section>

<div class="modal fade gallery-popup-modal" id="galleryDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered gallery-popup-dialog">
        <div class="modal-content gallery-popup-content">

            <div class="gallery-popup">

                <!-- FOTO -->
                <img
                    src=""
                    alt="Foto galeri sekolah"
                    id="galleryModalImage"
                    class="gallery-popup-image"
                >

                <!-- OVERLAY -->
                <div class="gallery-popup-overlay"></div>

                <!-- CLOSE -->
                <button
                    type="button"
                    class="gallery-popup-close"
                    data-bs-dismiss="modal"
                    aria-label="Tutup"
                >
                    <i class="bi bi-x-lg"></i>
                </button>

                <!-- TOP INFO -->
                <div class="gallery-popup-top">

                    <div class="gallery-popup-brand">

                        <img
                            src="{{ asset('images/logo-smkn4.svg') }}"
                            alt="Logo SMKN 4"
                        >

                        <div>
                            <strong>SMKN 4 BOGOR</strong>
                            <span>GALERI SEKOLAH</span>
                        </div>

                    </div>

                </div>


                <!-- BOTTOM CONTENT -->
                <div class="gallery-popup-info">

                    <div class="gallery-popup-meta">

                        <span>
                            <i class="bi bi-images"></i>
                            Dokumentasi
                        </span>

                        <span>
                            <i class="bi bi-calendar3"></i>
                            <span id="galleryModalDate"></span>
                        </span>

                    </div>


                    <h3
                        id="galleryModalTitle"
                        class="gallery-popup-title"
                    ></h3>


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

<section class="rating-section">
    <div class="container">
        <div class="rating-box">
            <span class="eyebrow" style="color:#d0c3ff;background:rgba(255,255,255,.06);border-color:rgba(255,255,255,.15);">Suara Pengunjung</span>
            <h2 class="mt-3 mb-2 fw-bold">Bagaimana pengalaman Anda?</h2>
            <p class="mb-4" style="color:rgba(255,255,255,.65);">Berikan penilaian untuk membantu kami terus memperbaiki website SMKN 4 Bogor.</p>
            <div id="starContainer" class="d-inline-flex gap-2" aria-label="Pilih rating 1 sampai 5">
                <i class="bi bi-star star-btn" data-value="1" role="button" tabindex="0"></i>
                <i class="bi bi-star star-btn" data-value="2" role="button" tabindex="0"></i>
                <i class="bi bi-star star-btn" data-value="3" role="button" tabindex="0"></i>
                <i class="bi bi-star star-btn" data-value="4" role="button" tabindex="0"></i>
                <i class="bi bi-star star-btn" data-value="5" role="button" tabindex="0"></i>
            </div>
            <div id="ratingMessage" class="alert d-none small" role="alert"></div>
        </div>
    </div>
</section>

<footer class="footer-modern">
    <div class="container">

    <!-- Footer Main -->
    <div class="footer-modern-main">

        <!-- Brand -->
        <div class="footer-brand-modern">
            <div class="footer-brand-logo">
                <img src="{{ asset('images/logo-smkn4.svg') }}"
                     alt="Logo SMKN 4 Bogor">

                <div>
                    <h5>SMKN 4 KOTA BOGOR</h5>
                    <span>Pendidikan kejuruan masa depan.</span>
                </div>
            </div>

            <p>
                Mencetak generasi unggul dalam teknologi, berkarakter,
                dan siap bersaing di masa depan melalui pendidikan
                kejuruan yang berkualitas.
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
            <h6>Navigasi</h6>

            <a href="#Beranda">Beranda</a>
            <a href="#tentang">Tentang Sekolah</a>
            <a href="#Berita">Berita</a>
            <a href="#jurusan">Program Keahlian</a>
            <a href="#galeri">Galeri</a>
        </div>


        <!-- Jurusan -->
        <div class="footer-column-modern">
            <h6>Program Keahlian</h6>

            <span>PPLG</span>
            <span>TJKT</span>
            <span>TO</span>
            <span>TP</span>
        </div>


        <!-- Contact -->
        <div class="footer-column-modern footer-contact-modern">
            <h6>Hubungi Kami</h6>

            <div class="footer-contact-item">
                <i class="bi bi-geo-alt-fill"></i>
                <span>
                    Jl. Raya Tajur, Kp. Muara, RT.03/RW.04,
                    Sindangrasa, Bogor Timur, Kota Bogor
                </span>
            </div>

            <div class="footer-contact-item">
                <i class="bi bi-telephone-fill"></i>
                <span>+62 0858 9021 3624</span>
            </div>

            <div class="footer-contact-item">
                <i class="bi bi-envelope-fill"></i>
                <span>info@smkn4bogor.sch.id</span>
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
            <strong>Tim GaleriEdukasiDigital</strong>
        </span>

    </div>

</div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Rating
    const stars = document.querySelectorAll('.star-btn');
    const message = document.getElementById('ratingMessage');
    const starContainer = document.getElementById('starContainer');
    let selectedRating = 0;
    let isSubmitting = false;

    function highlightStars(count) {
        stars.forEach(star => {
            const value = Number(star.dataset.value);
            star.classList.toggle('bi-star-fill', value <= count);
            star.classList.toggle('bi-star', value > count);
        });
    }

    function showMessage(text, type) {
        message.className = `alert alert-${type} mt-3 mx-auto small`;
        message.textContent = text;
        message.classList.remove('d-none');
    }

    stars.forEach(star => {
        star.addEventListener('mouseover', function () {
            if (!isSubmitting && selectedRating === 0) highlightStars(Number(this.dataset.value));
        });
        star.addEventListener('mouseleave', function () {
            highlightStars(selectedRating);
        });
        star.addEventListener('click', async function () {
            if (isSubmitting || selectedRating !== 0) return;
            selectedRating = Number(this.dataset.value);
            highlightStars(selectedRating);
            isSubmitting = true;

            try {
                const response = await fetch("{{ route('rating.store') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    credentials: 'same-origin',
                    body: JSON.stringify({ stars: selectedRating })
                });
                const data = await response.json();
                if (!response.ok || !data.success) throw new Error(data.message || 'Gagal mengirim rating.');
                showMessage(data.message || 'Terima kasih telah memberikan rating!', 'success');
                starContainer.style.pointerEvents = 'none';
                starContainer.style.opacity = '.7';
            } catch (error) {
                console.error('Rating error:', error);
                selectedRating = 0;
                highlightStars(0);
                showMessage('Maaf, rating gagal dikirim. Silakan coba lagi.', 'danger');
                isSubmitting = false;
            }
        });
    });

    // Gallery modal
    const galleryModal = document.getElementById('galleryDetailModal');
    if (galleryModal) {
        galleryModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            document.getElementById('galleryModalImage').src = button.getAttribute('data-image');
            document.getElementById('galleryModalTitle').textContent = button.getAttribute('data-title');
            document.getElementById('galleryModalDate').textContent = button.getAttribute('data-date');
        });
        galleryModal.addEventListener('hidden.bs.modal', function () {
            document.getElementById('galleryModalImage').src = '';
        });
    }
});
</script>
</body>
</html>
