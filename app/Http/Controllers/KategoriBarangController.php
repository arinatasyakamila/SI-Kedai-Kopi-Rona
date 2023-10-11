<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoriBarang = KategoriBarang::get();
        return view('kategoribarang.kategori', compact('kategoriBarang'));
        //$kategoriBarang = KategoriBarang::get();
        //return view('kategoribarang.kategori', [
            //'kategoribarang' => $kategoriBarang
        //]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategoribarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $kategori= new KategoriBarang();
        $kategori->name = $request->input('name');
        $kategori->save();
        return redirect('kategoribarang')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        $barang = Barang::where('kategori_barang_id',$id)->get();
        return view('kategoribarang.view',compact('barang','kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBarang $kategoriBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KategoriBarang $kategoriBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriBarang $kategoriBarang)
    {
        //
    }
}
