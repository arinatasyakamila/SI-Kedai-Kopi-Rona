@extends('layouts.index')
@section('content')

<div class="card pt-4 px-3 bg-light">
    <div class="page-header flex-wrap">
        <h3 class="mb-0">Data Vendor</span></h3>
        <div class="d-flex">
            <a href="{{ url('vendor') }}" class="btn btn-sm ml-3 btn-danger">Kembali</a>
        </div>
    </div>
</div>

<div class="row container mx-auto my-5">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body px-0 overflow-auto">
                <h4 class="card-title pl-4 text-center">Data Vendor</h4>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($vendor as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>
                                        @if($item->gambar)
                                            <img src="{{ asset('/images/gambar_vendor/' . $item->gambar) }}"
                                                alt="{{ $item->nama }}" width="50" height="50">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Tidak ada data vendor.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
