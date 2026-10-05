@extends('layouts.app')

@section('content')

@vite('resources/css/admin-kelas.css')

<div class="admin-kelas-page">

    {{-- =========================
         HEADER
    ========================== --}}
    <div class="kelas-page-header">

        <div class="kelas-header-left">
            <div class="kelas-header-icon">
                <i class="bi bi-door-open-fill"></i>
            </div>

            <div>
                <span class="kelas-eyebrow">Data Akademik</span>

                <h1 class="kelas-page-title">
                    Pengelolaan Data Kelas
                </h1>

                <p class="kelas-page-description">
                    Atur daftar kelas dan kelola data siswa pada setiap kelas.
                </p>
            </div>
        </div>

        <div class="kelas-count-badge">
            <div class="kelas-count-icon">
                <i class="bi bi-door-closed-fill"></i>
            </div>

            <div>
                <span class="kelas-count-text">TOTAL KELAS</span>

                <span class="kelas-count-number">
                    {{ isset($kelases) ? count($kelases) : (isset($kelas) ? count($kelas) : 0) }}
                    Kelas
                </span>
            </div>
        </div>

    </div>


    {{-- =========================
         GRID UTAMA
    ========================== --}}
    <div class="kelas-content-grid">

        {{-- =========================
             FORM TAMBAH KELAS
        ========================== --}}
        <div class="kelas-panel tambah-kelas-panel">

            <div class="kelas-panel-header">

                <div class="kelas-panel-title">

                    <div class="kelas-panel-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>

                    <div>
                        <h5>Tambah Kelas Baru</h5>
                        <p>Buat data kelas baru</p>
                    </div>

                </div>

            </div>


            <div class="tambah-kelas-body">

                {{-- INFO --}}
                <div class="kelas-info-box">

                    <div class="kelas-info-icon">
                        <i class="bi bi-info-circle-fill"></i>
                    </div>

                    <div>
                        <strong>Buat kelas dengan mudah</strong>

                        <span>
                            Pilih tingkat, jurusan, dan nomor kelas.
                            Sistem akan menggabungkannya secara otomatis.
                        </span>
                    </div>

                </div>


                {{-- SUCCESS --}}
                @if(session('success'))

                    <div class="alert alert-success kelas-alert" role="alert">

                        <div class="kelas-alert-content">
                            <i class="bi bi-check-circle-fill"></i>

                            <span>
                                {{ session('success') }}
                            </span>
                        </div>

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close">
                        </button>

                    </div>

                @endif


                {{-- ERROR --}}
                @if($errors->any())

                    <div class="alert alert-danger kelas-alert" role="alert">

                        <div class="kelas-alert-content">

                            <i class="bi bi-exclamation-circle-fill"></i>

                            <div>
                                <strong>Periksa kembali data:</strong>

                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                    </div>

                @endif


                {{-- FORM --}}
                <form
                    action="{{ route('admin.kelas.store') }}"
                    method="POST"
                    id="formTambahKelas"
                >

                    @csrf

                    {{-- Hidden input tetap dipertahankan --}}
                    <input
                        type="hidden"
                        name="nama_kelas"
                        id="nama_kelas_input"
                    >


                    {{-- TINGKAT --}}
                    <div class="kelas-form-group">

                        <label class="kelas-form-label">
                            <i class="bi bi-layers-fill"></i>
                            Tingkat Kelas
                        </label>

                        <div class="kelas-select-wrapper">

                            <i class="bi bi-mortarboard-fill kelas-select-icon"></i>

                            <select
                                id="select_tingkat"
                                class="form-select kelas-form-control"
                                required
                            >
                                <option value="" disabled selected>
                                    Pilih tingkat kelas
                                </option>

                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>

                            </select>

                        </div>

                    </div>


                    {{-- JURUSAN --}}
                    <div class="kelas-form-group">

                        <label class="kelas-form-label">
                            <i class="bi bi-diagram-3-fill"></i>
                            Jurusan
                        </label>

                        <div class="kelas-select-wrapper">

                            <i class="bi bi-diagram-3-fill kelas-select-icon"></i>

                            <select
                                id="select_jurusan"
                                class="form-select kelas-form-control"
                                required
                            >

                                <option value="" disabled selected>
                                    Pilih jurusan
                                </option>

                                <option value="Teknik Otomotif">
                                    Teknik Otomotif
                                </option>

                                <option value="Teknik Pengelasan">
                                    Teknik Pengelasan
                                </option>

                                <option value="Teknik Komputer Jaringan">
                                    Teknik Komputer Jaringan
                                </option>

                                <option value="Pemrograman Perangkat Lunak dan Gim">
                                    Pemrograman Perangkat Lunak dan Gim
                                </option>

                            </select>

                        </div>

                    </div>


                    {{-- NOMOR --}}
                    <div class="kelas-form-group">

                        <label class="kelas-form-label">
                            <i class="bi bi-123"></i>
                            Nomor Kelas
                        </label>

                        <div class="kelas-select-wrapper">

                            <i class="bi bi-grid-3x3-gap-fill kelas-select-icon"></i>

                            <select
                                id="select_nomor"
                                class="form-select kelas-form-control"
                                required
                            >

                                <option value="" disabled selected>
                                    Pilih nomor kelas
                                </option>

                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>

                            </select>

                        </div>

                    </div>


                    {{-- PREVIEW --}}
                    <div class="kelas-preview">

                        <div class="kelas-preview-icon">
                            <i class="bi bi-eye-fill"></i>
                        </div>

                        <div>

                            <span class="kelas-preview-label">
                                Format nama kelas
                            </span>

                            <strong id="previewNamaKelas">
                                Pilih data di atas
                            </strong>

                        </div>

                    </div>


                    {{-- BUTTON --}}
                    <button
                        type="submit"
                        class="kelas-submit"
                    >

                        <i class="bi bi-plus-circle-fill"></i>

                        <span>Tambahkan Kelas</span>

                    </button>

                </form>

            </div>

        </div>


        {{-- =========================
             DAFTAR KELAS
        ========================== --}}
        <div class="kelas-panel daftar-kelas-panel">

            <div class="kelas-panel-header daftar-header">

                <div class="kelas-panel-title">

                    <div class="kelas-panel-icon">
                        <i class="bi bi-list-ul"></i>
                    </div>

                    <div>
                        <h5>Daftar Kelas</h5>

                        <p>
                            Seluruh kelas yang terdaftar dalam sistem
                        </p>
                    </div>

                </div>

            </div>


            <div class="daftar-kelas-body">

                @forelse($kelases ?? $kelas ?? [] as $k)

                    {{-- ITEM KELAS --}}
                    <div class="kelas-list-item">

                        <div class="kelas-list-main">

                            <div class="kelas-list-icon">
                                <i class="bi bi-door-closed-fill"></i>
                            </div>

                            <div class="kelas-list-info">

                                <h6>
                                    {{ $k->nama_kelas }}
                                </h6>

                                <div class="kelas-list-meta">

                                    <span>
                                        <i class="bi bi-people-fill"></i>

                                        {{ $k->murids_count ?? 0 }}
                                        Siswa
                                    </span>

                                    <span class="kelas-meta-divider">
                                        •
                                    </span>

                                    <span>
                                        <i class="bi bi-check-circle-fill"></i>
                                        Aktif
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- ACTION --}}
                        <div class="kelas-list-actions">

                            {{-- KELOLA MURID --}}
                            <a
                                href="{{ route('admin.kelas.show', $k->id) }}"
                                class="kelas-action kelas-action-student"
                                title="Kelola Murid"
                            >

                                <i class="bi bi-people-fill"></i>

                                <span>
                                    Kelola Murid
                                </span>

                            </a>


                            {{-- EDIT --}}
                            <button
                                class="kelas-action kelas-action-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#editKelasModal{{ $k->id }}"
                                title="Edit Nama Kelas"
                            >

                                <i class="bi bi-pencil-square"></i>

                                <span>
                                    Edit
                                </span>

                            </button>


                            {{-- DELETE --}}
                            <form
                                action="{{ route('admin.kelas.destroy', $k->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas {{ $k->nama_kelas }}?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="kelas-action kelas-action-delete"
                                    title="Hapus Kelas"
                                >

                                    <i class="bi bi-trash3-fill"></i>

                                    <span>
                                        Hapus
                                    </span>

                                </button>

                            </form>

                        </div>

                    </div>


                    {{-- =========================
                         MODAL EDIT
                    ========================== --}}
                    <div
                        class="modal fade kelas-edit-modal"
                        id="editKelasModal{{ $k->id }}"
                        tabindex="-1"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">

                                <form
                                    action="{{ route('admin.kelas.update', $k->id) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('PUT')


                                    {{-- HEADER --}}
                                    <div class="modal-header kelas-modal-header">

                                        <div class="kelas-modal-title">

                                            <div class="kelas-modal-icon">
                                                <i class="bi bi-pencil-square"></i>
                                            </div>

                                            <div>

                                                <span>
                                                    Pengaturan Kelas
                                                </span>

                                                <strong>
                                                    Edit {{ $k->nama_kelas }}
                                                </strong>

                                            </div>

                                        </div>

                                        <button
                                            type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>

                                    </div>


                                    {{-- BODY --}}
                                    <div class="modal-body kelas-modal-body">

                                        <div class="kelas-form-group mb-0">

                                            <label class="kelas-form-label">
                                                <i class="bi bi-door-open-fill"></i>
                                                Nama Kelas
                                            </label>

                                            <div class="kelas-input-wrapper">

                                                <i class="bi bi-door-closed-fill kelas-input-icon"></i>

                                                <input
                                                    type="text"
                                                    name="nama_kelas"
                                                    class="form-control kelas-text-control"
                                                    value="{{ $k->nama_kelas }}"
                                                    required
                                                >

                                            </div>

                                        </div>

                                        <div class="kelas-modal-note">

                                            <i class="bi bi-info-circle-fill"></i>

                                            <span>
                                                Pastikan nama kelas sesuai dengan
                                                data akademik sekolah.
                                            </span>

                                        </div>

                                    </div>


                                    {{-- FOOTER --}}
                                    <div class="modal-footer kelas-modal-footer">

                                        <button
                                            type="button"
                                            class="kelas-modal-cancel"
                                            data-bs-dismiss="modal"
                                        >
                                            Batal
                                        </button>

                                        <button
                                            type="submit"
                                            class="kelas-modal-save"
                                        >

                                            <i class="bi bi-check2-circle"></i>

                                            Simpan Perubahan

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    {{-- EMPTY STATE --}}
                    <div class="kelas-empty">

                        <div class="kelas-empty-icon">
                            <i class="bi bi-door-closed"></i>
                        </div>

                        <h6>
                            Belum Ada Data Kelas
                        </h6>

                        <p>
                            Belum ada kelas yang ditambahkan ke dalam sistem.
                        </p>

                        <span>
                            Gunakan form Tambah Kelas untuk membuat kelas baru.
                        </span>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>


