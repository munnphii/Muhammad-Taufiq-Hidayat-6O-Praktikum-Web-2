@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Detail Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Category</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <h4>Name Category:</h4>
            <p>{{ $category->name }}</p>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">BACK</a>
        </div>
    </div>
</div>
@endsection
