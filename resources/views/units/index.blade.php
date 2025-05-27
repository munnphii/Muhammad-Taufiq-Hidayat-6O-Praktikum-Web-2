@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Unit</h1>
    <a href="{{ route('units.create') }}" class="btn btn-success mb-3">Add Unit</a>
    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>Name</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($units as $unit)
            <tr>
                <td>{{ $unit->id }}</td>
                <td>{{ $unit->name }}</td>
                <td>
                    <a href="{{ route('units.show', $unit->id) }}" class="btn btn-dark btn-sm">Show</a>
                    <a href="{{ route('units.edit', $unit->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('units.destroy', $unit->id) }}" method="POST" style="display:inline" onsubmit="return confirm('r u sure?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delate</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $units->links() }}
</div>
@endsection

@section('alertload')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
@if(session('success'))
Swal.fire({ icon: 'success', title: 'Sukses', text: "{{ session('success') }}", timer: 2000, showConfirmButton: false });
@endif
</script>
@endsection
