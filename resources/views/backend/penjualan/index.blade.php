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
            <table id="datatable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>COUNT MANAGER</th>
                        <th>Kode DISTRIBUTOR</th>
                        <th>DISTRIBUTOR</th>
                        <th>AREA</th>
                        <th>TOTAL PEMBELIAN</th>
                        <th>TOTAL</th>
                        <th>RETUR</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td width="auto">Ngaing</td>
                            <td width="auto">{{ $item->kode_distributor}}</td>
                            <td width="auto">Sedul</td>
                            <td width="auto">{{ $item->area}}</td>
                            @if ($item->total_penjualan)
                                    @php
                                    $jsonData = json_decode($item->total_penjualan, true);
                                    @endphp
                                    <td width="auto"> {{ $jsonData['januari'] }}</td>
                                    <td width="auto"> {{ $jsonData['februari'] }}</td>
                                    <td width="auto"> {{ $jsonData['maret'] }}</td>
                                    <td width="auto"> {{ $jsonData['april'] }}</td>
                                    <td width="auto"> {{ $jsonData['mei'] }}</td>
                            @else
                            <td width="auto">-</td>
                            <td width="auto">-</td>
                            @endif
                            <td width="auto">{{ $item->total}}</td>
                            <td width="auto">{{ $item->retur}}</td>
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
            </table>
        </div>
    </div>
@endsection
