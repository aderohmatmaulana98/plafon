@extends('backend.layout.base')

@section('content')
@include('sweetalert::alert')
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 20px">
                <b>{{ $title }}</b>
            </h5>
            <a href="/penjualan/add" type="button" class="btn rounded-pill btn-primary justify-content-end"
                style="margin-left: 70%;">Add</a>
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped bordered">
                <thead>
                    <tr>
                        
                        <th rowspan="2">COUNT MANAGER</th>
                        <th rowspan="2">KODE DISTRIBUTOR</th>
                        <th rowspan="2">DISTRIBUTOR</th>
                        <th rowspan="2">AREA</th>
                        <th colspan="12" style="text-align: center" >TOTAL PEMBELIAN</th>
                        <th rowspan="2">TOTAL</th>
                        <th rowspan="2">%</th>
                        <th rowspan="2">RETUR</th>
                        <th rowspan="2">Actions</th>
                    </tr>
                    <tr>
                        <th>Jan</th>
                        <th>Feb</th>
                        <th>Mar</th>
                        <th>Apr</th>
                        <th>Mei</th>
                        <th>Jun</th>
                        <th>Jul</th>
                        <th>Agu</th>
                        <th>Sep</th>
                        <th>Okt</th>
                        <th>Nov</th>
                        <th>Des</th>
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
                            <td width="auto">{{ number_format($item->nilai1) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai2) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai3) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai4) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai5) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai6) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai7) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai8) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai9) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai10) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai11) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->nilai12) ?? '-'}}</td>
                            <td width="auto">{{ number_format($item->total)}}</td>
                        
                            <td width="auto">
                                @php
                                    $subtotal += $item->total ?? 0;
                                @endphp
                                @if($subtotal != 0)
                                    {{ number_format(($item->total / $subtotal) * 100, 2) }}%
                                @else
                                    -
                                @endif
                            </td>
                            <td width="auto">{{ $item->retur ?? '-'}}</td>
                            <td>
                                <a href=""> <i class="far fa-eye badge-primary"></i></a>
                                <a href=""> <i class="fas fa-edit badge-success"></i></a>
                                <i class="fas fa-trash badge-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete"></i> 
                            </td>
                            <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                aria-labelledby="deletemodal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addNewDonaturLabel">Hapus Distributor
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus </p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                <div class="px-5 pb-8 text-center">
                                                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary">Cancel</button>
                                                    <button type="submit" class="btn btn-danger w-24">Delete</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                       
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="16" style="text-align: center"><b>TOTAL PEMBELIAN</b></td>
                        <td>{{ number_format($subtotal) }}</td>
                        
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
