@extends('backend.layout.base')

@section('content')
@include('sweetalert::alert')

    <div class="card table-responsive my-2">
        <div class="card-header">
            <div class="d-flex">
                <h5 class="mb-4" style="font-size: 20px">
                    <b>Ekspor to Excel</b>
                </h5>
            </div> 

            <form action="{{ route('export.download.excel') }}" method="GET" class="form-inline">
                <label for="filter_month" class="mr-2">Filter:</label>
                <input type="month" name="filter_month" id="filter_month" class="form-control mr-2" value="{{ $selectedMonth }}">
                <button type="submit" class="btn rounded-pill btn-primary mt-4">Print</button>
            </form>
        </div>
    </div>

    <div class="card table-responsive">
        <div class="card-header">
            <div class="d-flex">
                <h5 class="mb-4" style="font-size: 20px">
                    <b>{{ $title }}</b>
                </h5>
            </div>  
            <form action="{{ route('penjualan') }}" method="GET" class="form-inline">
                <label for="filter_month" class="mr-2">Filter:</label>
                <select name="filter_month" id="filter_month" class="form-control mr-2">
                    <option value="all" {{ $selectedMonth == 'all' ? 'selected' : '' }}>All</option>
                    @foreach ($availableMonths as $month)
                        <option value="{{ $month }}" {{ $selectedMonth == $month ? 'selected' : '' }}>
                            {{ date('F Y', strtotime($month)) }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn rounded-pill btn-primary mt-2">Apply Filter</button>
            </form>           
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped bordered">
                <thead>
                    <tr>
                        
                        <th rowspan="2">PENANGGUNG JAWAB</th>
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
                            <td width="auto">{{ $item->nama_penjab }}</td>
                            <td width="auto">{{ $item->kode_distributor}}</td>
                            <td width="auto">{{ $item->full_name}}</td>
                            <td width="auto">{{ $item->area}}</td>                             
                            <td width="auto">{{ 'Rp. '. number_format($item->jumlah_harga, 0, ',', '.'). ',00' }}</td>                             
                        </tr>
                       
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4" style="text-align: center"><b>TOTAL PEMBELIAN KESELURUHAN</b></td>
                        <td>{{'Rp. '. number_format($total_penjualan, 0, ',', '.'). ',00' }}</td>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
