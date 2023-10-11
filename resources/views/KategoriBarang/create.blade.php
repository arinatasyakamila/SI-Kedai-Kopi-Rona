@extends('layouts.index')
@section('content')
<div class="container mx-auto mt-5">
    <div class="card">
        <div class="card-title text-center bg-secondary">
            <h3>Tambah Kategori Data Barang</h3>
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
            <form action="{{ url('kategoribarang') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-2 my-auto">
                        <label for="name">Nama Kategori</label>
                    </div>
                    <div class="col-10">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
               
                <div class="col-2 mx-auto">
                    <button type="submit" class="btn btn-success w-100">SIMPAN</button>
                </div>
            </form>
        </div>
    </div>
@endsection