<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Vendor;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::get();
        return view('barangmasuk.index', compact('barangMasuk'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::get();
        $barangs = Barang::get();
        return view('barangmasuk.create', compact('vendors', 'barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vendor' => 'required',
            'barang' => 'required',
            'jumlah' => 'required',
            'tgl_masuk' => 'required',

        ]);
        $barangMasuk = new BarangMasuk();
        $barangMasuk->vendor_id = $request->input('vendor');
        $barangMasuk->barang_id = $request->input('barang');
        $barangMasuk->jumlah = $request->input('jumlah');
        $barangMasuk->tgl_masuk = $request->input('tgl_masuk');
        $barangMasuk->save();

         // Tambah stok barang
        $barang = Barang::find($request->input('barang'));
        $barang->stock += $request->input('jumlah');
        $barang->save();

        return redirect('/barangmasuk')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        //
    }
}
