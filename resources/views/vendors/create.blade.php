@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">Tambah Data Vendor</span>
        </h3>
        <div class="d-flex">
            <a href="/vendor" class="btn btn-sm ml-3 btn-danger">Kembali</a>
        </div>
    </div>
</div>

<div class="container mx-auto mt-5">
    <div class="card">
        <div class="card-title text-center bg-secondary">
            <h3>Tambah Data Vendor</h3>
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
            <form action="{{ url('vendor') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="no_telp">No Telepon</label>
                    </div>
                    <div class="col-10">
                        <input type="no_telp" class="form-control" id="no_telp" name="no_telp">
                    </div>
                </div>
                <div class="col-2 mx-auto">
                    <button type="submit" class="btn btn-success w-100">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
    
@endsection
