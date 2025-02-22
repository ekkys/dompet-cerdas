@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kategori</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama kategori"
                    required>
            </div>

            <div class="mb-3">
                <label for="id_type" class="form-label">Jenis</label>
                <select id="id_type" name="id_type" class="form-select" required>
                    <option value="income">Pemasukan</option>
                    <option value="outcome">Pengeluaran</option>
                    <option value="transfer">Pindah Dompet</option>
                </select>
            </div>

            <button type="submit" class="btn btn-secondary">Simpan</button>
        </form>
    </div>
@endsection
