@extends('theme.default')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Customer</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Add Customer</a>
    <table class="table table-bordered">
        <thead>
            <tr><th>ID</th><th>NIK</th><th>Name</th><th>Telepon</th><th>Actions</th></tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->nik }}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->telp }}</td>
                <td>
                    <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-dark btn-sm">Show</a>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delate</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $customers->links() }}
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
