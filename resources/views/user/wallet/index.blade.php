@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Daftar Dompet</h1>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title">Dompet</h5>
                            <a href="{{ route('wallets.create') }}" class="btn btn-primary">Tambah Dompet</a>
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
                                    <th>Nama Dompet</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wallets as $wallet)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $wallet->name }}</td>
                                        <td>Rp {{ number_format($wallet->jumlah, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('wallets.edit', $wallet->id) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('wallets.destroy', $wallet->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus dompet ini?')">Hapus</button>
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
