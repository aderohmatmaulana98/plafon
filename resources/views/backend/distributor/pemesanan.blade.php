@extends('backend.layout.base')

@section('content')
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 40px">
                <b>{{ $title }}</b>
            </h5>
            {{-- <a href="#" type="button" class="btn rounded-pill btn-primary justify-content-end"
                style="margin-left: 70%;">Add</a> --}}
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pemesan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Pesanan</th>
                        <th>Harga</th>
                        <th>Status pemesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($pemesanan as $a)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td width="auto">{{ $a->full_name }}</td>
                            <td width="auto">{{ $a->nama_barang }}</td>
                            <td width="auto">{{ $a->jumlah }}</td>
                            <td width="auto">Rp. {{ number_format($a->harga) }}</td>
                            <td width="auto">
                                @if ($a->status == 'lunas')
                                    <span class="badge bg-info ">{{ $a->status }}</span>
                                @elseif ( $a->status == 'belum bayar')
                                    <span  class="badge bg-danger">{{ $a->status }}</span>
                                @else
                               
                                @endif
                            </td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
