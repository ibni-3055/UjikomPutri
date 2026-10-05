@extends('layouts.app')

@section('content')

@vite('resources/css/admin-galeri.css')

<div class="admin-galeri-page">

    {{-- =========================
        HEADER
    ========================== --}}
    <div class="galeri-page-header">

        <div class="galeri-header-left">

            <div class="galeri-header-icon">
                <i class="bi bi-images"></i>
            </div>

            <div>
                <span class="galeri-eyebrow">
                    Dokumentasi Sekolah
                </span>

                <h1 class="galeri-page-title">
                    Galeri Sekolah
                </h1>

                <p class="galeri-page-subtitle">
                    Kelola foto fasilitas, kegiatan, dan dokumentasi SMKN 4 Bogor.
                </p>
            </div>

        </div>


        <button
            class="galeri-mobile-button"
            onclick="document.getElementById('sidebar').classList.toggle('show')"
            type="button"
        >
            <i class="bi bi-list"></i>
        </button>

    </div>


    {{-- =========================
        ALERT SUCCESS
    ========================== --}}
    @if(session('success'))

        <div class="galeri-alert galeri-alert-success">

            <div class="galeri-alert-icon">
                <i class="bi bi-check-lg"></i>
            </div>

            <div class="galeri-alert-content">
                <strong>Berhasil!</strong>
                <span>{{ session('success') }}</span>
            </div>

            <button
                type="button"
                class="galeri-alert-close"
                data-bs-dismiss="alert"
            >
                <i class="bi bi-x"></i>
            </button>

        </div>

    @endif


    {{-- =========================
        ALERT ERROR
    ========================== --}}
    @if($errors->any())

        <div class="galeri-alert galeri-alert-danger">

            <div class="galeri-alert-icon">
                <i class="bi bi-exclamation-lg"></i>
            </div>

            <div class="galeri-alert-content">

                <strong>Terjadi kesalahan</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

            <button
                type="button"
                class="galeri-alert-close"
                data-bs-dismiss="alert"
            >
                <i class="bi bi-x"></i>
            </button>

        </div>

    @endif


    {{-- =========================
        MAIN GRID
    ========================== --}}
    <div class="galeri-main-grid">


        {{-- =========================
            FORM UPLOAD
        ========================== --}}
        <div class="galeri-upload-panel">

            <div class="galeri-panel-header">

                <div class="galeri-panel-icon">
                    <i class="bi bi-cloud-arrow-up"></i>
                </div>

                <div>
                    <h2>Tambah Foto</h2>
                    <p>Tambahkan dokumentasi baru.</p>
                </div>

            </div>


            <div class="galeri-form-body">

                <form
                    action="{{ route('admin.galeri.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >

                    @csrf


                    {{-- Nama Tempat --}}
                    <div class="galeri-form-group">

                        <label for="nama_tempat">
                            Nama Tempat / Judul Foto
                        </label>

                        <div class="galeri-input-wrapper">

                            <i class="bi bi-card-text"></i>

                            <input
                                type="text"
                                name="nama_tempat"
                                id="nama_tempat"
                                placeholder="Contoh: Kegiatan Fashion Show"
                                value="{{ old('nama_tempat') }}"
                                required
                            >

                        </div>

                    </div>


                    {{-- Upload Foto --}}
                    <div class="galeri-form-group">

                        <label>
                            File Foto
                        </label>

                        <label
                            for="foto"
                            class="galeri-upload-box"
                        >

                            <div class="galeri-upload-icon">
                                <i class="bi bi-image"></i>
                            </div>

                            <div class="galeri-upload-text">

                                <strong>Pilih foto galeri</strong>

                                <span>
                                    JPG, JPEG, PNG atau gambar lainnya
                                </span>

                            </div>

                            <input
                                type="file"
                                name="foto"
                                id="foto"
                                accept="image/*"
                                required
                            >

                        </label>

                    </div>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="galeri-submit-button"
                    >
                        <i class="bi bi-upload"></i>
                        Unggah Foto
                    </button>

                </form>

            </div>

        </div>


        {{-- =========================
            LIST GALERI
        ========================== --}}
        <div class="galeri-list-panel">

            <div class="galeri-list-header">

                <div class="galeri-list-heading">

                    <div class="galeri-list-icon">
                        <i class="bi bi-collection"></i>
                    </div>

                    <div>

                        <h2>
                            Galeri Ter-upload
                        </h2>

                        <p>
                            Dokumentasi yang tersedia di website.
                        </p>

                    </div>

                </div>

            </div>


            <div class="galeri-list-body">

                <div class="galeri-grid">

                    @forelse($galeris ?? $galeri ?? [] as $g)


                        {{-- =========================
                            GALERI CARD
                        ========================== --}}
                        <article class="galeri-card">

                            <div class="galeri-card-image">

                                <img
                                    src="{{ asset('storage/' . $g->foto) }}"
                                    alt="{{ $g->nama_tempat }}"
                                >

                                <div class="galeri-card-overlay"></div>

                                <span class="galeri-photo-badge">
                                    <i class="bi bi-image"></i>
                                    Foto
                                </span>

                            </div>


                            <div class="galeri-card-content">

                                <div class="galeri-card-title-wrapper">

                                    <div class="galeri-card-small-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>

                                    <h3>
                                        {{ $g->nama_tempat }}
                                    </h3>

                                </div>


                                <div class="galeri-card-actions">

                                    {{-- Edit --}}
                                    <button
                                        type="button"
                                        class="galeri-edit-button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editGaleriModal{{ $g->id }}"
                                    >
                                        <i class="bi bi-pencil-square"></i>
                                        Edit
                                    </button>


                                    {{-- Hapus --}}
                                    <form
                                        action="{{ route('admin.galeri.destroy', $g->id) }}"
                                        method="POST"
                                        class="galeri-delete-form"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="galeri-delete-button"
                                            title="Hapus"
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
                            id="editGaleriModal{{ $g->id }}"
                            tabindex="-1"
                            aria-hidden="true"
                        >

                            <div class="modal-dialog modal-dialog-centered">

                                <div class="modal-content galeri-modal">

                                    <form
                                        action="{{ route('admin.galeri.update', $g->id) }}"
                                        method="POST"
                                        enctype="multipart/form-data"
                                    >

                                        @csrf
                                        @method('PUT')


                                        {{-- Modal Header --}}
                                        <div class="galeri-modal-header">

                                            <div class="galeri-modal-title-wrapper">

                                                <div class="galeri-modal-icon">
                                                    <i class="bi bi-pencil-square"></i>
                                                </div>

                                                <div>

                                                    <span>
                                                        Dokumentasi
                                                    </span>

                                                    <h3>
                                                        Edit Foto Galeri
                                                    </h3>

                                                </div>

                                            </div>


                                            <button
                                                type="button"
                                                class="galeri-modal-close"
                                                data-bs-dismiss="modal"
                                            >
                                                <i class="bi bi-x-lg"></i>
                                            </button>

                                        </div>


                                        {{-- Modal Body --}}
                                        <div class="galeri-modal-body">

                                            <div class="galeri-current-image">

                                                <img
                                                    src="{{ asset('storage/' . $g->foto) }}"
                                                    alt="{{ $g->nama_tempat }}"
                                                >

                                                <div class="galeri-current-overlay">
                                                    <span>
                                                        Foto Saat Ini
                                                    </span>
                                                </div>

                                            </div>


                                            <div class="galeri-form-group">

                                                <label>
                                                    Nama Tempat / Lokasi
                                                </label>

                                                <div class="galeri-input-wrapper">

                                                    <i class="bi bi-card-text"></i>

                                                    <input
                                                        type="text"
                                                        name="nama_tempat"
                                                        value="{{ $g->nama_tempat }}"
                                                        required
                                                    >

                                                </div>

                                            </div>


                                            <div class="galeri-form-group mb-0">

                                                <label>
                                                    Ganti Foto
                                                    <small>
                                                        (Kosongkan jika tidak diubah)
                                                    </small>
                                                </label>

                                                <label class="galeri-upload-box galeri-upload-box-modal">

                                                    <div class="galeri-upload-icon">
                                                        <i class="bi bi-arrow-repeat"></i>
                                                    </div>

                                                    <div class="galeri-upload-text">

                                                        <strong>
                                                            Pilih foto baru
                                                        </strong>

                                                        <span>
                                                            Foto lama akan tetap digunakan jika kosong
                                                        </span>

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
                                        <div class="galeri-modal-footer">

                                            <button
                                                type="button"
                                                class="galeri-cancel-button"
                                                data-bs-dismiss="modal"
                                            >
                                                Batal
                                            </button>

                                            <button
                                                type="submit"
                                                class="galeri-save-button"
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


                        {{-- =========================
                            EMPTY STATE
                        ========================== --}}
                        <div class="galeri-empty-state">

                            <div class="galeri-empty-icon">
                                <i class="bi bi-images"></i>
                            </div>

                            <h3>
                                Belum Ada Foto Galeri
                            </h3>

                            <p>
                                Belum ada dokumentasi yang diunggah.
                                Gunakan formulir di samping untuk menambahkan foto pertama.
                            </p>

                        </div>


                    @endforelse

                </div>

            </div>

        </div>

    </div>

</div>

@endsection