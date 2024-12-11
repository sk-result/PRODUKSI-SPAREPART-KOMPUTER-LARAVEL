@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-3">Daftar Sparepart</h1>

            <!-- Flash message untuk sukses -->
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tombol tambah -->
            <div class="my-3">
                <a href="{{ route('spareparts.create') }}" class="btn btn-primary">Tambah Sparepart</a>
            </div>

            <!-- Tabel data sparepart -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Sparepart</th>
                            <th>Harga</th>
                            <th>Deskripsi</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($spareparts as $sparepart)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sparepart->sparepart_name }}</td>
                                <td>Rp {{ number_format($sparepart->price, 0, ',', '.') }}</td>
                                <td>{{ $sparepart->description }}</td>
                                <td>
                                    @if ($sparepart->photo)
                                        <img src="{{ asset('storage/' . $sparepart->photo) }}" alt="{{ $sparepart->sparepart_name }}" class="img-thumbnail" style="max-width: 150px;">
                                    @else
                                        <span class="text-muted">Tidak ada foto</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('spareparts.edit', $sparepart->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('spareparts.destroy', $sparepart->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus sparepart ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data sparepart.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
