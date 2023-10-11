<?php

namespace App\Http\Controllers;

use id;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('vendors.index');
        $vendor = Vendor::get();
        return view('vendors.index', [
            'vendors' => $vendor
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|min:8'
        ]);

        $vendor = new Vendor();
        $vendor->nama = $request->input('nama');
        $vendor->alamat = $request->input('alamat');
        $vendor->no_telp= $request->input('no_telp');
        $vendor->save();

        return redirect('/vendor')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vendor $vendor)
    {
        return view('vendors.update');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $vendor = Vendor::find($id);
        return view('vendors.update', compact('vendor'));
        //$user = User::find($id);
        //return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $vendor = Vendor::find($id);

        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required|min:8|unique:vendors,no_telp,' . $id
        ]);

        // Update data user
        $vendor->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp')
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('vendor.index')->with('success', 'Vendor updated successfully');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Vendor::destroy($id);
        return redirect()->route('vendor.index')->with('success', 'User Delete successfully');
    }
}
