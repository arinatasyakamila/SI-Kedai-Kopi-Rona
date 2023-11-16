@extends('layouts.index')
@section('content')
    <!-- resources/views/view.blade.php -->

    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Data Barang ({{ $kategori->name }})</span>
            </h3>
            <div class="d-flex">
                <a href="{{ url('kategoribarang') }}" class="btn btn-sm ml-3 btn-danger">Kembali</a>
            </div>
        </div>
        </div>

        <div class="row container mx-auto my-5">
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
                                        <th>Nama Barang</th>
                                        <th>Satuan</th>
                                        <th>Stock</th>
                                        <th>Gambar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->bahan_baku }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>{{ $item->stock }}</td>
                                            <td>{{ $item->gambar }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
