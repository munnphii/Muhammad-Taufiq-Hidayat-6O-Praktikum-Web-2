@extends('theme.default')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Unit</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $unit->name }}</p>
            <p><strong>Deskripsi:</strong> {{ $unit->description }}</p>
            <a href="{{ route('units.index') }}" class="btn btn-secondary">BACK</a>
        </div>
    </div>
</div>
@endsection
