<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Masuk - SMKN 4 Kota Bogor</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>

        /* =====================================================
           GLOBAL
        ===================================================== */

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;

            font-family: "Google Sans", sans-serif;

            background:
                radial-gradient(
                    circle at top right,
                    rgba(126, 87, 255, 0.20),
                    transparent 35%
                ),
                #09090f;

            color: #17171f;
        }


        /* =====================================================
           LOGIN PAGE
        ===================================================== */

        .login-page {
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 30px 20px;

            position: relative;
            overflow: hidden;
        }

        .login-page::before {
            content: "";

            position: absolute;

            width: 450px;
            height: 450px;

            top: -220px;
            right: -120px;

            border-radius: 50%;

            background: rgba(137, 103, 255, 0.12);

            filter: blur(30px);
        }

        .login-page::after {
            content: "";

            position: absolute;

            width: 350px;
            height: 350px;

            bottom: -180px;
            left: -120px;

            border-radius: 50%;

            background: rgba(91, 65, 190, 0.10);

            filter: blur(30px);
        }


        /* =====================================================
           MAIN CARD
        ===================================================== */

        .login-card {
            position: relative;
            z-index: 2;

            width: 100%;
            max-width: 1050px;

            min-height: 620px;

            display: grid;
            grid-template-columns: 46% 54%;

            overflow: hidden;

            background: #ffffff;

            border: 1px solid rgba(255, 255, 255, 0.08);

            border-radius: 28px;

            box-shadow:
                0 30px 80px rgba(0, 0, 0, 0.35);
        }


        /* =====================================================
           LEFT IMAGE
        ===================================================== */

        .login-visual {
            position: relative;

            min-height: 620px;

            overflow: hidden;

            background: #17151f;
        }

        .login-visual img {
            width: 100%;
            height: 100%;

            display: block;

            object-fit: cover;

            transition: transform 0.6s ease;
        }

        .login-card:hover .login-visual img {
            transform: scale(1.03);
        }

        .login-visual-overlay {
            position: absolute;
            inset: 0;

            background:
                linear-gradient(
                    to bottom,
                    rgba(10, 9, 15, 0.10),
                    rgba(10, 9, 15, 0.35) 45%,
                    rgba(10, 9, 15, 0.92) 100%
                );
        }


        /* =====================================================
           SCHOOL BRAND
        ===================================================== */

        .login-brand {
            position: absolute;

            top: 30px;
            left: 30px;
            right: 30px;

            display: flex;
            align-items: center;

            gap: 12px;

            z-index: 3;
        }

        .login-brand img {
            width: 48px;
            height: 48px;

            object-fit: contain;

            padding: 7px;

            background: rgba(255, 255, 255, 0.12);

            border: 1px solid rgba(255, 255, 255, 0.22);

            border-radius: 13px;

            backdrop-filter: blur(10px);
        }

        .login-brand-text strong {
            display: block;

            color: #ffffff;

            font-size: 12px;
            font-weight: 700;

            letter-spacing: 1px;
        }

        .login-brand-text span {
            display: block;

            margin-top: 2px;

            color: rgba(255, 255, 255, 0.65);

            font-size: 9px;

            letter-spacing: 1.5px;
        }


        /* =====================================================
           VISUAL TEXT
        ===================================================== */

        .login-visual-content {
            position: absolute;

            left: 35px;
            right: 35px;
            bottom: 35px;

            z-index: 3;
        }

        .login-label {
            display: inline-flex;
            align-items: center;

            gap: 8px;

            margin-bottom: 14px;

            color: #c0b1ff;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .login-label::before {
            content: "";

            width: 24px;
            height: 2px;

            background: #a88eff;

            border-radius: 20px;
        }

        .login-visual-content h1 {
            margin: 0;

            color: #ffffff;

            font-size: clamp(32px, 4vw, 52px);
            font-weight: 700;

            line-height: 1.05;

            letter-spacing: -1.5px;
        }

        .login-visual-content h1 span {
            color: #ad98ff;
        }

        .login-visual-content p {
            max-width: 410px;

            margin: 15px 0 0;

            color: rgba(255, 255, 255, 0.68);

            font-size: 12px;

            line-height: 1.7;
        }


        /* =====================================================
           RIGHT FORM
        ===================================================== */

        .login-form-area {
            display: flex;
            align-items: center;

            padding: 55px 65px;

            background: #ffffff;
        }

        .login-form {
            width: 100%;
            max-width: 440px;

            margin: 0 auto;
        }


        /* =====================================================
           FORM HEADER
        ===================================================== */

        .form-heading {
            margin-bottom: 35px;
        }

        .form-heading .mini-label {
            display: block;

            margin-bottom: 10px;

            color: #8066e8;

            font-size: 9px;
            font-weight: 700;

            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .form-heading h2 {
            margin: 0;

            color: #181820;

            font-size: 32px;
            font-weight: 700;

            letter-spacing: -1px;
        }

        .form-heading p {
            margin: 9px 0 0;

            color: #92929d;

            font-size: 12px;

            line-height: 1.6;
        }


        /* =====================================================
           ALERT
        ===================================================== */

        .login-alert {
            display: flex;
            align-items: center;

            gap: 10px;

            margin-bottom: 22px;

            padding: 12px 14px;

            color: #24613b;

            background: #edf9f1;

            border: 1px solid #d5f0dd;

            border-radius: 12px;

            font-size: 12px;
        }


        /* =====================================================
           INPUT
        ===================================================== */

        .input-group-modern {
            margin-bottom: 20px;
        }

        .input-group-modern label {
            display: block;

            margin-bottom: 8px;

            color: #292932;

            font-size: 11px;
            font-weight: 600;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;

            left: 15px;
            top: 50%;

            transform: translateY(-50%);

            color: #9696a2;

            font-size: 15px;

            pointer-events: none;
        }

        .modern-input {
            width: 100%;

            height: 52px;

            padding: 0 16px 0 45px;

            color: #20202a;

            background: #f7f7fa;

            border: 1px solid #e7e7ec;

            border-radius: 13px;

            outline: none;

            font-family: inherit;
            font-size: 13px;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease,
                background 0.2s ease;
        }

        .modern-input:focus {
            background: #ffffff;

            border-color: #8d75e8;

            box-shadow:
                0 0 0 4px rgba(141, 117, 232, 0.10);
        }

        .modern-input::placeholder {
            color: #b2b2bb;
        }


        /* =====================================================
           ERROR
        ===================================================== */

        .invalid-feedback {
            margin-top: 6px;

            font-size: 10px;
        }

        .modern-input.is-invalid {
            border-color: #dc3545;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .login-button {
            width: 100%;
            height: 52px;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 9px;

            margin-top: 8px;

            color: #ffffff;

            background:
                linear-gradient(
                    135deg,
                    #7658dc,
                    #9276f0
                );

            border: none;

            border-radius: 13px;

            font-family: inherit;
            font-size: 13px;
            font-weight: 700;

            box-shadow:
                0 10px 25px rgba(118, 88, 220, 0.20);

            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .login-button:hover {
            color: #ffffff;

            transform: translateY(-2px);

            box-shadow:
                0 14px 30px rgba(118, 88, 220, 0.30);
        }

        .login-button:active {
            transform: translateY(0);
        }


        /* =====================================================
           BACK LINK
        ===================================================== */

        .back-home {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            margin-top: 25px;

            color: #92929d;

            font-size: 11px;

            text-decoration: none;

            transition: color 0.2s ease;
        }

        .back-home i {
            font-size: 13px;
        }

        .back-home:hover {
            color: #7658dc;
        }


        /* =====================================================
           SECURITY NOTE
        ===================================================== */

        .login-security {
            display: flex;
            align-items: center;
            justify-content: center;

            gap: 6px;

            margin-top: 25px;

            color: #b0b0b9;

            font-size: 9px;
        }

        .login-security i {
            color: #8066e8;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .login-card {
                max-width: 650px;

                grid-template-columns: 1fr;
            }

            .login-visual {
                display: none;
            }

            .login-form-area {
                min-height: 620px;

                padding: 50px;
            }

        }


        @media (max-width: 576px) {

            .login-page {
                padding: 15px;
            }

            .login-card {
                min-height: auto;

                border-radius: 22px;
            }

            .login-form-area {
                padding: 40px 25px;
            }

            .form-heading h2 {
                font-size: 28px;
            }

            .form-heading {
                margin-bottom: 30px;
            }

        }

    </style>
</head>

<body>

<section class="login-page">

    <div class="login-card">

        <!-- ==============================================
             BAGIAN GAMBAR
        =============================================== -->

        <div class="login-visual">

            <img
                src="{{ asset('images/hero-sekolah.jpg') }}"
                alt="SMKN 4 Kota Bogor"
            >

            <div class="login-visual-overlay"></div>

            <!-- Logo Sekolah -->

            <div class="login-brand">

                <img
                    src="{{ asset('images/logo-smkn4.svg') }}"
                    alt="Logo SMKN 4 Bogor"
                >

                <div class="login-brand-text">

                    <strong>SMKN 4 KOTA BOGOR</strong>

                    <span>PORTAL ADMINISTRASI</span>

                </div>

            </div>


            <!-- Text -->

            <div class="login-visual-content">

                <div class="login-label">
                    Portal Sekolah
                </div>

                <h1>
                    Kelola sekolah.<br>
                    <span>Lebih mudah.</span>
                </h1>

                <p>
                    Akses panel administrasi untuk mengelola
                    informasi, berita, galeri, dan berbagai
                    kebutuhan website SMKN 4 Kota Bogor.
                </p>

            </div>

        </div>


        <!-- ==============================================
             BAGIAN FORM LOGIN
        =============================================== -->

        <div class="login-form-area">

            <div class="login-form">

                <form method="POST" action="{{ route('login') }}">

                    @csrf


                    <!-- Header -->

                    <div class="form-heading">

                        <span class="mini-label">
                            Admin Access
                        </span>

                        <h2>
                            Selamat Datang
                        </h2>

                        <p>
                            Masuk menggunakan akun administrator
                            untuk melanjutkan ke dashboard.
                        </p>

                    </div>


                    <!-- Status Session -->

                    @if (session('status'))

                        <div class="login-alert" role="alert">

                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                {{ session('status') }}
                            </span>

                        </div>

                    @endif


                    <!-- Username -->

                    <div class="input-group-modern">

                        <label for="email">
                            User Admin
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-person"></i>

                            <input
                                type="text"
                                id="email"
                                name="name"
                                value="{{ old('name') }}"
                                class="modern-input @error('name') is-invalid @enderror"
                                placeholder="Masukkan username"
                                required
                                autofocus
                            >

                        </div>

                        @error('name')

                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- Password -->

                    <div class="input-group-modern">

                        <label for="password">
                            Kata Sandi
                        </label>

                        <div class="input-wrapper">

                            <i class="bi bi-lock"></i>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="modern-input @error('password') is-invalid @enderror"
                                placeholder="Masukkan kata sandi"
                                required
                            >

                        </div>

                        @error('password')

                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- Button -->

                    <button
                        class="login-button"
                        type="submit"
                    >

                        <i class="bi bi-box-arrow-in-right"></i>

                        Masuk ke Dashboard

                    </button>


                    <!-- Back -->

                    <a
                        href="{{ url('/') }}"
                        class="back-home"
                    >

                        <i class="bi bi-arrow-left"></i>

                        Kembali ke Beranda

                    </a>


                    <!-- Security -->

                    <div class="login-security">

                        <i class="bi bi-shield-check"></i>

                        Halaman khusus administrator

                    </div>

                </form>

            </div>

        </div>

    </div>

</section>

</body>

</html>