<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Unique;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();
        return view('user.user', [
            'users' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('images/gambar_user'), $namaFile);
            $user->gambar = $namaFile;
        }
        $user->save();

        return redirect('/user')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('user.view',['name'=>'view', 'string'=>$id]);
        //return view('user.update',['title'=>'view', 'post'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
       $user = User::find($id);
        return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {

        $user = User::find($id);

        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|string|min:8',
        ]);

        // Update data user
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirect atau response sesuai kebutuhan
        return redirect('user')->with('success', 'User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('success', 'User Delete successfully');
    }
}
