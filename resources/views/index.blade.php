@extends('layouts.index')
@section('content')
    <div class="card py-4 px-4">
        <div class="page-header flex-wrap">
            <h3 class="mb-0"> Hi, welcome back! {{ Auth::user()->name }}
            </h3>
        </div>
    </div>
    <div class="row my-5 mx-3">
        <div class="col-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
            <div class="card bg-warning">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head"> <a class="nav-link" href="/kategoribarang">Data Barang</a></p>
                            <h2 class="text-white"> <span class="h5"></span>
                            </h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-basket bg-inverse-icon-warning"></i>
                    </div>
                    <h6 class="text-white">18.33% Since last month</h6>
                </div>
            </div>
        </div>
        <div class="col-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3">
            <div class="card bg-danger">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Barang Masuk</p>
                            <h2 class="text-white"> <span class="h5">00</span>
                            </h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-cube-outline bg-inverse-icon-danger"></i>
                    </div>
                    <h6 class="text-white">13.21% Since last month</h6>
                </div>
            </div>
        </div>
        <div class="col-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
            <div class="card bg-primary">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">Barang Keluar</p>
                            <h2 class="text-white"> <span class="h5">00</span>
                            </h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-briefcase-outline bg-inverse-icon-primary"></i>
                    </div>
                    <h6 class="text-white">67.98% Since last month</h6>
                </div>
            </div>
        </div>
        <div class="col-3 stretch-card grid-margin grid-margin-sm-0 pb-sm-3 pb-lg-0 pb-xl-3">
            <div class="card bg-success">
                <div class="card-body px-3 py-4">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="color-card">
                            <p class="mb-0 color-card-head">User</p>
                            <h2 class="text-white"></h2>
                        </div>
                        <i class="card-icon-indicator mdi mdi-account-circle bg-inverse-icon-success"></i>
                    </div>
                    <h6 class="text-white">20.32% Since last month</h6>
                </div>
            </div>
        </div>
    </div>
@endsection
