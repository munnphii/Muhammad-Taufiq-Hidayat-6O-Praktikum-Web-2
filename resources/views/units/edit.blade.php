@extends('theme.default')
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">{{ isset($unit) ? 'Edit' : 'Add' }} Satuan</h1>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ isset($unit) ? route('units.update', $unit->id) : route('units.store') }}" method="POST">
                @csrf
                @if(isset($unit)) @method('PUT') @endif
                <div class="mb-3"><label>Name</label><input type="text" name="name" class="form-control" value="{{ old('name', $unit->name ?? '') }}"></div>
                <div class="mb-3"><label>Deskripsi</label><textarea name="description" class="form-control">{{ old('description', $unit->description ?? '') }}</textarea></div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('units.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
