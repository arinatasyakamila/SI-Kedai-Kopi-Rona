@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">Tambah Data Barang</span>
        </h3>
        <div class="d-flex">
            <a href="/barang" class="btn btn-sm ml-3 btn-danger">Kembali</a>
        </div>
    </div>
</div>

<div class="container mx-auto mt-5">
    <div class="card">
        <div class="card-title text-center bg-secondary">
            <h3>Tambah Data Barang</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('barang') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="kategori">Kategori Barang</label>
                    </div>
                    <div class="col-10">
                        <select name="kategori" id="kategori" class="form-control">
                            @foreach($kategori as $kategoriBarang)
                                <option value="{{ $kategoriBarang->id }}">{{ $kategoriBarang->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="kode">Kode</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="kode" name="kode">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="bahan_baku">Bahan Baku</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="bahan_baku" name="bahan_baku">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="satuan">Satuan</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="satuan" name="satuan">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="stock">Stock</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="stock" name="stock">
                    </div>

                </div>

                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="stock">Gambar</label>
                    </div>
                    <div class="col-10">
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    </div>

                </div>
                <div class="col-2 mx-auto">
                    <button type="submit" class="btn btn-success w-100">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
