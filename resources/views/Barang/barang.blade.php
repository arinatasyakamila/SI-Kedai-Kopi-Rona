@extends('layouts.index')
@section('content')
    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Data Barang</span>
            </h3>
            <div class="d-flex">
                <a href="/barang/create" class="btn btn-sm ml-3 btn-info">Tambah Data</a>
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
        <form action="/barang" method="GET" class=" col-3">
            <div class="input-group mb-3">
                <input type="text" name="keyword" value="{{ request('search') }}" class="form-control"
                    placeholder="Search">
                <button class="btn btn-success" type="submit">search</button>
            </div>
        </form>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4 text-center">Data Barang</h4>
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="bg-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kode </th>
                                    <th>Bahan Baku</th>
                                    <th>Satuan</th>
                                    <th>Stock</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangs as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode }}</td>
                                        <td>{{ $item->bahan_baku }}</td>
                                        <td>{{ $item->satuan }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>
                                            <img src="{{ asset('images/gambar_barang/' . $item->gambar) }}" alt="Gambar Barang" class="img rounded-0" style="width:50%;height:50%">
                                        </td>
                                        <td>
                                            <a href="/barang/{{ $item->id }}/edit" class="btn btn-success">Edit</a>
                                            <a href="/barang/{{ $item->id }}" class="btn btn-success">View</a>
                                            <a href="#" class="btn btn-danger">Hapus</a>

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
