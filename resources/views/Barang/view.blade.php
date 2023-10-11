@extends('layouts.index')
@section('content')
    <!-- resources/views/view.blade.php -->

    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">Data Barang </span>
            </h3>
            <div class="d-flex">
                <a href="{{ url('barang') }}" class="btn btn-sm ml-3 btn-danger">Kembali</a>
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
                                        <th>Kategori ID</th>
                                        <th>Kode</th>
                                        <th>Bahan Baku</th>
                                        <th>Satuan</th>
                                        <th>Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($barang as $item)
                                        <tr>
                                            <td>{{ $item->kategori_barang_id }}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->bahan_baku }}</td>
                                            <td>{{ $item->satuan }}</td>
                                            <td>{{ $item->stock }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Tidak ada data barang.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
