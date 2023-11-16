@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">Tambah Barang Masuk</span>
        </h3>
        <div class="d-flex">
            <a href="/barangkeluar" class="btn btn-sm ml-3 btn-danger">Kembali</a>
        </div>
    </div>
</div>
<div class="container mx-auto mt-5">
    <div class="card">
        <div class="card-title text-center bg-secondary">
            <h3>Tambah Barang Keluar</h3>
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
            <form action="{{ url('barangkeluar') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="vendor">Vendor</label>
                    </div>
                    <div class="col-10">
                        <select name="vendor" id="vendor" class="form-control">
                            @foreach($vendors as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="barang">Barang</label>
                    </div>
                    <div class="col-10">
                        <select name="barang" id="barang" class="form-control">
                            @foreach($barangs as $barang)
                                <option value="{{ $barang->id }}">{{ $barang->bahan_baku }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="jumlah">Jumlah</label>
                    </div>
                    <div class="col-10">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="tgl_keluar">Tanggal Keluar </label>
                    </div>
                    <div class="col-10">
                        <input type="date" class="form-control" id="tgl_keluar" name="tgl_keluar">
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
