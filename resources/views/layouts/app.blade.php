<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel - SMKN 4 Kota Bogor</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Bootstrap Icons -->
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    >

    <!-- Admin Layout CSS -->
    @vite('resources/css/admin-layout.css')
</head>

<body>

    <!-- =====================================================
         MOBILE OVERLAY
         ===================================================== -->
    <div
        class="sidebar-overlay"
        id="sidebarOverlay"
        onclick="toggleSidebar()"
    ></div>


    <!-- =====================================================
         SIDEBAR
         ===================================================== -->
    <aside
        class="sidebar d-flex flex-column"
        id="sidebar"
    >

        <!-- BRAND -->
        <div class="admin-brand">

            <img
                src="{{ asset('images/logo-smkn4.svg') }}"
                alt="Logo SMKN 4"
                class="admin-brand-logo"
            >

            <div>
                <div class="admin-brand-title">
                    ADMIN PANEL
                </div>

                <span class="admin-brand-subtitle">
                    SMKN 4 KOTA BOGOR
                </span>
            </div>

        </div>


        <!-- =================================================
             MENU
             ================================================= -->
        <div class="sidebar-menu">

            <!-- UTAMA -->
            <div class="sidebar-section-title">
                Utama
            </div>

            <ul class="nav nav-pills flex-column">

                <li class="nav-item">

                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                    >

                        <i class="bi bi-grid-1x2-fill"></i>

                        <span>
                            Dashboard
                        </span>

                    </a>

                </li>

            </ul>


            <!-- MANAJEMEN DATA -->
            <div class="sidebar-section-title">
                Manajemen Data
            </div>

            <ul class="nav nav-pills flex-column">

                <!-- ADMIN -->
                <li class="nav-item">

                    <a
                        href="{{ route('admin.index') }}"
                        class="nav-link {{ request()->routeIs('users.*') || request()->routeIs('admin.index') ? 'active' : '' }}"
                    >

                        <i class="bi bi-people-fill"></i>

                        <span>
                            Kelola Admin
                        </span>

                    </a>

                </li>


                <!-- KELAS -->
                <li class="nav-item">

                    <a
                        href="{{ route('admin.kelas.index') }}"
                        class="nav-link {{ request()->routeIs('admin.kelas.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-door-closed-fill"></i>

                        <span>
                            Kelola Kelas
                        </span>

                    </a>

                </li>

            </ul>


            <!-- KONTEN WEBSITE -->
            <div class="sidebar-section-title">
                Konten Website
            </div>

            <ul class="nav nav-pills flex-column">

                <!-- BERITA -->
                <li class="nav-item">

                    <a
                        href="{{ route('admin.berita.index') }}"
                        class="nav-link {{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-newspaper"></i>

                        <span>
                            Kelola Berita
                        </span>

                    </a>

                </li>


                <!-- GALERI -->
                <li class="nav-item">

                    <a
                        href="{{ route('admin.galeri.index') }}"
                        class="nav-link {{ request()->routeIs('admin.galeri.*') ? 'active' : '' }}"
                    >

                        <i class="bi bi-images"></i>

                        <span>
                            Kelola Galeri
                        </span>

                    </a>

                </li>

            </ul>

        </div>


        <!-- =================================================
             USER PROFILE
             ================================================= -->
        <div class="admin-user-box">

            <div class="admin-user">

                <!-- Avatar -->
                <div class="admin-user-avatar">

                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}

                </div>


                <!-- User Information -->
                <div class="admin-user-info">

                    <span
                        class="admin-user-name"
                        title="{{ Auth::user()->name ?? 'Administrator' }}"
                    >
                        {{ Auth::user()->name ?? 'Administrator' }}
                    </span>


                    <span class="admin-user-role">

                        {{ (Auth::user()->role ?? '') === 'super_admin'
                            ? 'Super Admin'
                            : 'Admin'
                        }}

                    </span>

                </div>


                <!-- Logout -->
                <button
                    type="button"
                    class="admin-logout"
                    data-bs-toggle="modal"
                    data-bs-target="#logoutModal"
                    title="Keluar"
                >

                    <i class="bi bi-box-arrow-right"></i>

                </button>

            </div>

        </div>

    </aside>


    <!-- =====================================================
         TOPBAR
         ===================================================== -->
    <header class="topbar sticky-top d-flex align-items-center">

        <!-- Mobile Button -->
        <button
            class="admin-mobile-toggle d-lg-none me-3"
            onclick="toggleSidebar()"
            type="button"
        >

            <i class="bi bi-list fs-5"></i>

        </button>


        <!-- Date -->
        <div class="admin-date">

            <span class="admin-date-icon">
                <i class="bi bi-calendar3"></i>
            </span>

            <span>
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </span>

        </div>


        <!-- Right Side -->
        <div class="ms-auto d-flex align-items-center">

            <a
                href="{{ url('/') }}"
                target="_blank"
                class="admin-site-button"
            >

                <i class="bi bi-globe2"></i>

                <span class="d-none d-sm-inline">
                    Lihat Website
                </span>

            </a>

        </div>

    </header>


    <!-- =====================================================
         MAIN CONTENT
         ===================================================== -->
    <main class="main-content">

        @yield('content')

    </main>


    <!-- =====================================================
         LOGOUT MODAL
         ===================================================== -->
    <div
        class="modal fade admin-logout-modal"
        id="logoutModal"
        tabindex="-1"
        aria-hidden="true"
    >

        <div class="modal-dialog modal-dialog-centered modal-sm">

            <div class="modal-content">

                <div class="modal-body p-4 text-center">

                    <!-- Icon -->
                    <div class="admin-logout-icon mb-3">

                        <i class="bi bi-box-arrow-right fs-3"></i>

                    </div>


                    <h6 class="fw-bold text-dark mb-1">
                        Konfirmasi Keluar
                    </h6>


                    <p class="text-muted small mb-4">
                        Apakah Anda yakin ingin keluar dari sistem?
                    </p>


                    <div class="d-flex gap-2">

                        <!-- Batal -->
                        <button
                            type="button"
                            class="btn btn-light w-50 fw-semibold rounded-3 py-2 small"
                            data-bs-dismiss="modal"
                        >
                            Batal
                        </button>


                        <!-- Logout -->
                        <form
                            method="POST"
                            action="{{ route('logout') }}"
                            class="w-50"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="btn btn-danger w-100 fw-semibold rounded-3 py-2 small"
                            >

                                <i class="bi bi-box-arrow-right me-1"></i>

                                Keluar

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- =====================================================
         BOOTSTRAP JS
         ===================================================== -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    ></script>


    <!-- =====================================================
         SIDEBAR SCRIPT
         ===================================================== -->
    <script>

        function toggleSidebar() {

            const sidebar =
                document.getElementById('sidebar');

            const overlay =
                document.getElementById('sidebarOverlay');


            sidebar.classList.toggle('show');

            overlay.classList.toggle('show');

        }

    </script>

</body>

</html>