@extends('layouts.index')
@section('content')
    <!-- resources/views/view.blade.php -->

    <div class="card pt-4 px-3 bg-light">
        <div class="page-header flex-wrap">
            <h3 class="mb-0">View Data User </span>
            </h3>
            <div class="d-flex">
                <a href="{{ url('user') }}" class="btn btn-sm ml-3 btn-danger">Kembali</a>
            </div>
        </div>
        </div>
        <div class="row container mx-auto my-5">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body px-0 overflow-auto">
                        <h4 class="card-title pl-4 text-center">Data User</h4>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead class="bg-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Gambar</th>
                                        <th>Role</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($user as $item)
                                        <tr>
                                            <td>{{ $item->no }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                @if($item->gambar)
                                                    <img src="{{ asset('public/images/gambar_barang/' . $item->gambar) }}" alt="Gambar User">
                                                @else
                                                    Tidak Ada Gambar
                                                @endif
                                            </td>
                                            <td>{{ $item->role }}</td>



                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Tidak ada data user.</td>
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
