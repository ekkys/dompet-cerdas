@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Kategori</h5>
                            <a href="{{ route('categories.create') }}" class="btn btn-secondary"> + Tambah
                                Kategori</a>
                        </div>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @switch($category->id_type)
                                                @case('income')
                                                    <span class="badge bg-success">Pemasukan</span>
                                                @break

                                                @case('outcome')
                                                    <span class="badge bg-danger">Pengeluaran</span>
                                                @break

                                                @case('transfer')
                                                    <span class="badge bg-warning">Pindah Dompet</span>
                                                @break
                                            @endswitch
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus kategori ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
