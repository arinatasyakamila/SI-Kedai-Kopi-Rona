@extends('layouts.index')
@section('content')
    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Edit Data Barang</span>
            </h3>
            <div class="d-flex">
                <a href="/barang" class="btn btn-sm ml-3 btn-danger">Kembali</a>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-5">
        <div class="card">
            <div class="card-title text-center bg-secondary">
                <h3>Edit Data Barang</h3>
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
                <form action="{{ url('barang') }}/{{ $barang->id }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="kategori">Kategori Barang</label>
                        </div>
                        <div class="col-10">
                            <select name="kategori" id="kategori" class="form-control">
                                @foreach ($kategori as $kategoriBarang)
                                    <option value="{{ $kategoriBarang->id }}"
                                        {{ $kategoriBarang->id == $barang->kategori->id ? 'selected' : '' }}>
                                        {{ $kategoriBarang->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="kode">Kode</label>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control" id="kode" value="{{ $barang->kode }}"
                                name="kode">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="bahan_baku">Bahan Baku</label>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control" id="bahan_baku" value="{{ $barang->bahan_baku }}"
                                name="bahan_baku">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="satuan">Satuan</label>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control" id="satuan" value="{{ $barang->satuan }}"
                                name="satuan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-2 my-auto">
                            <label for="stock">Stock</label>
                        </div>
                        <div class="col-10">
                            <input type="text" class="form-control" id="stock" value="{{ $barang->stock }}"
                                name="stock">
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
