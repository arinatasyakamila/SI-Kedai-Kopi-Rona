@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">Edit Data Vendor</span>
        </h3>
        <div class="d-flex">
            <a href="/vendor" class="btn btn-sm ml-3 btn-danger">Kembali</a>
        </div>
    </div>
</div>

<div class="container mx-auto mt-5">
    <div class="card">
        <div class="card-title text-center bg-secondary">
            <h3>Edit Data Vendor</h3>
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
            <form action="{{ url('vendor') }}/{{ $vendor->id }}"  method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="nama">Nama</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="nama" value="{{ $vendor->nama }}" name="nama">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="alamat" value="{{ $vendor->alamat }}" name="alamat">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="no_telp">No Telepon</label>
                    </div>
                    <div class="col-10">
                        <input type="no_telp" class="form-control" id="no_telp" value="{{ $vendor->no_telp }}" name="no_telp">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Pilih Gambar</label>
                    <img src="{{ $vendor->gambar ? asset('storage/' . $vendor->gambar) : '' }}" id="img-preview"
                        class="img-preview img-fluid w-50 mb-2 d-block" alt="">
                    <input type="hidden" name="oldImage" id="gambar" value="{{ $vendor->gambar }}">
                    <input type="file" onchange="previewImage()"
                        class="form-control @error('gambar') is-invalid @enderror" accept="image/*" name="gambar"
                        id="gambar" placeholder="" aria-describedby="fileHelpId">
                    <div id="fileHelpId" class="form-text text-danger">Format jpg,jpeg,png</div>
                    <div class="invalid-feedback">
                        {{ $errors->has('gambar') ? $errors->first('gambar') : '' }}

                    </div>
                </div>


                <div class="col-2 mx-auto">
                    <button type="submit" class="btn btn-success w-100">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>

@endsection
