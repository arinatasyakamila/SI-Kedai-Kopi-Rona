<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $barang = Barang::when($request->input('keyword'), function ($query) use ($request) {
            return $query->where(function ($query) use ($request) {
                $query->where('kategori_barang_id', 'like', "%{$request->input('keyword')}%")
                    ->orWhere('kode', 'like', "%{$request->input('keyword')}%");
            })->orWhere('bahan_baku', 'like', "%{$request->input('keyword')}%");
        })->get();

        return view('barang.barang', [
            'barangs' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = KategoriBarang::get();
        return view('barang.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'kode' => 'required|unique:barangs',
            'bahan_baku' => 'required',
            'satuan' => 'required',
            'stock' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $barang = new Barang();
        $barang->kategori_barang_id = $request->input('kategori');
        $barang->kode = $request->input('kode');
        $barang->bahan_baku = $request->input('bahan_baku');
        $barang->satuan = $request->input('satuan');
        $barang->stock = $request->input('stock');
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/gambar_barang'), $namaFile);
            $barang->gambar = $namaFile;
        }

        $barang->save();

        return redirect('/barang')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategori = KategoriBarang::all();
        $barang = Barang::where('id', $id)->get();
        return view('barang.view', compact('barang', 'kategori'));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = KategoriBarang::all();
        $barang = Barang::find($id);
        return view('barang.update', compact('barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);

        $request->validate([
            'kategori' => 'required',
            'kode' => 'required',
            'bahan_baku' => 'required',
            'satuan' => 'required',
            'stock' => 'required'
        ]);

        $barang->update([
            'kode' => $request->input('kode'),
            'kategori_barang_id' => $request->input('kategori'),
            'bahan_baku' => $request->input('bahan_baku'),
            'satuan' => $request->input('satuan'),
            'stock' => $request->input('stock')
        ]);

        return redirect()->route('barang.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect('/barang')->with('success', 'Barang deleted successfully');
    }
}
