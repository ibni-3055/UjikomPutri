@extends('layouts.app')

@section('content')

@vite('resources/css/admin-berita.css')

<div class="admin-berita-page">

    {{-- =========================
        HEADER
    ========================== --}}
    <div class="berita-page-header">
        <div class="berita-header-left">

            <div class="berita-header-icon">
                <i class="bi bi-newspaper"></i>
            </div>

            <div>
                <span class="berita-eyebrow">
                    Informasi & Publikasi
                </span>

                <h1 class="berita-page-title">
                    Pengelolaan Berita
                </h1>

                <p class="berita-page-subtitle">
                    Kelola berita, informasi, dan publikasi terbaru SMKN 4 Bogor.
                </p>
            </div>

        </div>

        <button
            class="berita-mobile-button"
            onclick="document.getElementById('sidebar').classList.toggle('show')"
            type="button"
        >
            <i class="bi bi-list"></i>
        </button>
    </div>


    {{-- =========================
        ALERT
    ========================== --}}
    @if(session('success'))
        <div class="berita-alert berita-alert-success">
            <div class="berita-alert-icon">
                <i class="bi bi-check-lg"></i>
            </div>

            <div class="berita-alert-content">
                <strong>Berhasil!</strong>
                <span>{{ session('success') }}</span>
            </div>

            <button
                type="button"
                class="berita-alert-close"
                data-bs-dismiss="alert"
            >
                <i class="bi bi-x"></i>
            </button>
        </div>
    @endif


    @if($errors->any())
        <div class="berita-alert berita-alert-danger">

            <div class="berita-alert-icon">
                <i class="bi bi-exclamation-lg"></i>
            </div>

            <div class="berita-alert-content">
                <strong>Terjadi kesalahan</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <button
                type="button"
                class="berita-alert-close"
                data-bs-dismiss="alert"
            >
                <i class="bi bi-x"></i>
            </button>

        </div>
    @endif


    {{-- =========================
        MAIN GRID
    ========================== --}}
    <div class="berita-main-grid">

        {{-- =========================
            FORM TAMBAH BERITA
        ========================== --}}
        <div class="berita-form-panel">

            <div class="berita-panel-header">

                <div class="berita-panel-header-icon">
                    <i class="bi bi-plus-lg"></i>
                </div>

                <div>
                    <h2>Tambah Berita</h2>
                    <p>Publikasikan berita baru ke website sekolah.</p>
                </div>

            </div>


            <div class="berita-form-body">

                <form
                    action="{{ route('admin.berita.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    {{-- Judul --}}
                    <div class="berita-form-group">

                        <label for="judul">
                            Judul Berita
                        </label>

                        <div class="berita-input-wrapper">
                            <i class="bi bi-type-h1"></i>

                            <input
                                type="text"
                                id="judul"
                                name="judul"
                                value="{{ old('judul') }}"
                                placeholder="Masukkan judul berita..."
                                required
                            >
                        </div>

                    </div>


                    {{-- Deskripsi --}}
                    <div class="berita-form-group">

                        <label for="deskripsi">
                            Deskripsi / Isi Berita
                        </label>

                        <div class="berita-textarea-wrapper">

                            <i class="bi bi-text-paragraph"></i>

                            <textarea
                                id="deskripsi"
                                name="deskripsi"
                                rows="6"
                                placeholder="Tuliskan ringkasan atau isi berita..."
                                required
                            >{{ old('deskripsi') }}</textarea>

                        </div>

                    </div>


                    {{-- Foto --}}
                    <div class="berita-form-group">

                        <label for="foto">
                            Foto Header
                        </label>

                        <label
                            for="foto"
                            class="berita-upload-box"
                        >

                            <div class="berita-upload-icon">
                                <i class="bi bi-cloud-arrow-up"></i>
                            </div>

                            <div class="berita-upload-text">
                                <strong>Pilih foto berita</strong>
                                <span>JPG, JPEG, PNG atau gambar lainnya</span>
                            </div>

                            <input
                                type="file"
                                id="foto"
                                name="foto"
                                accept="image/*"
                            >

                        </label>

                    </div>


                    {{-- Tanggal --}}
                    <div class="berita-form-group">

                        <label for="tanggal_upload">
                            Tanggal Upload
                        </label>

                        <div class="berita-input-wrapper">
                            <i class="bi bi-calendar3"></i>

                            <input
                                type="datetime-local"
                                id="tanggal_upload"
                                name="tanggal_upload"
                                value="{{ old('tanggal_upload', date('Y-m-d\TH:i')) }}"
                                required
                            >
                        </div>

                    </div>


                    <button
                        type="submit"
                        class="berita-submit-button"
                    >
                        <i class="bi bi-send-fill"></i>
                        Terbitkan Berita
                    </button>

                </form>

            </div>

        </div>


        {{-- =========================
            DAFTAR BERITA
        ========================== --}}
        <div class="berita-list-panel">

            <div class="berita-list-header">

                <div class="berita-list-heading">

                    <div class="berita-list-icon">
                        <i class="bi bi-collection"></i>
                    </div>

                    <div>
                        <h2>Berita Terbit</h2>
                        <p>Daftar publikasi yang tersedia di website.</p>
                    </div>

                </div>

            </div>


            <div class="berita-list-body">

                <div class="berita-grid">

                    @forelse($berita ?? $beritas ?? [] as $b)

                        @php
                            $gambarPath = $b->foto ?? $b->gambar ?? $b->image ?? null;
                        @endphp


                        {{-- =========================
                            CARD BERITA
                        ========================== --}}
                        <article class="berita-card">

                            {{-- Image --}}
                            <div class="berita-card-image">

                                @if($gambarPath)

                                    <img
                                        src="{{ asset('storage/' . $gambarPath) }}"
                                        alt="{{ $b->judul }}"
                                    >

                                @else

                                    <div class="berita-image-placeholder">
                                        <i class="bi bi-image"></i>
                                        <span>Tidak ada foto</span>
                                    </div>

                                @endif


                                <div class="berita-card-overlay"></div>

                                <span class="berita-status-badge">
                                    <i class="bi bi-check-circle-fill"></i>
                                    Published
                                </span>

                            </div>


                            {{-- Content --}}
                            <div class="berita-card-content">

                                <div class="berita-card-date">

                                    <i class="bi bi-calendar3"></i>

                                    {{ isset($b->tanggal_upload)
                                        ? \Carbon\Carbon::parse($b->tanggal_upload)->format('d M Y - H:i')
                                        : $b->created_at->format('d M Y')
                                    }}

                                </div>


                                <h3 class="berita-card-title">
                                    {{ $b->judul }}
                                </h3>


                                <p class="berita-card-description">
                                    {{ $b->deskripsi ?? $b->isi ?? $b->ringkasan }}
                                </p>


                                {{-- Actions --}}
                                <div class="berita-card-actions">

                                    <button
                                        type="button"
                                        class="berita-edit-button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editBeritaModal{{ $b->id }}"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </button>


                                    <form
                                        action="{{ route('admin.berita.destroy', $b->id) }}"
                                        method="POST"
                                        class="berita-delete-form"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="berita-delete-button"
                                        >
                                            <i class="bi bi-trash3"></i>
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </article>


                        {{-- =========================
                            MODAL EDIT
                        ========================== --}}
                        <div
                            class="modal fade"
                            id="editBeritaModal{{ $b->id }}"
                            tabindex="-1"
                            aria-hidden="true"
                        >

                            <div class="modal-dialog modal-dialog-centered modal-lg">

                                <div class="modal-content berita-modal">

                                    <form
                                        action="{{ route('admin.berita.update', $b->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        @method('PUT')


                                        {{-- Modal Header --}}
                                        <div class="berita-modal-header">

                                            <div class="berita-modal-title-wrapper">

                                                <div class="berita-modal-icon">
                                                    <i class="bi bi-pencil-square"></i>
                                                </div>

                                                <div>
                                                    <span>Edit Publikasi</span>

                                                    <h3>
                                                        Edit Berita
                                                    </h3>
                                                </div>

                                            </div>


                                            <button
                                                type="button"
                                                class="berita-modal-close"
                                                data-bs-dismiss="modal"
                                            >
                                                <i class="bi bi-x-lg"></i>
                                            </button>

                                        </div>


                                        {{-- Modal Body --}}
                                        <div class="berita-modal-body">

                                            <div class="berita-form-group">

                                                <label>
                                                    Judul Berita
                                                </label>

                                                <div class="berita-input-wrapper">

                                                    <i class="bi bi-type-h1"></i>

                                                    <input
                                                        type="text"
                                                        name="judul"
                                                        value="{{ $b->judul }}"
                                                        required
                                                    >

                                                </div>

                                            </div>


                                            <div class="berita-form-group">

                                                <label>
                                                    Deskripsi / Isi Berita
                                                </label>

                                                <div class="berita-textarea-wrapper">

                                                    <i class="bi bi-text-paragraph"></i>

                                                    <textarea
                                                        name="deskripsi"
                                                        rows="7"
                                                        required
                                                    >{{ $b->deskripsi ?? $b->isi }}</textarea>

                                                </div>

                                            </div>


                                            <div class="berita-form-group">

                                                <label>
                                                    Ganti Foto
                                                    <small>
                                                        (Opsional)
                                                    </small>
                                                </label>

                                                <label class="berita-upload-box berita-upload-box-modal">

                                                    <div class="berita-upload-icon">
                                                        <i class="bi bi-image"></i>
                                                    </div>

                                                    <div class="berita-upload-text">
                                                        <strong>Pilih foto baru</strong>
                                                        <span>Kosongkan jika foto tidak ingin diganti</span>
                                                    </div>

                                                    <input
                                                        type="file"
                                                        name="foto"
                                                        accept="image/*"
                                                    >

                                                </label>

                                            </div>

                                        </div>


                                        {{-- Modal Footer --}}
                                        <div class="berita-modal-footer">

                                            <button
                                                type="button"
                                                class="berita-cancel-button"
                                                data-bs-dismiss="modal"
                                            >
                                                Batal
                                            </button>

                                            <button
                                                type="submit"
                                                class="berita-save-button"
                                            >
                                                <i class="bi bi-check-lg"></i>
                                                Simpan Perubahan
                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @empty

                        {{-- Empty --}}
                        <div class="berita-empty-state">

                            <div class="berita-empty-icon">
                                <i class="bi bi-newspaper"></i>
                            </div>

                            <h3>
                                Belum Ada Berita
                            </h3>

                            <p>
                                Belum ada berita yang diterbitkan.
                                Gunakan formulir di samping untuk membuat publikasi pertama.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection