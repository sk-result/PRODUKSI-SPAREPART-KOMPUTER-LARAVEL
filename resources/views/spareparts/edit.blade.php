@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Sparepart</h2>

    <form action="{{ route('spareparts.update', $sparepart->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="sparepart_name" class="form-label">Sparepart Name</label>
            <input type="text" class="form-control" id="sparepart_name" name="sparepart_name" value="{{ old('sparepart_name', $sparepart->sparepart_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $sparepart->price) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $sparepart->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if ($sparepart->photo)
                <img src="{{ asset('storage/' . $sparepart->photo) }}" alt="{{ $sparepart->sparepart_name }}" class="img-thumbnail mt-2" style="max-width: 150px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('spareparts.dashboard') }}" class="btn btn-secondary">Cancel</a>
        <a href="{{ route('spareparts.download-pdf', $sparepart->id) }}" class="btn btn-success">Download PDF</a>

    </form>
</div>
@endsection
