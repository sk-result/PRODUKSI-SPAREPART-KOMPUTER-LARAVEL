@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-3">Tambah Sparepart</h1>

            <!-- Flash message untuk error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('spareparts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="sparepart_name" class="form-label">Nama Sparepart</label>
                    <input type="text" class="form-control" id="sparepart_name" name="sparepart_name" placeholder="Masukkan nama sparepart" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="photo" name="photo" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('spareparts.dashboard') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
