@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Edit Kategori</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Form Edit Kategori</h5>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name', $category->name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_type" class="form-label">Jenis</label>
                                <select id="id_type" name="id_type" class="form-select">
                                    <option value="income" {{ $category->id_type == 'income' ? 'selected' : '' }}>Pemasukan
                                    </option>
                                    <option value="outcome" {{ $category->id_type == 'outcome' ? 'selected' : '' }}>
                                        Pengeluaran</option>
                                    <option value="transfer" {{ $category->id_type == 'transfer' ? 'selected' : '' }}>
                                        Pindahkan</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
