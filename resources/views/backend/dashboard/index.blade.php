@extends('backend.layout.base', ['title' => 'Dashboard - Administrator - Laravel 9'])

@section('content')
<div class="card table-responsive  shadow-sm">
    <style>
        .deskripsi {
            display: block;
            text-overflow: ellipsis;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 9.5em;
            line-height: 1.8em;
        }
    </style>
    <div class="container mt-4">
            <div class="col-lg-12 col-md-12 order-1">
                <div class="row">
                  <div class="col-lg-4 col-md-4 col-4  mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <span class="fw-semibold d-block mb-1">PESANAN SELESAI</span>
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                          </div>
                        </div>
                        <h3 class="card-title mb-2">{{ $pesananCount }}</h3>
                        <small class="text-success fw-semibold"></i></small>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-4 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <span>PESANAN BELUM SELESAI</span>
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                          </div>
                        </div>
                        <h3 class="card-title text-nowrap mb-1">{{ $pesanan1Count }}</h3>
                        <small class="text-success fw-semibold"></small>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-4 mb-4">
                    <div class="card">
                      <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <span><b>TOTAL PENJUALAN</b></span>
                          <div class="avatar flex-shrink-0">
                            <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded">
                          </div>
                        </div>
                        <h3 class="card-title text-nowrap mb-1 text-success fw-semibold ">Rp. {{ number_format($totalLunas) }}</h3>
                        <small class="text-success fw-semibold"></small>
                      </div>
                    </div>
                  </div>
                </div>
    </div>
    </div>
@endsection
