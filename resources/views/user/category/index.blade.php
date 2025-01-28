@extends('layouts.app')
@section('content')
    <div class="pagetitle">
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
    </div>
@endsection
