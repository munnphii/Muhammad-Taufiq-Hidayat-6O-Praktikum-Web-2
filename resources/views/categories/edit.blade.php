@extends('theme.default')
@section('content')
<div class="container">
    <h3>Edit Category</h3>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group mb-2">
            <label>Name Category</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-primary">UPDATE</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">BACK</a>
    </form>
</div>
@endsection
