@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Name Category</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Add name category" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
                <a href="{{ route('categories.index') }}" class="btn btn-warning">CANCEL</a>
            </form>
        </div>
    </div>
</div>
@endsection
