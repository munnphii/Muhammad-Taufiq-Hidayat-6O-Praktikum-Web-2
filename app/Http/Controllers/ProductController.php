<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    /**
     * index
     * 
     * @return void
     */
    public function index() : View
    {
        //get all products
        $products = Product::latest()->paginate(10);

        //render view with products
        return view('products.index', compact('products'));
    }

    /**
     * index
     * 
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * store
     * 
     * @param mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric'
            ]);

            //upload image
            $image = $request->file('image');
            $image->storeAs('public/products', $image ->hashName());

            //create product
            Product::create([
                'image' => $image->hashName(),
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock
                ]);

                //redirect to index
                return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);

    }
    public function show(string $id): View
    {

        $product = Product::findOrFail($id);


        return view ('products.show', compact('product'));
    }

    public function edit(string $id): View
    {

        $product = Product::findOrFail($id);


        return view ('products.edit', compact('product'));
    }

    public function update(Request $request, $id): RedirectResponse
{
    // Validasi form
    $request->validate([
        'image'       => 'image|mimes:jpeg,jpg,png|max:2048',
        'title'       => 'required|min:5',
        'description' => 'required|min:10',
        'price'       => 'required|numeric',
        'stock'       => 'required|numeric',
    ]);

    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Cek apakah ada file gambar diupload
    if ($request->hasFile('image')) {
        // Upload gambar baru
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        // Hapus gambar lama
        Storage::delete('public/products/' . $product->image);

        // Update produk dengan gambar baru
        $product->update([
            'image'       => $image->hashName(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);
    } else {
        // Update produk tanpa mengubah gambar
        $product->update([
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);
    }

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('products.index')->with([
        'success' => 'Data Berhasil Diubah!',
    ]);
    }

    public function destroy($id): RedirectResponse
    {
    // Ambil produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Hapus gambar dari storage
    Storage::delete('public/products/' . $product->image);

    // Hapus produk dari database
    $product->delete();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('products.index')->with([
        'success' => 'Data Berhasil Dihapus!',
    ]);

    }
    public function printPdf()
    {
    $products = Product::all();

    $data = [
        'title' => 'Data Produk',
        'date' => date('d-m-Y'),
        'products' => $products
    ];

    $pdf = PDF::loadView('productpdf', $data)->setPaper('A4', 'landscape');

    return $pdf->stream('Data_Produk.pdf');
    }


}