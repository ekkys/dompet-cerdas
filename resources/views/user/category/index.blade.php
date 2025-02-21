@extends('layouts.app')
@section('css')
    <style>
        .icon-option {
            cursor: pointer;
            padding: 10px;
            border: 2px solid transparent;
            border-radius: 5px;
            transition: 0.2s;
        }

        .icon-option:hover {
            border: 2px solid #6c757d;
            background-color: #f8f9fa;
        }
    </style>
@endsection
@section('content')
    {{-- <div class="pagetitle">
        <h1>Kategori</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Kategori</h5>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal"
                            data-bs-target="#kategoriModal"> <i class="bi bi-bookmark-plus-fill"></i>
                            Buat Kategori Baru
                        </button>

                        <!-- Table with hoverable rows -->
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tipe</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{ $category->id_type }}
                                        </td>
                                        <td>
                                            <button class="btn btn-warning btn-md mb-2 mt-2"
                                                onclick="editCategory({{ $category }})" data-bs-toggle="modal"
                                                data-bs-target="#kategoriModal"><i class="bi bi-pencil"></i></button>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-md"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="kategoriModal" tabindex="-1" aria-labelledby="kategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="kategoriForm" action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="kategoriModalLabel">Tambah Kategori</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Nama Kategori" required>
                            <label for="name">Nama Kategori</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="type" name="type" required>
                                <option value="">Pilih Tipe</option>
                                <option value="0">Expense</option>
                                <option value="1">Income</option>
                                <option value="2">Transfer</option>
                            </select>
                            <label for="type">Tipe</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between">
            <span>Manajemen Kategori</span>
            <button class="btn btn-sm btn-light" data-bs-toggle="modal" data-bs-target="#categoryModal">Tambah</button>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between">
                    <span>🍔 Makanan</span> <span class="badge bg-danger">Pengeluaran</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>💰 Gaji</span> <span class="badge bg-success">Pemasukan</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="categoryModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input type="text" class="form-control" placeholder="Masukkan nama kategori">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <select class="form-select">
                                <option>Pemasukan</option>
                                <option>Pengeluaran</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ikon Kategori</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="iconInput"
                                    placeholder="Pilih ikon atau masukkan manual">
                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal"
                                    data-bs-target="#iconPickerModal">Pilih</button>
                            </div>
                            <div class="mt-2">
                                <i id="iconPreview" class="fas fa-question-circle fa-2x"></i> <!-- Preview Ikon -->
                            </div>
                        </div>
                        <button type="submit" class="btn btn-secondary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="iconPickerModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pilih Ikon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- Ikon FontAwesome -->
                        <div class="col-2 text-center mb-3">
                            <i class="fas fa-utensils fa-2x icon-option" data-icon="fa-utensils"></i>
                        </div>
                        <div class="col-2 text-center mb-3">
                            <i class="fas fa-shopping-cart fa-2x icon-option" data-icon="fa-shopping-cart"></i>
                        </div>
                        <div class="col-2 text-center mb-3">
                            <i class="fas fa-car fa-2x icon-option" data-icon="fa-car"></i>
                        </div>
                        <div class="col-2 text-center mb-3">
                            <i class="fas fa-home fa-2x icon-option" data-icon="fa-home"></i>
                        </div>
                        <div class="col-2 text-center mb-3">
                            <i class="fas fa-money-bill-wave fa-2x icon-option" data-icon="fa-money-bill-wave"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        document.querySelectorAll('.icon-option').forEach(icon => {
            icon.addEventListener('click', function() {
                let selectedIcon = this.getAttribute('data-icon');

                // Update input field dengan nama ikon
                document.getElementById('iconInput').value = selectedIcon;

                // Update preview ikon
                document.getElementById('iconPreview').className = `fas ${selectedIcon} fa-2x`;

                // Tutup modal setelah memilih ikon
                let modal = bootstrap.Modal.getInstance(document.getElementById('iconPickerModal'));
                modal.hide();
            });
        });
    </script>
@endsection
