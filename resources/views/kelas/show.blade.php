@extends('layouts.app')

@section('content')

@vite('resources/css/admin-kelas-show.css')

<div class="admin-kelas-show-page">

    {{-- =========================
         HEADER
    ========================== --}}
    <div class="kelas-show-header">

        <div class="kelas-show-header-left">

            <div class="kelas-show-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>

                <span class="kelas-show-eyebrow">
                    Data Akademik
                </span>

                <h1 class="kelas-show-title">
                    Manajemen Siswa
                </h1>

                <div class="kelas-show-subtitle">

                    <span class="kelas-name-badge">
                        <i class="bi bi-door-closed-fill"></i>
                        {{ $kelas->nama_kelas }}
                    </span>

                    <span class="kelas-student-total">
                        <i class="bi bi-people"></i>
                        {{ $kelas->murids->count() }} Murid Terdaftar
                    </span>

                </div>

            </div>

        </div>


        <a
            href="{{ route('admin.kelas.index') }}"
            class="kelas-back-button"
        >
            <i class="bi bi-arrow-left"></i>
            <span>Kembali ke Kelas</span>
        </a>

    </div>


    {{-- =========================
         ALERT SUCCESS
    ========================== --}}
    @if(session('success'))

        <div class="kelas-show-alert kelas-show-alert-success">

            <div class="kelas-alert-left">

                <div class="kelas-alert-icon">
                    <i class="bi bi-check-lg"></i>
                </div>

                <div>
                    <strong>Berhasil</strong>

                    <span>
                        {{ session('success') }}
                    </span>
                </div>

            </div>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
            ></button>

        </div>

    @endif


    {{-- =========================
         ALERT ERROR
    ========================== --}}
    @if($errors->any())

        <div class="kelas-show-alert kelas-show-alert-danger">

            <div class="kelas-alert-left">

                <div class="kelas-alert-icon">
                    <i class="bi bi-exclamation-lg"></i>
                </div>

                <div>

                    <strong>Data belum dapat disimpan</strong>

                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>

            </div>

        </div>

    @endif


    {{-- =========================
         MAIN GRID
    ========================== --}}
    <div class="kelas-show-grid">


        {{-- =========================
             TAMBAH MURID
        ========================== --}}
        <div class="kelas-show-panel add-student-panel">

            <div class="kelas-show-panel-header">

                <div class="kelas-show-panel-title">

                    <div class="kelas-show-panel-icon">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>

                    <div>

                        <h5>
                            Tambah Murid
                        </h5>

                        <p>
                            Daftarkan siswa ke kelas ini
                        </p>

                    </div>

                </div>

            </div>


            <div class="add-student-body">

                <div class="student-info-box">

                    <div class="student-info-icon">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <div>

                        <strong>
                            Data siswa
                        </strong>

                        <span>
                            Masukkan NISN, NIS, dan nama lengkap
                            siswa sesuai data sekolah.
                        </span>

                    </div>

                </div>


                <form
                    action="{{ route('admin.murid.store', $kelas->id) }}"
                    method="POST"
                >

                    @csrf


                    {{-- NISN --}}
                    <div class="student-form-group">

                        <label class="student-form-label">
                            <i class="bi bi-card-text"></i>
                            NISN
                        </label>

                        <div class="student-input-wrapper">

                            <i class="bi bi-person-vcard student-input-icon"></i>

                            <input
                                type="text"
                                name="nisn"
                                class="form-control student-form-control"
                                placeholder="Masukkan nomor NISN"
                                value="{{ old('nisn') }}"
                                required
                            >

                        </div>

                    </div>


                    {{-- NIS --}}
                    <div class="student-form-group">

                        <label class="student-form-label">
                            <i class="bi bi-hash"></i>
                            NIS
                        </label>

                        <div class="student-input-wrapper">

                            <i class="bi bi-hash student-input-icon"></i>

                            <input
                                type="text"
                                name="nis"
                                class="form-control student-form-control"
                                placeholder="Masukkan nomor NIS"
                                value="{{ old('nis') }}"
                                required
                            >

                        </div>

                    </div>


                    {{-- NAMA --}}
                    <div class="student-form-group">

                        <label class="student-form-label">
                            <i class="bi bi-person-fill"></i>
                            Nama Lengkap
                        </label>

                        <div class="student-input-wrapper">

                            <i class="bi bi-person student-input-icon"></i>

                            <input
                                type="text"
                                name="nama"
                                class="form-control student-form-control"
                                placeholder="Masukkan nama lengkap siswa"
                                value="{{ old('nama') }}"
                                required
                            >

                        </div>

                    </div>


                    <button
                        type="submit"
                        class="student-submit-button"
                    >

                        <i class="bi bi-person-plus-fill"></i>

                        <span>
                            Simpan Murid
                        </span>

                    </button>

                </form>

            </div>

        </div>


        {{-- =========================
             DAFTAR SISWA
        ========================== --}}
        <div class="kelas-show-panel student-list-panel">

            <div class="kelas-show-panel-header student-list-header">

                <div class="kelas-show-panel-title">

                    <div class="kelas-show-panel-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>

                        <h5>
                            Daftar Siswa
                        </h5>

                        <p>
                            {{ $kelas->murids->count() }} siswa
                            di {{ $kelas->nama_kelas }}
                        </p>

                    </div>

                </div>


                {{-- SEARCH --}}
                <div class="student-search">

                    <i class="bi bi-search"></i>

                    <input
                        type="text"
                        id="searchMurid"
                        placeholder="Cari siswa..."
                        autocomplete="off"
                    >

                </div>

            </div>


            <div class="student-list-body">

                @forelse($kelas->murids as $m)

                    <div
                        class="student-list-item"
                        data-student-row
                    >

                        <div class="student-list-main">

                            {{-- AVATAR --}}
                            <div class="student-avatar">

                                {{ strtoupper(substr($m->nama, 0, 1)) }}

                            </div>


                            {{-- DATA --}}
                            <div class="student-list-info">

                                <h6>
                                    {{ $m->nama }}
                                </h6>

                                <div class="student-meta">

                                    <span>
                                        <i class="bi bi-person-vcard"></i>
                                        NISN: {{ $m->nisn }}
                                    </span>

                                    <span class="student-meta-divider">
                                        •
                                    </span>

                                    <span>
                                        <i class="bi bi-hash"></i>
                                        NIS: {{ $m->nis }}
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- DELETE --}}
                        <form
                            action="{{ route('admin.murid.destroy', $m->id) }}"
                            method="POST"
                            class="student-delete-form"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="student-delete-button"
                                title="Hapus Siswa"
                                onclick="return confirm('Hapus {{ $m->nama }}?')"
                            >

                                <i class="bi bi-trash3-fill"></i>

                                <span>
                                    Hapus
                                </span>

                            </button>

                        </form>

                    </div>

                @empty

                    <div class="student-empty">

                        <div class="student-empty-icon">
                            <i class="bi bi-people"></i>
                        </div>

                        <h6>
                            Belum Ada Siswa
                        </h6>

                        <p>
                            Belum ada siswa yang terdaftar
                            di kelas ini.
                        </p>

                        <span>
                            Gunakan form Tambah Murid untuk
                            menambahkan siswa.
                        </span>

                    </div>

                @endforelse


                {{-- NO SEARCH RESULT --}}
                <div
                    id="noSearchResult"
                    class="student-no-result"
                    style="display: none;"
                >

                    <div class="student-no-result-icon">
                        <i class="bi bi-search"></i>
                    </div>

                    <h6>
                        Siswa Tidak Ditemukan
                    </h6>

                    <p>
                        Tidak ada siswa yang sesuai
                        dengan pencarian.
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>


{{-- =========================
     SEARCH SCRIPT
========================== --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('searchMurid');

    const rows =
        document.querySelectorAll('[data-student-row]');

    const noResult =
        document.getElementById('noSearchResult');


    if (!searchInput) {
        return;
    }


    searchInput.addEventListener('input', function () {

        const value =
            this.value.toLowerCase().trim();

        let visibleRows = 0;


        rows.forEach(function (row) {

            const text =
                row.textContent.toLowerCase();

            if (text.includes(value)) {

                row.style.display = '';

                visibleRows++;

            } else {

                row.style.display = 'none';

            }

        });


        if (noResult) {

            noResult.style.display =
                value && visibleRows === 0
                    ? 'block'
                    : 'none';

        }

    });

});

</script>

@endsection