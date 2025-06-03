<!DOCTYPE html>
<html>
<head>
    <title>Print PDF Category</title>
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
                <th>ID</th>
                <th>Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
