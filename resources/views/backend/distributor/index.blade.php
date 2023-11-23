@extends('backend.layout.base')

@section('content')
@include('sweetalert::alert')
    <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0" style="font-size: 20px">
                <b>{{ $title }}</b>
            </h5>
            <a href="/distributor/add" type="button" class="btn rounded-pill btn-primary justify-content-end"
                style="margin-left: 70%;">Add</a>
        </div>
        <div class="container mt-4 ">
            <table id="datatable" class="table table-striped ">
                <thead>
                    <tr>
                        <th>No</th>
                        {{-- <th>Kode DISTRIBUTOR</th> --}}
                        <th>DISTRIBUTOR</th>
                        <th>PENANGGUNG JAWAB</th>
                        <th>KONTAK</th>
                        {{-- <th>ALAMAT</th> --}}
                        <th>AREA COVER</th>
                        <th>JUMLAH AGEN/DISTRIBUTOR</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($distributor as $a)
                        <tr>
                            <td>{{ $no++ }}</td>
                            {{-- <td width="auto">{{ $a->kode_distributor}}</td> --}}
                            <td width="auto">{{ $a->full_name}}</td>
                            <td width="auto">{{ $a->nama_penjab}}</td>
                            <td width="auto">{{ $a->kontak}}</td>
                            <td width="auto">{{ $a->area}}</td>
                            <td width="auto">
                              @if ($a->jumlah_agen == null)

                              <span>-</span>
                              
                              @else
                                    {{ $a->jumlah_agen}}
                              @endif  
                            </td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('detail.distributor', $a->id) }}"> <i class="far fa-eye badge-primary"></i></a>
                                {{-- <a href="/cm/edit/{{ $a->id }}"> <i class="fas fa-edit badge-success"></i></a> --}}
                                <button class="btn btn-danger"><i class="fas fa-trash badge-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $a->id }}"></i> </button>
                            </td>
                            <div class="modal fade" id="delete{{ $a->id }}" tabindex="-1" role="dialog"
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
                                                <p>Anda yakin ingin menghapus {{ $a->full_name }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="deleteDistributor/{{ $a->id}}" method="POST">
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
