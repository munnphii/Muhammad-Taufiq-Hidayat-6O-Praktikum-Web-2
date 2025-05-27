<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        $customers = Customer::latest()->paginate(10);
        return view('customers.index', compact('customers'));
    }

    public function create(): View
    {
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nik' => 'required|unique:customers,nik|max:20',
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'email' => 'required|email|unique:customers,email',
            'alamat' => 'required|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Data pelanggan berhasil ditambahkan!');
    }

    public function show(string $id): View
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit(string $id): View
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'nik' => 'required|max:20|unique:customers,nik,' . $customer->id,
            'name' => 'required|string|max:255',
            'telp' => 'required|string|max:20',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'alamat' => 'required|string',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Data pelanggan berhasil dihapus!');
    }
}
