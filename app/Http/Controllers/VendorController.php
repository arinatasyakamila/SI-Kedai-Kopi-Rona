<?php

namespace App\Http\Controllers;

use id;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vendor = Vendor::when($request->input('keyword'), function ($query) use ($request) {
            return $query->where(function ($query) use ($request) {
                $query->where('nama', 'like', "%{$request->input('keyword')}%")
                    ->orWhere('alamat', 'like', "%{$request->input('keyword')}%");
            })->orWhere('no_telp', 'like', "%{$request->input('keyword')}%");
        })->get();
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
            'no_telp' => 'required|min:8',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $vendor = new Vendor();
        $vendor->nama = $request->input('nama');
        $vendor->alamat = $request->input('alamat');
        $vendor->no_telp= $request->input('no_telp');
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/gambar_vendor'), $namaFile);
            $vendor->gambar = $namaFile;
        }


        $vendor->save();

        return redirect('/vendor')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vendor = Vendor::where('id', $id)->get();
        return view('vendors.view', compact('vendor'));

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
            'no_telp' => 'required|min:8|unique:vendors,no_telp,' . $id,
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data user
        $vendor->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp')
        ]);

        if ($request->hasFile('gambar')) {
            // Delete the old image
            Storage::delete($vendor->gambar);

            // Upload the new image
            $gambar = $request->file('gambar');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/gambar_vendor'), $namaFile);

            // Update the image field in the database
            $vendor->update(['gambar' => $namaFile]);
        }

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
