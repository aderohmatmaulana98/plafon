@extends('backend.layout.base')

@section('content')
@include('sweetalert::alert')
    <div class="card table-responsive">
        <div class="card-header">
            <div class="d-flex">
                <h5 class="mb-4" style="font-size: 20px">
                    <b>{{ $title }}</b>
                </h5>
            </div>               
       
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped bordered">
                <thead>
                    <tr>
                        
                        <th rowspan="2">COUNT MANAGER</th>
                        <th rowspan="2">KODE DISTRIBUTOR</th>
                        <th rowspan="2">DISTRIBUTOR</th>
                        <th rowspan="2">AREA</th>
                        <th colspan="4" style="text-align: center" >TOTAL PEMBELIAN</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $subtotal = 0;
                    @endphp
                    @foreach ($penjualan as $item)
                        <tr>
                            {{-- <td>{{ $no++ }}</td> --}}
                            <td width="auto">{{ $item->nama_cm }}</td>
                            <td width="auto">{{ $item->kode_distributor}}</td>
                            <td width="auto">{{ $item->full_name}}</td>
                            <td width="auto">{{ $item->area}}</td>                             
                            <td width="auto">{{ 'Rp. '. number_format($item->jumlah_harga, 0, ',', '.'). ',00' }}</td>                             
                        </tr>
                       
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: center"><b>TOTAL PEMBELIAN</b></td>
                        <td>{{'Rp. '. number_format($total_penjualan, 0, ',', '.'). ',00' }}</td>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
