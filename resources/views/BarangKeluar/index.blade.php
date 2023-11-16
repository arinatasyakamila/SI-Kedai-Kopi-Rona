@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">Barang Keluar</span>
        </h3>
        <div class="d-flex">
            <a href="/barangkeluar/create" class="btn btn-sm ml-3 btn-info">Tambah Data</a>
        </div>
    </div>
</div>
@if (session('success'))
    <div class="w-50 mx-auto mt-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Info</strong> {{ session('success') }}
        </div>
    </div>
@endif
<div class="row container mx-auto my-5">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body px-0 overflow-auto">
                <h4 class="card-title pl-4 text-center">Data Barang Keluar</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Vendor</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Keluar</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangKeluar as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->vendor->nama }}</td>
                                    <td>{{ $item->barang->bahan_baku }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->tgl_keluar }}</td>
                                    <td>
                                        <a href="#" class="btn btn-success">Edit</a>
                                        <a href="#" class="btn btn-success">View</a>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="#" class="btn btn-danger">Hapus</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
