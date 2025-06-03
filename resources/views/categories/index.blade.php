@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Category</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">ADD CATEGORY</a>
            <div class="float-end">
                <a href="{{ route('category.printpdf') }}" class="btn btn-danger btn-md me-2">Cetak PDF</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th width="20%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline" onsubmit="return confirm(' r u sure?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">DELATE</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="3" class="text-center">Belum ada data.</td></tr>
                    @endforelse
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
</div>
@endsection
