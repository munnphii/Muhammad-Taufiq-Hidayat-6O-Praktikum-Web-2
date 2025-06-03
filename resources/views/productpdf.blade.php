<!DOCTYPE html>
<html>
<head>
    <title>Print PDF Produk</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        td, th { border: 1px solid #000; padding: 8px; }
    </style>
</head>
<body>
    <h2>{{ $title }}</h2>
    <p>Tanggal Print: {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
            <tr>
                <td><img src="{{ public_path('storage/products/'.$p->image) }}" width="50"></td>
                <td>{{ $p->title }}</td>
                <td>Rp {{ number_format($p->price, 0, ',', '.') }}</td>
                <td>{{ $p->stock }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
