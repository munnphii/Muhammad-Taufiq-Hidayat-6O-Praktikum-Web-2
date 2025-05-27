@extends('theme.default')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ isset($customer) ? 'Edit' : 'Tambah' }} Costumer</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST">
                @csrf
                @if(isset($customer)) @method('PUT') @endif
                <div class="mb-3"><label>NIK</label><input type="text" name="nik" class="form-control" value="{{ old('nik', $customer->nik ?? '') }}"></div>
                <div class="mb-3"><label>Nama</label><input type="text" name="name" class="form-control" value="{{ old('name', $customer->name ?? '') }}"></div>
                <div class="mb-3"><label>Telepon</label><input type="text" name="telp" class="form-control" value="{{ old('telp', $customer->telp ?? '') }}"></div>
                <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ old('email', $customer->email ?? '') }}"></div>
                <div class="mb-3"><label>Alamat</label><textarea name="alamat" class="form-control">{{ old('alamat', $customer->alamat ?? '') }}</textarea></div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
