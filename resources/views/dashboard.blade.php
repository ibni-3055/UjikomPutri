@extends('layouts.app')

<title>Beranda - SMK Negeri 4 Kota Bogor</title>

    <!-- Favicon -->
<link rel="icon" type="image/svg+xml" href="{{ asset('images/logo-baru.png') }}">

@push('styles')
    
@endpush

@section('content')

@vite('resources/css/dashboard.css')

<div class="admin-dashboard">

    {{-- =====================================================
         NOTIFICATION
    ====================================================== --}}

    @if (session('error'))

        <div class="dashboard-alert dashboard-alert-danger">

            <div class="d-flex align-items-center">

                <i class="bi bi-exclamation-triangle-fill me-3"></i>

                <div>
                    <strong>Akses Ditolak!</strong>
                    {{ session('error') }}
                </div>

            </div>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    @if (session('success'))

        <div class="dashboard-alert dashboard-alert-success">

            <div class="d-flex align-items-center">

                <i class="bi bi-check-circle-fill me-3"></i>

                <div>
                    {{ session('success') }}
                </div>

            </div>

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="dashboard-top">

        <div>

            <div class="dashboard-eyebrow">
                Admin Control Center
            </div>

            <h1>
                Halo,
                <span>{{ Auth::user()->name ?? 'Admin' }}</span>
            </h1>

            <p class="dashboard-description">
                Kelola seluruh informasi website SMKN 4 Kota Bogor
                melalui pusat administrasi ini.
            </p>

        </div>


        <div class="dashboard-date-box">

            <i class="bi bi-calendar3"></i>

            <span>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </span>

        </div>

    </div>


    {{-- =====================================================
         STATISTICS
    ====================================================== --}}

    <div class="dashboard-stats">


        {{-- ADMIN --}}

        <div class="dashboard-stat">

            <div class="dashboard-stat-top">

                <span class="dashboard-stat-label">
                    Total Admin
                </span>

                <div class="dashboard-stat-icon stat-icon-purple">
                    <i class="bi bi-people-fill"></i>
                </div>

            </div>

            <h2 class="dashboard-stat-number">
                {{ \App\Models\User::count() }}
            </h2>

            <a href="{{ route('admin.index') }}"
               class="dashboard-stat-link">

                Kelola admin

                <i class="bi bi-arrow-up-right"></i>

            </a>

        </div>


        {{-- KELAS --}}

        <div class="dashboard-stat">

            <div class="dashboard-stat-top">

                <span class="dashboard-stat-label">
                    Total Kelas
                </span>

                <div class="dashboard-stat-icon stat-icon-blue">
                    <i class="bi bi-door-open-fill"></i>
                </div>

            </div>

            <h2 class="dashboard-stat-number">
                {{ $totalKelas ?? (\App\Models\Kelas::count() ?? 0) }}
            </h2>

            <a href="{{ route('admin.kelas.index') }}"
               class="dashboard-stat-link">

                Data kelas

                <i class="bi bi-arrow-up-right"></i>

            </a>

        </div>


        {{-- BERITA --}}

        <div class="dashboard-stat">

            <div class="dashboard-stat-top">

                <span class="dashboard-stat-label">
                    Total Berita
                </span>

                <div class="dashboard-stat-icon stat-icon-green">
                    <i class="bi bi-newspaper"></i>
                </div>

            </div>

            <h2 class="dashboard-stat-number">
                {{ $totalBerita ?? (\App\Models\Berita::count() ?? 0) }}
            </h2>

            <a href="{{ route('admin.berita.index') }}"
               class="dashboard-stat-link">

                Lihat berita

                <i class="bi bi-arrow-up-right"></i>

            </a>

        </div>


        {{-- GALERI --}}

        <div class="dashboard-stat">

            <div class="dashboard-stat-top">

                <span class="dashboard-stat-label">
                    Total Galeri
                </span>

                <div class="dashboard-stat-icon stat-icon-orange">
                    <i class="bi bi-images"></i>
                </div>

            </div>

            <h2 class="dashboard-stat-number">
                {{ $totalGaleri ?? (\App\Models\Galeri::count() ?? 0) }}
            </h2>

            <a href="{{ route('admin.galeri.index') }}"
               class="dashboard-stat-link">

                Kelola galeri

                <i class="bi bi-arrow-up-right"></i>

            </a>

        </div>

    </div>


    {{-- =====================================================
         SECTION TITLE
    ====================================================== --}}

    <div class="dashboard-section-header">

        <h2>
            Aktivitas Website
        </h2>

        <span>
            Ringkasan aktivitas terbaru
        </span>

    </div>


    {{-- =====================================================
         MAIN CONTENT
    ====================================================== --}}

    <div class="dashboard-main-grid">


        {{-- =================================================
             LEFT
        ================================================== --}}

        <div>


            {{-- QUICK MENU --}}

            <div class="dashboard-panel mb-4">

                <div class="dashboard-panel-header">

                    <h3 class="dashboard-panel-title">

                        <i class="bi bi-command"></i>

                        Menu Cepat

                    </h3>

                </div>


                <div class="dashboard-panel-body">

                    <div class="quick-menu">


                        <a href="{{ route('admin.index') }}"
                           class="quick-menu-item">

                            <div class="quick-menu-icon">

                                <i class="bi bi-person-plus-fill"></i>

                            </div>

                            <div>

                                <div class="quick-menu-title">
                                    Kelola Admin
                                </div>

                                <div class="quick-menu-description">
                                    Pengguna & akses
                                </div>

                            </div>

                        </a>


                        <a href="{{ route('admin.berita.index') }}"
                           class="quick-menu-item">

                            <div class="quick-menu-icon">

                                <i class="bi bi-pencil-square"></i>

                            </div>

                            <div>

                                <div class="quick-menu-title">
                                    Kelola Berita
                                </div>

                                <div class="quick-menu-description">
                                    Artikel sekolah
                                </div>

                            </div>

                        </a>


                        <a href="{{ route('admin.galeri.index') }}"
                           class="quick-menu-item">

                            <div class="quick-menu-icon">

                                <i class="bi bi-cloud-arrow-up-fill"></i>

                            </div>

                            <div>

                                <div class="quick-menu-title">
                                    Kelola Galeri
                                </div>

                                <div class="quick-menu-description">
                                    Dokumentasi foto
                                </div>

                            </div>

                        </a>

                    </div>

                </div>

            </div>


            {{-- BERITA --}}

            <div class="dashboard-panel mb-4">

                <div class="dashboard-panel-header">

                    <h3 class="dashboard-panel-title">

                        <i class="bi bi-newspaper"></i>

                        Berita Terbaru

                    </h3>

                    <a href="{{ route('admin.berita.index') }}"
                       class="dashboard-panel-link">

                        Lihat semua

                    </a>

                </div>


                <div class="dashboard-panel-body">

                    @php
                        $latestBerita = \App\Models\Berita::latest()->take(3)->get();
                    @endphp


                    <div class="news-list">

                        @forelse($latestBerita as $berita)

                            <a href="{{ route('admin.berita.index') }}"
                               class="news-row">

                                <img
                                    src="{{ isset($berita->foto) ? asset('storage/' . $berita->foto) : asset('images/hero-sekolah.jpg') }}"
                                    class="news-image"
                                    alt="{{ $berita->judul }}"
                                >

                                <div class="news-info">

                                    <h3>
                                        {{ $berita->judul }}
                                    </h3>

                                    <span>

                                        <i class="bi bi-calendar3 me-1"></i>

                                        {{ $berita->created_at->format('d M Y') }}

                                    </span>

                                </div>

                                <div class="news-arrow">

                                    <i class="bi bi-arrow-up-right"></i>

                                </div>

                            </a>

                        @empty

                            <div class="dashboard-empty">

                                <i class="bi bi-journal-x"></i>

                                Belum ada berita yang ditambahkan.

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- GALERI --}}

            <div class="dashboard-panel">

                <div class="dashboard-panel-header">

                    <h3 class="dashboard-panel-title">

                        <i class="bi bi-images"></i>

                        Galeri Terbaru

                    </h3>

                    <a href="{{ route('admin.galeri.index') }}"
                       class="dashboard-panel-link">

                        Kelola

                    </a>

                </div>


                <div class="dashboard-panel-body">

                    @php
                        $latestGaleri = \App\Models\Galeri::latest()->take(6)->get();
                    @endphp


                    @if($latestGaleri->count() > 0)

                        <div class="gallery-grid">

                            @foreach($latestGaleri as $galeri)

                                <div class="gallery-item">

                                    <img
                                        src="{{ isset($galeri->foto) ? asset('storage/' . $galeri->foto) : asset('images/hero-sekolah.jpg') }}"
                                        alt="{{ $galeri->judul ?? 'Foto Galeri' }}"
                                    >

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="dashboard-empty">

                            <i class="bi bi-image-fill"></i>

                            Belum ada foto galeri.

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- =================================================
             RIGHT
        ================================================== --}}

        <div>


            {{-- KELAS --}}

            <div class="dashboard-panel mb-4">

                <div class="dashboard-panel-header">

                    <h3 class="dashboard-panel-title">

                        <i class="bi bi-grid-3x3-gap-fill"></i>

                        Data Kelas

                    </h3>

                    <a href="{{ route('admin.kelas.index') }}"
                       class="dashboard-panel-link">

                        Semua

                    </a>

                </div>


                <div class="dashboard-panel-body">

                    @php
                        $latestKelas = \App\Models\Kelas::latest()->take(4)->get();
                    @endphp


                    <div class="class-list">

                        @forelse($latestKelas as $kelas)

                            <div class="class-row">

                                <div class="class-information">

                                    <div class="class-symbol">

                                        <i class="bi bi-display"></i>

                                    </div>

                                    <div class="class-text">

                                        <strong>
                                            {{ $kelas->nama_kelas ?? $kelas->nama }}
                                        </strong>

                                        <span>
                                            {{ $kelas->jurusan ?? 'SMKN 4 Bogor' }}
                                        </span>

                                    </div>

                                </div>


                                <a href="{{ route('admin.kelas.show', $kelas->id) }}"
                                   class="class-link">

                                    <i class="bi bi-chevron-right"></i>

                                </a>

                            </div>

                        @empty

                            <div class="dashboard-empty">

                                <i class="bi bi-journal-album"></i>

                                Belum ada data kelas.

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- SYSTEM --}}

            <div class="dashboard-panel mb-4">

                <div class="dashboard-panel-header">

                    <h3 class="dashboard-panel-title">

                        <i class="bi bi-cpu"></i>

                        Informasi Sistem

                    </h3>

                </div>


                <div class="dashboard-panel-body">

                    <div class="system-list">

                        <div class="system-row">

                            <span class="system-label">
                                Framework
                            </span>

                            <span class="system-value">
                                Laravel v{{ app()->version() }}
                            </span>

                        </div>


                        <div class="system-row">

                            <span class="system-label">
                                PHP
                            </span>

                            <span class="system-value">
                                v{{ phpversion() }}
                            </span>

                        </div>


                        <div class="system-row">

                            <span class="system-label">
                                Server
                            </span>

                            <span class="system-online">

                                <i class="bi bi-circle-fill"></i>

                                Online

                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- RATING --}}

            <div class="dashboard-panel">

                <div class="dashboard-panel-header">

                    <h3 class="dashboard-panel-title">

                        <i class="bi bi-star-fill"></i>

                        Rating Website

                    </h3>

                </div>


                <div class="dashboard-panel-body">

                    <div class="rating-box">

                        <div>

                            <div class="rating-score">

                                <strong>
                                    {{ $ratingCount > 0 ? number_format($ratingAverage, 1) : '0.0' }}
                                </strong>

                                <span>
                                    / 5
                                </span>

                            </div>


                            <div class="rating-stars">

                                @for ($i = 1; $i <= 5; $i++)

                                    <i class="bi {{ $i <= round($ratingAverage ?? 0) ? 'bi-star-fill' : 'bi-star' }}"></i>

                                @endfor

                            </div>


                            <span class="rating-count">

                                {{ $ratingCount }} penilaian

                            </span>

                        </div>


                        <div class="rating-symbol">

                            <i class="bi bi-star-fill"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection