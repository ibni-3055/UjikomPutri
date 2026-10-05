@extends('layouts.app')

@section('content')

@vite('resources/css/admin-users.css')

<div class="admin-users-page">

    {{-- =====================================================
         PAGE HEADER
         ===================================================== --}}
    <div class="users-page-header">

        <div class="users-header-left">

            <div class="users-header-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <div>

                <span class="users-eyebrow">
                    Hak Akses Pengguna
                </span>

                <h1 class="users-page-title">
                    Pengelolaan Admin
                </h1>

                <p class="users-page-description">
                    Kelola akun yang memiliki akses ke panel administrasi
                    website SMKN 4 Kota Bogor.
                </p>

            </div>

        </div>


        {{-- Jumlah Admin --}}
        <div class="users-count-badge">

            <div class="users-count-icon">
                <i class="bi bi-people-fill"></i>
            </div>

            <div>

                <span class="users-count-text">
                    TOTAL ADMIN
                </span>

                <span class="users-count-number">
                    {{ isset($users) ? count($users) : 0 }} akun
                </span>

            </div>

        </div>

    </div>


    {{-- =====================================================
         CONTENT
         ===================================================== --}}
    <div class="users-content-grid">


        {{-- =================================================
             TAMBAH ADMIN
             ================================================= --}}
        <div class="users-panel add-admin-panel">

            <div class="users-panel-header">

                <div class="users-panel-title">

                    <div class="users-panel-icon">
                        <i class="bi bi-person-plus-fill"></i>
                    </div>

                    <div>

                        <h5>
                            Tambah Admin
                        </h5>

                        <p>
                            Buat akun pengelola baru
                        </p>

                    </div>

                </div>

            </div>


            <div class="add-admin-body">

                {{-- INFO --}}
                <div class="add-admin-intro">

                    <i class="bi bi-info-circle-fill"></i>

                    <span>
                        Gunakan username yang mudah dikenali dan
                        password minimal 8 karakter.
                    </span>

                </div>


                {{-- SUCCESS --}}
                @if(session('success'))

                    <div
                        class="alert alert-success users-alert"
                        role="alert"
                    >

                        <i class="bi bi-check-circle-fill me-1"></i>

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert"
                            aria-label="Close"
                        ></button>

                    </div>

                @endif


                {{-- ERROR --}}
                @if($errors->any())

                    <div class="alert alert-danger users-alert">

                        <strong>
                            Periksa kembali:
                        </strong>

                        <ul class="mt-2 ps-3">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                {{-- FORM --}}
                <form
                    action="{{ route('admin.store') }}"
                    method="POST"
                >

                    @csrf


                    {{-- USERNAME --}}
                    <div class="users-form-group">

                        <label class="users-form-label">
                            Username
                        </label>

                        <div class="users-input-group">

                            <i class="bi bi-person users-input-icon"></i>

                            <input
                                type="text"
                                name="name"
                                class="form-control users-form-control"
                                placeholder="Contoh: admin01"
                                value="{{ old('name') }}"
                                required
                            >

                        </div>

                    </div>


                    {{-- PASSWORD --}}
                    <div class="users-form-group">

                        <label class="users-form-label">
                            Password
                        </label>

                        <div class="users-input-group">

                            <i class="bi bi-key users-input-icon"></i>

                            <input
                                type="password"
                                id="addPassword"
                                name="password"
                                class="form-control users-form-control"
                                placeholder="Minimal 8 karakter"
                                required
                                minlength="8"
                            >

                            <button
                                class="users-password-toggle"
                                type="button"
                                onclick="togglePassword('addPassword', this)"
                                aria-label="Tampilkan password"
                            >

                                <i class="bi bi-eye-slash"></i>

                            </button>

                        </div>

                        <span class="users-password-note">
                            <i class="bi bi-shield-check me-1"></i>
                            Password akan diproses secara aman oleh sistem.
                        </span>

                    </div>


                    {{-- SUBMIT --}}
                    <button
                        type="submit"
                        class="users-submit"
                    >

                        <i class="bi bi-person-plus-fill"></i>

                        Tambahkan Admin

                    </button>

                </form>

            </div>

        </div>


        {{-- =================================================
             DAFTAR ADMIN
             ================================================= --}}
        <div class="users-panel">

            <div class="users-panel-header">

                <div class="users-panel-title">

                    <div class="users-panel-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>

                    <div>

                        <h5>
                            Admin Terdaftar
                        </h5>

                        <p>
                            Akun yang memiliki akses ke panel admin
                        </p>

                    </div>

                </div>

            </div>


            <div class="admin-list-body">

                @forelse($users ?? [] as $u)

                    {{-- =================================================
                         ADMIN ITEM
                         ================================================= --}}
                    <div class="admin-list-item">

                        <div class="admin-list-user">

                            <div class="admin-list-avatar">

                                {{ strtoupper(substr($u->name, 0, 1)) }}

                            </div>

                            <div>

                                <h6 class="admin-list-name">
                                    {{ $u->name }}
                                </h6>

                                <div class="admin-list-status">

                                    <span>
                                        Password terenkripsi
                                    </span>

                                </div>

                            </div>

                        </div>


                        {{-- ACTIONS --}}
                        <div class="admin-list-actions">

                            {{-- EDIT --}}
                            <button
                                class="admin-action admin-action-edit"
                                data-bs-toggle="modal"
                                data-bs-target="#editAdminModal{{ $u->id }}"
                                title="Edit Admin"
                            >

                                <i class="bi bi-pencil-square"></i>

                                <span>
                                    Edit
                                </span>

                            </button>


                            {{-- DELETE --}}
                            <form
                                action="{{ route('admin.destroy', $u->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus admin {{ $u->name }}?')"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="admin-action admin-action-delete"
                                    title="Hapus Admin"
                                >

                                    <i class="bi bi-trash3-fill"></i>

                                    <span>
                                        Hapus
                                    </span>

                                </button>

                            </form>

                        </div>

                    </div>


                    {{-- =================================================
                         MODAL EDIT ADMIN
                         ================================================= --}}
                    <div
                        class="modal fade admin-edit-modal"
                        id="editAdminModal{{ $u->id }}"
                        tabindex="-1"
                        aria-hidden="true"
                    >

                        <div class="modal-dialog modal-dialog-centered">

                            <div class="modal-content">

                                <form
                                    action="{{ route('admin.update', $u->id) }}"
                                    method="POST"
                                >

                                    @csrf

                                    @method('PUT')


                                    {{-- HEADER --}}
                                    <div class="modal-header admin-edit-header">

                                        <div class="admin-edit-title">

                                            <span class="admin-edit-title-icon">
                                                <i class="bi bi-person-gear"></i>
                                            </span>

                                            <span>
                                                Edit Admin: {{ $u->name }}
                                            </span>

                                        </div>

                                        <button
                                            type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal"
                                            aria-label="Close"
                                        ></button>

                                    </div>


                                    {{-- BODY --}}
                                    <div class="admin-edit-body">

                                        {{-- USERNAME --}}
                                        <div class="users-form-group">

                                            <label class="users-form-label">
                                                Username
                                            </label>

                                            <div class="users-input-group">

                                                <i class="bi bi-person users-input-icon"></i>

                                                <input
                                                    type="text"
                                                    name="name"
                                                    class="form-control users-form-control"
                                                    value="{{ $u->name }}"
                                                    required
                                                >

                                            </div>

                                        </div>


                                        {{-- PASSWORD --}}
                                        <div class="users-form-group mb-0">

                                            <label class="users-form-label">
                                                Password Baru
                                            </label>

                                            <div class="users-input-group">

                                                <i class="bi bi-key users-input-icon"></i>

                                                <input
                                                    type="password"
                                                    id="editPassword{{ $u->id }}"
                                                    name="password"
                                                    class="form-control users-form-control"
                                                    minlength="8"
                                                    placeholder="Isi jika ingin mengganti password"
                                                >

                                                <button
                                                    class="users-password-toggle"
                                                    type="button"
                                                    onclick="togglePassword('editPassword{{ $u->id }}', this)"
                                                    aria-label="Tampilkan password"
                                                >

                                                    <i class="bi bi-eye-slash"></i>

                                                </button>

                                            </div>


                                            <div class="admin-security-note">

                                                <i class="bi bi-shield-lock-fill"></i>

                                                <span>
                                                    Password lama tersimpan secara terenkripsi
                                                    satu arah dan tidak dapat ditampilkan.
                                                </span>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- FOOTER --}}
                                    <div class="admin-edit-footer d-flex justify-content-end gap-2">

                                        <button
                                            type="button"
                                            class="btn btn-light admin-modal-button"
                                            data-bs-dismiss="modal"
                                        >
                                            Batal
                                        </button>

                                        <button
                                            type="submit"
                                            class="btn btn-primary admin-modal-button px-4"
                                        >

                                            <i class="bi bi-check2-circle me-1"></i>

                                            Simpan Perubahan

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                @empty

                    {{-- =================================================
                         EMPTY STATE
                         ================================================= --}}
                    <div class="admin-empty">

                        <div class="admin-empty-icon">

                            <i class="bi bi-people"></i>

                        </div>

                        <p class="admin-empty-title">
                            Belum ada admin terdaftar
                        </p>

                        <p class="admin-empty-text">
                            Gunakan form Tambah Admin untuk membuat akun baru.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     PASSWORD TOGGLE
     ========================================================= --}}
<script>

    function togglePassword(inputId, button) {

        const input =
            document.getElementById(inputId);

        const icon =
            button.querySelector('i');


        if (input.type === 'password') {

            input.type = 'text';

            icon.classList.replace(
                'bi-eye-slash',
                'bi-eye'
            );

        } else {

            input.type = 'password';

            icon.classList.replace(
                'bi-eye',
                'bi-eye-slash'
            );

        }

    }

</script>

@endsection