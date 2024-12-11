<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparepart Detail</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .table { width: 100%; border-collapse: collapse; }
        .table th, .table td { border: 1px solid #ddd; padding: 8px; }
        .table th { text-align: left; }
        .photo { text-align: center; margin-top: 10px; }
        .photo img { max-width: 150px; height: auto; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Detail Sparepart</h1>
    </div>
    <table class="table">
        <tr>
            <th>Nama Sparepart</th>
            <td>{{ $sparepart->sparepart_name }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>Rp {{ number_format($sparepart->price, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $sparepart->description }}</td>
        </tr>
    </table>
    @if ($sparepart->photo)
        <div class="photo">
            <h3>Foto Sparepart</h3>
            <img src="{{ public_path('storage/' . $sparepart->photo) }}" alt="{{ $sparepart->sparepart_name }}">
        </div>
    @endif
</body>
</html>