{{-- =========================
     JAVASCRIPT
========================== --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const form = document.getElementById('formTambahKelas');

    const tingkat = document.getElementById('select_tingkat');
    const jurusan = document.getElementById('select_jurusan');
    const nomor = document.getElementById('select_nomor');

    const hiddenInput = document.getElementById('nama_kelas_input');

    const preview = document.getElementById('previewNamaKelas');


    function updateNamaKelas() {

        const tingkatValue = tingkat.value;
        const jurusanValue = jurusan.value;
        const nomorValue = nomor.value;


        if (
            tingkatValue &&
            jurusanValue &&
            nomorValue
        ) {

            const namaKelasUtuh =
                `${tingkatValue} ${jurusanValue} ${nomorValue}`;

            hiddenInput.value = namaKelasUtuh;

            preview.textContent = namaKelasUtuh;

            preview.classList.add('active');

        } else {

            hiddenInput.value = '';

            preview.textContent =
                'Pilih data di atas';

            preview.classList.remove('active');

        }

    }


    tingkat.addEventListener('change', updateNamaKelas);

    jurusan.addEventListener('change', updateNamaKelas);

    nomor.addEventListener('change', updateNamaKelas);


    form.addEventListener('submit', function () {

        updateNamaKelas();

    });

});

</script>

@endsection