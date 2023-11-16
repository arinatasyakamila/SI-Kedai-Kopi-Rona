<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Vendor;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = BarangKeluar::get();
        return view('barangkeluar.index', compact('barangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = Vendor::get();
        $barangs = Barang::get();
        return view('barangkeluar.create', compact('vendors', 'barangs'));
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
            'tgl_keluar' => 'required',

        ]);
        $barangKeluar = new BarangKeluar();
        $barangKeluar->vendor_id = $request->input('vendor');
        $barangKeluar->barang_id = $request->input('barang');
        $barangKeluar->jumlah = $request->input('jumlah');
        $barangKeluar->tgl_keluar = $request->input('tgl_keluar');
        $barangKeluar->save();

        //kurangi stok barang
        $barangs = Barang::find($request->input('barang'));
        $barangs->stock -= $request->input('jumlah');
        $barangs->save();

        return redirect('/barangkeluar')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangKeluar $barangKeluar)
    {
        //
    }
}
