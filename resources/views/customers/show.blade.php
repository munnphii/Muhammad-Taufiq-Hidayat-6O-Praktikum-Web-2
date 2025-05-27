@extends('theme.default')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Customer</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>NIK:</strong> {{ $customer->nik }}</p>
            <p><strong>Nama:</strong> {{ $customer->name }}</p>
            <p><strong>Telepon:</strong> {{ $customer->telp }}</p>
            <p><strong>Email:</strong> {{ $customer->email }}</p>
            <p><strong>Alamat:</strong> {{ $customer->alamat }}</p>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
